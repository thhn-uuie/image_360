<?php

namespace frontend\controllers;

use frontend\models\Categories;
use frontend\models\Products;
use common\models\base\View;
use Yii;
use yii\web\NotFoundHttpException;
use frontend\widgets\widgets\recommendedWidget;
use yii\web\Response;


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

        $viewProducts = View::findOne(['id_products' => $id_products]);
        if ($viewProducts !== null) {
            $temp = $viewProducts->view_count;
            $viewProducts->view_count = $temp + 1;
            $viewProducts->save();
        } else {
            $model = new View();
            $model->id_products = $id_products;
            $model->view_count = 1;
            $model->save();
        }

        $products = $this->findModel($id_products);
        $name_cate = Categories::findOne(['id_category' => $products->id_category]);
        $viewCount = $products->getViewProducts($id_products);

        return $this->render('detail', [
            'products' => $this->findModel($id_products),
            'viewCount' => $viewCount,
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



        // $searchModel = new ProductSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $keyword);

        // return $this->render('search', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);

        // $product = new Products();
        // $product->load(Yii::$app->request->get());
        // var_dump();
        // die;

        $keyword = Yii::$app->request->get('search');

        $result = Products::find()
            ->where(['like', 'name_products', $keyword])
            ->all();

            return $this->render('search', [
                'result' => $result
            ]);
            // $data = [];
            // foreach ($result as $result) {
            //     $data[] = [
            //         'id_products' => $result->id_products,
            //         'name_products' => $result->name_products,
            //     ];
            // }

            // Yii::$app->response->format = Response::FORMAT_JSON;
            // return $data;
    }

    public function actionAutocomplete($keyword)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $products = Products::find()
            ->where(['like', 'name_products', $keyword])
            ->all();

        $result = [];
        foreach ($products as $product) {
            $result[] = ['value' => $product->name_products, 'data' => $product->id_products];
        }

        return ['suggestions' => $result];
    }

}