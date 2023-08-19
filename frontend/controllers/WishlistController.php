<?php

namespace frontend\controllers;

use common\helper\StarProducts;
use frontend\models\Products;
use frontend\models\Wishlist;
use Yii;
use yii\db\Query;

class WishlistController extends \yii\web\Controller
{
    public function actionAdd($id)
    {
        if (!Yii::$app->user->isGuest) {
            $wisDb = Wishlist::find()->where(['id_products'=>$id])->all();
            if(!$wisDb) {
                $wishList = new Wishlist();
                $wishList->id_user = Yii::$app->user->identity->id_user;
                $wishList->id_products = $id;
                $wishList->created_at = time();
                $wishList->save(false);
            }
        }
    }

    public function actionViewWis() {
        $query = (new Query())
            ->select('*')
            ->from('wishlist')
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $query;
    }

    public function actionWishlist()
    {
        if(!Yii::$app->user->isGuest){
            $wis = Products::find()
                ->innerJoin('wishlist', 'wishlist.id_products = products.id_products')
                ->where(['id_user'=>Yii::$app->user->identity->getId()])
                ->all();
            $starHelper = new StarProducts();
            $star = $starHelper->getStar($wis);
        } else {
            return $this->redirect(['site/login']);
        }
        return $this->render('wishlist',
        [
            'wis'=>$wis,
            'star'=>$star
        ]);
    }

    public function actionDelete($id) {
        if (!Yii::$app->user->isGuest) {
            $product = $this->findModel($id);
            $product ->delete();
//            return $this->redirect(['wishlist']);
        }
    }

    protected function findModel($id_products)
    {
        if (($model = Wishlist::findOne(['id_products' => $id_products])) !== null) {
            return $model;
        }
    }
}
