<?php

use common\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_products',
            'name_products',
            'description',
            'status',
            'id_category',
            'image',
            'files',
            'qr_code',
            // [
            //     'attribute' => 'image',
            //     'format' => 'raw',
            //     'value' => function($data) {
            //         if(!is_null($data->image)) {
            //             return Html::img($data->image,
            //             ['width' => '150']
            //             );
            //         }
            //     }
            // ],

            // [
            //     'attribute' => 'status',
            //     'content' => function($model) {
            //        // var_dump($model->status);die;
            //         if ($model->status == '1') {
            //             return '<span class="label label-danger">Inactive</span>';
            //         } else {
            //             return '<span class="label label-success">Active</span>';
            //         }
            //     }
            // ],
            [

                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_products' => $model->id_products]);
                 }
            ],
        ],
    ]); ?>


</div>
