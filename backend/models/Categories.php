<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id_category
 * @property string $name_category
 * @property string $description
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 *
 * @property Products[] $products
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_category', 'description'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_category', 'description', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['name_category'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_category' => 'Id Category',
            'name_category' => 'Name Category',
            'description' => 'Description',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['id_category' => 'id_category']);
    }
}
