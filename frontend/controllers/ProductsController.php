<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\Products;
use common\models\base\View;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProductsCategory($id_cate)
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

        if (!$products->countView($id_products)) {
            $view = new View();
            $view->id_products = $id_products;
            $view->view_count += 1;
            $view->save();
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
        // $searchModel = new YourSearchModel();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('search', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);


        // $keyword = Yii::$app->request->get('keyword','');

        // $query = Products::find()->where(['like', 'name',$keyword]);
        // $products=$query->all();
        // return $this->render('search',[
        //     'products'=>$products,
        //     'keyword'=>$keyword,
        // ]);

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $keyword);
    
        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}