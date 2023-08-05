<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Products;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $string = Yii::$app->request->get('string');
        if ($string) {
            $productsSearch = Products::find()->where(['like', 'name_products', $string])->all();
            if (!$productsSearch) {
                $productsSearch = null;
            }
        }
        else {
            $productsSearch = null;
        }
        return $this->render('index', ['productsSearch' => $productsSearch]);
    }

}
