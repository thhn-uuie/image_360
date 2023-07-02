<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property int $id_rate
 * @property int $id_products
 * @property int $id_user
 * @property string $comment
 * @property string $rate
 * @property string $time
 *
 * @property Products $products
 * @property Users $user
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_products', 'id_user', 'comment', 'rate', 'time'], 'required'],
            [['id_products', 'id_user'], 'integer'],
            [['comment', 'rate', 'time'], 'string', 'max' => 255],
            [['id_products'], 'unique'],
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
            'id_rate' => 'Id Rate',
            'id_products' => 'Id Products',
            'id_user' => 'Id User',
            'comment' => 'Comment',
            'rate' => 'Rate',
            'time' => 'Time',
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
