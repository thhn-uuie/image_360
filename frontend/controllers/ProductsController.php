<?php

namespace frontend\controllers;

use common\models\base\Rate;
use frontend\models\Categories;
use frontend\models\Products;
use common\models\base\View;
use Yii;
use yii\web\NotFoundHttpException;
use frontend\widgets\widgets\recommendedWidget;

class ProductsController extends \yii\web\Controller
{

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
        $rateProducts = Rate::findOne(['id_products' => $id_products, 'id_user' => Yii::$app->user->identity->getId()]);
        $products = $this->findModel($id_products);

        if (Yii::$app->request->isPost) {
            $id_products_current = Yii::$app->request->post('id_products_current');
            $id_user_current = Yii::$app->request->post('id_user_current');
            $comment = Yii::$app->request->post('comment');
            $product_rating = Yii::$app->request->post('product_rating');
            if ($rateProducts !== null) {
                $rateProducts->id_products = $id_products_current;
                $rateProducts->id_user = $id_user_current;
                $rateProducts->comment = $comment;
                $rateProducts->rate = $product_rating;
                $rateProducts->time = time();
                $rateProducts->save(false);
            } else {
                $modelRate = new Rate();
                $modelRate->id_products = $id_products_current;
                $modelRate->id_user = $id_user_current;
                $modelRate->comment = $comment;
                $modelRate->rate = $product_rating;
                $modelRate->time = time();
                $modelRate->save(false);
            }
        }

        $rateAvg = $products->getRateProducts($id_products);

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

        $name_cate = Categories::findOne(['id_category' => $products->id_category]);
        $viewCount = $products->getViewProducts($id_products);

        return $this->render('detail', [
            'products' => $this->findModel($id_products),
            'viewCount' => $viewCount,
            'name_cate' => $name_cate,
            'rateAvg' => $rateAvg
        ]);
    }

    protected function findModel($id_products)
    {
        if (($model = Products::findOne(['id_products' => $id_products])) !== null) {
            return $model;
        }
    }


    public function actionRateReview()
    {

        $id_products_current = Yii::$app->request->post('id_products_current');
        $id_user_current = Yii::$app->request->post('id_user_current');
        $comment = Yii::$app->request->post('comment');
        $rate = '2';
        $modelRate = new Rate();
        $modelRate->id_products = $id_products_current;
        $modelRate->id_user = $id_user_current;
        $modelRate->comment = $comment;
        $modelRate->rate = $rate;
        $modelRate->time = time();
        $modelRate->save(false);
    }
}