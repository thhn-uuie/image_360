<?php
namespace common\models;
use Yii;
class Profile extends \common\models\base\Profile {
    public $file_image;

    public function getIdUser() {
        
        return Yii::$app->user->identity->id_user;
        
    }
   public function beforeSave($insert)
   {
       if ($insert) {
           $this->created_at = time();
           $this->created_by = Yii::$app->user->identity->username;
       } else {
            $this->updated_at = time();
            $this->updated_by = Yii::$app->user->identity->username;
       }
       return parent::beforeSave($insert); // TODO: Change the autogenerated stub
   }
}