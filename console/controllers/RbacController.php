<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        // $createUsers = $auth->createPermission('create-user');
        // $createUsers->description = 'Tao mot user';
        // $auth->add($createUsers);

        // $indexUsers = $auth->createPermission('index-user');
        // $indexUsers->description = 'Xem danh sach user';
        // $auth->add($indexUsers);

        // $updateUsers = $auth->createPermission('update-user');
        // $updateUsers->description = 'Cap nhat user';
        // $auth->add($updateUsers);

        // $deleteUsers = $auth->createPermission('delete-user');
        // $deleteUsers->description = 'Xoa user';
        // $auth->add($deleteUsers);

        // $viewUsers = $auth->createPermission('view-user');
        // $viewUsers->description = 'Xem chi tiet mot user';
        // $auth->add($viewUsers);

        // $userManager = $auth->createRole('manager-user');
        // $auth->add($userManager);

        // $auth->addChild($userManager, $createUsers);
        // $auth->addChild($userManager, $indexUsers);
        // $auth->addChild($userManager, $updateUsers);
        // $auth->addChild($userManager, $deleteUsers);
        // $auth->addChild($userManager, $viewUsers);


        // $admin = $auth -> createRole('admin');
        // $auth->add($admin);

        // $auth->addChild($admin, $userManager);
        
        // $user = $auth->createRole('user');
        // $auth->add($user);

        // $createCategories = $auth->createPermission('create-categories');
        // $createCategories->description = 'Tao mot danh muc';
        // $auth->add($createCategories);

        // $updateCategories = $auth->createPermission('update-categories');
        // $updateCategories->description = 'Cap nhat mot danh muc';
        // $auth->add($updateCategories);

        //  $indexCategories = $auth->createPermission('index-categories');
        // $indexCategories->description = 'Xem list danh muc';
        // $auth->add($indexCategories);

        //  $viewCategories = $auth->createPermission('view-categories');
        // $viewCategories->description = 'Xem chi tiet mot danh muc';
        // $auth->add($viewCategories);

        // $deleteCategories = $auth->createPermission('delete-categories');
        // $deleteCategories->description = 'Xoa mot danh muc';
        // $auth->add($deleteCategories);

        // $categoryManager = $auth->createRole('manager-categories');

        // $auth->add($categoryManager);
        // $auth->addChild($categoryManager, $createCategories);
        // $auth->addChild($categoryManager, $updateCategories);
        // $auth->addChild($categoryManager, $indexCategories);
        // $auth->addChild($categoryManager, $viewCategories);
        // $auth->addChild($categoryManager, $deleteCategories);

        // $auth->addChild($admin, $categoryManager);

        
        // $auth->addChild($user, $indexCategories);
        // $auth->addChild($user, $viewCategories);

        
        // $auth->assign($admin, 1);
        // $auth->assign($user, 2);
        $auth = Yii::$app->authManager;

        $rule = new \console\rbac\UserRule;
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->ruleName = $rule->name;
        $auth->add($user);
        // ... add permissions as children of $author ...

        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $user);

    }
}


?>