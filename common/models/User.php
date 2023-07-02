<?php
namespace common\models;

use common\models\base\Users;
use Yii;
use yii\base\NotSupportedException;

use yii\web\IdentityInterface;


class User extends Users implements IdentityInterface
{

    // public $auth_key;
    // public $password_reset_token;

    // public $role;


    // public static function findIdentity($id)
    // {
    //     return static::findOne(['id_user' => $id]);
        
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    // }


    // public function getId()
    // {
    //     return $this->getPrimaryKey();
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function getAuthKey()
    // {
    //     return $this->auth_key;
    // }

    // public function validateAuthKey($authKey)
    // {
    //     return $this->getAuthKey() === $authKey;
    // }

    // public static function findByUsername($username)
    // {
    //     return static::findOne(['username' => $username]);
    // }


    // public function setPassword($password)
    // {
    //     $this->password = Yii::$app->security->generatePasswordHash($password);
    // }

    // public function validatePassword($password)
    // {
    //     return Yii::$app->security->validatePassword($password, $this->password);
    // }
    // public function generateAuthKey()
    // {
    //     $this->auth_key = Yii::$app->security->generateRandomString();
    // }

    // public function generatePasswordResetToken()
    // {
    //     $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    // }

    // public function removePasswordResetToken()
    // {
    //     $this->password_reset_token = null;
    // }
    // public function beforeSave($insert) {
    //     if ($insert) {
    //         $this -> setPassword($this->password);
    //         $this->generateAuthKey();
            
    //         $this->generatePasswordResetToken();
    //         $this->created_at = time();
    //         $this->created_by = $this->username;
    //     } else {
    //         $old_user = Users::findOne($this->id_user);
    //         if($this->password != $old_user->password) {
    //             $this -> setPassword($this->password);
    //             $this->generateAuthKey();
    //             $this->generatePasswordResetToken();
    //         }
    //     }
    //     return parent::beforeSave(($insert));
    // }

    
    
    // public function getRole() {
        
    //     if($this->role == 'admin') {
    //         $this->role = 1;
    //     } elseif($this->role == 'user') {
    //         $this->role = 0;
    //     }
    //     return $this->role;
    // }
}
