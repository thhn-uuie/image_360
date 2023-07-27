<?php
namespace frontend\widgets;
use yii\base\Widget;
use common\models\Products;
class allProductsWidget extends Widget {
    public $messsage;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $products = Products::find()->where(['products.status' => 'Hoạt động'])->all();
        return $this->render('allProductsWidget', [
            'products' => $products
        ]);
    }
}