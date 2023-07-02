<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $role
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 *
 * @property Profile $profile
 * @property Rate[] $rates
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'role'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'email', 'role', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id tài khoản',
            'username' => 'Tên tài khoản',
            'password' => 'Mật khẩu',
            'email' => 'Email',
            'role' => 'Chức năng',
            'created_at' => 'Thời gian tạo',
            'created_by' => 'Người tạo',
            'updated_at' => 'Thời gian cập nhật',
            'updated_by' => 'Người cập',
        ];
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['id_user' => 'id_user']);
    }

    /**
     * Gets query for [[Rates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRates()
    {
        return $this->hasMany(Rate::class, ['id_user' => 'id_user']);
    }


    public $auth_key;
    public $password_reset_token;

    public $role;


    public static function findIdentity($id)
    {
        return static::findOne(['id_user' => $id]);
        
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }


    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }


    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function beforeSave($insert) {
        if ($insert) {
            $this -> setPassword($this->password);
            $this->generateAuthKey();
            
            $this->generatePasswordResetToken();
            $this->created_at = time();
            $this->created_by = $this->username;
        } else {
            $old_user = Users::findOne($this->id_user);
            if($this->password != $old_user->password) {
                $this -> setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
            }
        }
        return parent::beforeSave(($insert));
    }

    
    
    public function getRole() {
        
        if($this->role == 'admin') {
            $this->role = 1;
        } elseif($this->role == 'user') {
            $this->role = 0;
        }
        return $this->role;
    }
}
