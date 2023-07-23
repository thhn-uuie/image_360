<?php

namespace frontend\controllers;
use common\models\Products;
use frontend\models\Categories;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProductsCategory($id_products) {
//        $query = new \yii\db\Query();
//        $query->select('*')
//            ->from('products')
//            ->innerJoin('categories', 'categories.id_category = products.id_category')
//            ->where(['products.id_category' => $id_products]);
//        $results = $query->all();

        $res = Products::find()
            ->innerJoin('categories', 'categories.id_category = products.id_category')
            ->where(['products.id_category' => $id_products])
            ->all();
//        var_dump($res);die;
        return $this->render('products-category', [
            'res'=>$res
        ]);
    }


    protected function findModel($id_products)
    {
        if (($model = Products::findOne(['id_products' => $id_products])) !== null) {
            return $model;
        }
    }
}
