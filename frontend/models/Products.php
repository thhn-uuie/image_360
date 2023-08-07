<?php

namespace frontend\models;

use common\models\base\View;
use common\models\base\Rate;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id_products
 * @property string $name_products
 * @property string $description
 * @property string $status
 * @property int|null $id_category
 * @property string $image
 * @property string $files
 * @property int|null $created_at
 * @property string|null $created_by
 * @property int|null $updated_at
 * @property string|null $updated_by
 * @property string|null $qr_code
 *
 * @property Categories $category
 * @property Rate $rate
 * @property View $view
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_products', 'description', 'status', 'image', 'files'], 'required'],
            [['id_category', 'created_at', 'updated_at'], 'integer'],
            [['name_products', 'description', 'status', 'image', 'files', 'created_by', 'updated_by', 'qr_code'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'Id Products',
            'name_products' => 'Name Products',
            'description' => 'Description',
            'status' => 'Status',
            'id_category' => 'Id Category',
            'image' => 'Image',
            'files' => 'Files',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'qr_code' => 'Qr Code',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['id_category' => 'id_category']);
    }

    /**
     * Gets query for [[Rate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        return $this->hasOne(Rate::class, ['id_products' => 'id_products']);
    }

    /**
     * Gets query for [[View]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getView()
    {
        return $this->hasOne(View::class, ['id_products' => 'id_products']);
    }

    public function getProductsCate($id_cate)
    {
        $products_cate = Products::find()
            ->innerJoin('categories', 'categories.id_category = products.id_category')
            ->where(['products.id_category' => $id_cate, 'products.status' => 'Hoạt động'])
            ->all();
        return $products_cate;
    }

    public function getViewProducts($id_products) {
        $viewCount= View::findOne(['id_products'=>$id_products]);
        return $viewCount;
    }
    public function getProdCate()
    {
        return $this->getProductsCate($this->id_category);
    }

    public function getRateProducts($id_products) {
        $rateDb = Rate::find()->where(['id_products'=>$id_products])->all();

        $rateArr = [];
        foreach ($rateDb as $temp) {
            array_push($rateArr, (int)$temp->rate);
        }
        if (count($rateArr) == 0) {
            $rateAverage = 0;
            $cmt = 0;
        } else {
            $rateAverage = array_sum($rateArr) / count($rateArr);
            $cmt = count($rateArr);
        }
        return [$rateAverage, $cmt];
    }

    public function rateAvgAllProducts() {
        $allProducts = Products::find()->all();
        foreach ($allProducts as $item) {
            var_dump($this->getRateProducts($item->id_products));

        }
    }

}
