<?php

namespace common\models\base;

use Yii;
use yii\web\IdentityInterface;
use PhpParser\Node\Stmt\Expression;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $id_role
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 *
 * @property Profile $profile
 * @property Rate[] $rates
 * @property Role $role
 */
class Users extends ActiveRecord implements IdentityInterface
{
    public $auth_key;
    public $password_reset_token;
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
            [['username', 'password', 'email', 'id_role'], 'required'],
            [['id_role'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'email', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id_role']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'id_role' => 'Id Role',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
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

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id_role' => 'id_role']);
    }

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


    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    // public function generateEmailVerificationToken()
    // {
    //     $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    // }

    /**
     * Removes password reset token
     */
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
            $this->created_by = Yii::$app->user->identity->username;
        } else {
            $old_user = Users::findOne($this->id_user);
            if($this->password != $old_user->password) {
                $this -> setPassword($this->password);
                $this->generateAuthKey();
                $this->generatePasswordResetToken();
               
            }
            $this->updated_at = time();
            $this->updated_by = Yii::$app->user->identity->username;
        }
        return parent::beforeSave(($insert));
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}

