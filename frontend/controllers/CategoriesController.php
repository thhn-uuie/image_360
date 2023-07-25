<?php

namespace frontend\controllers;

class CategoriesController extends \yii\web\Controller
{
    public function actionCategories()
    {
        return $this->render('categories');
    }
}
