<?php

namespace frontend\controllers;
use frontend\models\Categories;


class CategoriesController extends \yii\web\Controller
{
    public function actionCategories()
    {
        return $this->render('categories');
    }

    public function actionSearch() {
        $categories = Categories::find()->all();
        return $this->render('search', [
            'categories' => $categories
        ]);
    }

    public function actionIndex() {
        $cate = Categories::find()->all();
        return $this->render('index', [
            'cate' => $cate
        ]);
    }
}
