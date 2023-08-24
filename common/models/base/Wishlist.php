<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property int $id_wis
 * @property int $id_user
 * @property int $id_products
 * @property string|null $created_at
 * @property string|null $status
 *
 * @property Products $products
 * @property Users $user
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_products'], 'required'],
            [['id_user', 'id_products'], 'integer'],
            [['created_at', 'status'], 'string', 'max' => 255],
            [['id_products'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_products' => 'id_products']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wis' => 'Id Wis',
            'id_user' => 'Id User',
            'id_products' => 'Id Products',
            'created_at' => 'Created At',
            'status' => 'Status',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }
}
