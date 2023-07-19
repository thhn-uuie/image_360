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
 * @property string $address
 * @property string|null $avatar
 * @property int|null $created_at
 * @property string|null $created_by
 * @property int|null $updated_at
 * @property string|null $updated_by
 * @property string|null $email
 * @property int|null $phone
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
            [['name', 'birthday', 'gender', 'address'], 'required'],
            [['created_at', 'updated_at', 'phone'], 'integer'],
            [['name', 'birthday', 'gender', 'address', 'avatar', 'created_by', 'updated_by', 'email'], 'string', 'max' => 255],
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
            'name' => 'Họ tên',
            'birthday' => 'Ngày sinh',
            'gender' => 'Giới tính',
            'address' => 'Địa chỉ',
            'avatar' => 'Avatar',
            'created_at' => 'Thời gian tạo',
            'created_by' => 'Người tạo',
            'updated_at' => 'Thời gian cập nhật',
            'updated_by' => 'Người cập nhật',
            'email' => 'Email',
            'phone' => 'Điện thoại',
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
