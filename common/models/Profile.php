<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id_user
 * @property string $name
 * @property string $birthday
 * @property string $sex
 * @property string $enmail
 * @property int|null $phone
 * @property string $address
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'birthday', 'sex', 'enmail', 'address'], 'required'],
            [['phone'], 'integer'],
            [['name', 'birthday', 'sex', 'enmail', 'address'], 'string', 'max' => 255],
            [['enmail'], 'unique'],
            [['phone'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'name' => 'Name',
            'birthday' => 'Birthday',
            'sex' => 'Sex',
            'enmail' => 'Enmail',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
