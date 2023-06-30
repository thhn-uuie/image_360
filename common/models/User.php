<?php
namespace common\models;

use PhpParser\Node\Stmt\Expression;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


class User extends \common\models\base\Users {

    public function isGuest() {
        return Yii::$app->user->isGuest;
    }

    
}
