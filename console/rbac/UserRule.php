<?php
namespace console\rbac;
use Yii;
use yii\rbac\Rule;

class UserRule extends Rule {

    public $name = 'userRule';

    public function execute($user, $item, $params) {
        if (!Yii::$app->user->isGuest) {
            $role= Yii::$app -> user->identity->id_role;
            if ($item -> name === 'admin') {
                return $role == 1;
            } elseif ($item -> name === 'user') {
                return $role == 2;
            }
            return false;
        }
    }
}