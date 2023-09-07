<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Products;
use common\models\base\Rate;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $string = Yii::$app->request->get('string');
        if ($string) {
            $productsSearch = Products::find()->innerJoin('categories', 'categories.id_category = products.id_category')
            ->where(['like', 'name_products', $string, 'products.status' => 'Hoạt động', 'categories.status' => 'Hiện'])->all();

            if (!$productsSearch) {
                $productsSearch = null;
            }
        }
        else {
            $productsSearch = null;
        }

        return $this->render('index',
            [
                'productsSearch' => $productsSearch,
                'string'=> $string
            ]);
    }

}
