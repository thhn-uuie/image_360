<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\Products;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProductsCategory($id_products) 
    {
        $products = new Products();

        $products_cate = $products->getProductsCate($id_cate);
        return $this->render('products-category', [
            'products_cate' => $products_cate
        ]);
    }

    public function actionDetail($id_products)
    {
        $products = new Products();
        $products_cate = $products->getProductsBy($id_products);
        foreach ($products_cate as $item) {
            $name_cate = Categories::find()->where(['categories.id_category' => $item->id_category])->asArray()->all();
        }

        return $this->render('detail', [
            'products_cate' => $products_cate,
            'name_cate' => $name_cate
        ]);
    }


    protected function findModel($id_products)
    {
        if (($model = Products::findOne(['id_products' => $id_products])) !== null) {
            return $model;
        }
    }

    public function actionSearch()
    {
        $searchModel = new YourSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}