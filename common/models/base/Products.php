<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id_products
 * @property string $name_products
 * @property string $status
 * @property int|null $id_category
 * @property string $image
 * @property string $files
 * @property int|null $created_at
 * @property string|null $created_by
 * @property int|null $updated_at
 * @property string|null $updated_by
 * @property string|null $qr_code
 * @property string|null $description
 *
 * @property Categories $category
 * @property Rate[] $rates
 * @property View $view
 * @property Wishlist[] $wishlists
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
            [['name_products', 'status', 'image', 'files'], 'required'],
            [['id_category', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name_products', 'status', 'image', 'files', 'created_by', 'updated_by', 'qr_code'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_products' => 'Id sản phẩm',
            'name_products' => 'Tên sản phẩm',
            'status' => 'Trạng thái',
            'id_category' => 'Danh mục',
            'image' => 'Hình ảnh',
            'files' => 'Ảnh 360 độ',
            'created_at' => 'Ngày tạo',
            'created_by' => 'Người tạo',
            'updated_at' => 'Ngày cập nhật',
            'updated_by' => 'Người cập nhật',
            'qr_code' => 'Mã QR',
            'description' => 'Mô tả',
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
     * Gets query for [[Rates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::class, ['id_products' => 'id_products']);
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

    /**
     * Gets query for [[Wishlists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::class, ['id_products' => 'id_products']);
    }
}
