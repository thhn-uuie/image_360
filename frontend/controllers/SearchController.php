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
//            $productIds = array_column($productsSearch, 'id_products');

            if (!$productsSearch) {
                $productsSearch = null;
//                $productIds = array_column([], 'id_products');

            }
        }
        else {
            $productsSearch = null;
//            $productIds = array_column([], 'id_products');

        }

//
//// Lấy thông tin đánh giá trung bình từ truy vấn
//        $averageRatings = Rate::find()
//            ->select(['id_products', 'ROUND(AVG(rate),1) AS average_rating'])
//            ->where(['id_products' => $productIds])
//            ->groupBy('id_products')
//            ->asArray()
//            ->all();
//
//// Tạo mảng mặc định với giá trị id_products và average_rating mặc định là 0
//        $defaultRating = ['id_products' => 0, 'average_rating' => 0];
//
//// Gán giá trị mặc định cho id_products không có trong truy vấn
//        foreach ($productIds as $productId) {
//            $found = false;
//            foreach ($averageRatings as $averageRating) {
//                if ($averageRating['id_products'] == $productId) {
//                    $found = true;
//                    break;
//                }
//            }
//            if (!$found) {
//                $defaultRating['id_products'] = $productId;
//                $averageRatings[] = $defaultRating;
//            }
//        }
        return $this->render('index',
            [
                'productsSearch' => $productsSearch,
//                'averageRatings'=>$averageRatings
            ]);
    }

}
