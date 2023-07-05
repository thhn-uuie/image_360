<?php
namespace common\models;

class Products extends \common\models\base\Products {
    public $file_image;

    public function rules()
    {
       
        return [
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code'], 'required'],
            [['id_category'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_products', 'description', 'status', 'image', 'files', 'qr_code', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['qr_code'], 'unique'],
            ['file_image','file','extensions'=>'jpg,png,jpeg'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

   

    // public static function getStatus() {
    //     $products = Products::find()->all();
    //     $arr_status = ['Hoạt động', 'Không hoạt động'];
    //     var_dump($products);die;
    //     return $arr;
    // }


    public static function getCategories() {
        $categories = \common\models\base\Categories::find()->all();
        $arr_cate = [];
        foreach($categories as $cate) {
            $arr_cate[$cate->id_category] = $cate->name_category;
        }
        return $arr_cate;
    }
}