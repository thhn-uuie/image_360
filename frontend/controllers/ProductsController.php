<?php

namespace frontend\controllers;

use common\helper\StarProducts;
use common\models\base\Rate;
use frontend\models\Categories;
use frontend\models\Products;
use common\models\base\View;
use Yii;
use frontend\widgets\widgets\recommendedWidget;


class ProductsController extends \yii\web\Controller
{
    public function actionProductsCategory($id_cate)
    {
        $products = new Products();

        $products_cate = $products->getProductsCate($id_cate);


        $star = new StarProducts();
        $averageRatings = $star->getStar($products_cate);


        return $this->render('products-category', [
            'products_cate' => $products_cate,
            'averageRatings'=> $averageRatings
        ]);
    }

    public function actionDetail($id_products)
    {
        $products = $this->findModel($id_products);

        if (!Yii::$app->user->isGuest) {
            $rateProducts = Rate::findOne(['id_products' => $id_products, 'id_user' => Yii::$app->user->identity->getId()]);

            if (Yii::$app->request->isPost) {
                $id_products_current = Yii::$app->request->post('id_products_current');
                $id_user_current = Yii::$app->request->post('id_user_current');
                $comment = Yii::$app->request->post('comment');
                $product_rating = Yii::$app->request->post('product_rating');
                if ($rateProducts !== null) {

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
        }

        $rateAvg = $products->getRateProducts($id_products);

        $viewProducts = View::findOne(['id_products' => $id_products]);
        // Kiểm tra trường HTTP_CACHE_CONTROL trong tiêu đề
        $cacheControl = Yii::$app->request->headers->get('cache-control');
        if (strpos($cacheControl, 'max-age=0') === false) {
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


    public function actionSearch() {
        $keyword = Yii::$app->request->get('search');

        $result = Products::find()
            ->where(['name_products'=>$keyword])
            ->all();

        return $this->render('search', [
            'result' => $result
        ]);
    }
    public function actionShowAll() {
        return $this->render('show-all');
    }
 }