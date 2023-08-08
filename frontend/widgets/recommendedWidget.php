<?php
namespace frontend\widgets;
use yii\base\Widget;
use frontend\models\Products;
class recommendedWidget extends Widget {
    public $messsage;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $products = Products::find()
            ->all();
        shuffle($products);
        $randomProducts = array_rand($products, 8);
        $recommendedProducts = [];
        foreach ($randomProducts as $productKey) {
            $recommendedProducts[] = $products[$productKey];
        }
        return $this->render('recommendedWidget', [
            'products'=> $recommendedProducts
        ]);
    }
}