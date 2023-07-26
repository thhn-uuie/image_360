<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "view".
 *
 * @property int $id_view
 * @property int $id_products
 * @property int|null $view_count
 * @property string|null $view_date
 *
 * @property Products $products
 */
class View extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_products'], 'required'],
            [['id_products', 'view_count'], 'integer'],
            [['view_date'], 'string', 'max' => 255],
            [['id_products'], 'unique'],
            [['id_products'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_products' => 'id_products']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_view' => 'Id View',
            'id_products' => 'Id Products',
            'view_count' => 'View Count',
            'view_date' => 'View Date',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(Products::class, ['id_products' => 'id_products']);
    }
}
