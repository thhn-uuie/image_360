<?php
namespace frontend\widgets;
use yii\base\Widget;
use frontend\models\Products;
class recommendedWidget extends Widget {
    public $messsage;

    public $productId;  //id of curent product

    public $limit = 5;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $products = Products::find()->all();
        return $this->render('recommendedWidget', [
            'products'=> $products
        ]);
    }
}