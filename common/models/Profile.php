<?php
namespace common\models;
use Yii;
class Profile extends \common\models\base\Profile {
    public $file_image;

    public function getIdUser() {
        
            return Yii::$app->user->identity->id_user;
        
    }
}