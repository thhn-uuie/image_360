<?php
namespace console\rbac;
use Yii;
use yii\rbac\Rule;
use common\models\Categories;

class CategoryRule extends Rule {
    public $name = 'isUser';
    
    public function execute($user, $item, $params) {
        return isset($params['categories']) ? $params['categories']->createdBy == $user : false;
    }
}