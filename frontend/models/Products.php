<?php

namespace frontend\models;

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
 * @property string|null $number_of_views
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
            [['name_products', 'description', 'status', 'image', 'files', 'created_by', 'updated_by', 'qr_code', 'number_of_views'], 'string', 'max' => 255],
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
            'number_of_views' => 'Number Of Views',
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
}