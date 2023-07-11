<?php
namespace common\models;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use yii\helpers\Url;
use Yii;
use common\models\base\Categories;
class Products extends \common\models\base\Products {
    public $file_image;

    public $file_360;

    public $qr;
    
    public function rules()
    {
       
        return [
            [['name_products', 'description', 'status', 'image', 'files'], 'required'],
            [['id_category'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['qr_code'], 'unique'],
            [['file_image'],'file','extensions'=>'jpg,png, jpeg'],
            //[['file_360'], 'file', 'extensions' => 'jpg, png, jpeg'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    public static function getCategories() {
        $categories = \common\models\base\Categories::find()->all();
        $arr_cate = [];
        foreach($categories as $cate) {
            $arr_cate[$cate->id_category] = $cate->name_category;
        }
        return $arr_cate;
    }

    public function createQR() {
        $writer = new PngWriter();
        $url = Url::toRoute(['products/view', 'id_products' =>$this->id_products], true);
        $qr = QrCode::create($url);

        $res = $writer->write($qr);
        $path = '../../qr/'.$this->name_products.time().'.png';
        $res -> saveToFile($path);
        $this->setAttribute('qr_code', $path);
        return $path;
    }

    public function beforeSave($insert) {
        if ($insert) {
            $this->created_at = time();
            $this->created_by = Yii::$app->user->identity->username;
        } else {
            $this->updated_at = time();
            $this->updated_by = Yii::$app->user->identity->username;
        }
        return parent::beforeSave(($insert));
    }
}