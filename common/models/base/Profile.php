<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id_user
 * @property string $name
 * @property string $birthday
 * @property string $gender
 * @property string $enmail
 * @property int|null $phone
 * @property string $address
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 *
 * @property Users $user
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
            [['name', 'birthday', 'gender', 'enmail', 'address', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'required'],
            [['phone'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'birthday', 'gender', 'enmail', 'address', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['enmail'], 'unique'],
            [['phone'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
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
            'gender' => 'Gender',
            'enmail' => 'Enmail',
            'phone' => 'Phone',
            'address' => 'Address',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
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
