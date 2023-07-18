<?php

use common\models\base\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

//$this->registerJsFile('@web/js/three.js', ['position' => View::POS_HEAD]);

$this->title = 'Quản lý sản phẩm';
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

            //'id_products',

            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('../../uploads/' . $model['image'], ['width' => '100', 'height' => '100']);
                },
            ],
            'name_products',
            'description',
            'status',
            // [
            //     'attribute' => 'status',
            //     'filter' => Html::activeDropDownList(
            //         $searchModel,
            //         'status',
            //         \common\models\Products::getStatus(),
            //         ['class' => 'form-control', 'prompt' => 'Chọn']
            //     ),
            //     'value' => function($model) {
            //         return $model->status;
            //     },
            // ],
            //'id_category',

            [
                'attribute' => 'id_category',
                // 'content' => function($model) {
                //     if($model->id_category == 'Con người') {
                //         return '<span class="badge text-bg-success" style="font-size: 12px;">Condsd người</span>';
                //     } else {
                //         return '<span class="badge text-bg-danger" style="font-size: 12px;">Con người</span>';
                //     }
                // },
                'headerOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],

                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'id_category',
                    \common\models\Products::getCategories(),
                    ['class' => 'form-control', 'prompt' => 'Chọn']
                ),
                'value' => function ($model) {
                    return $model->id_category;
                },

            ],

            [
                'attribute' => 'image',
                'format' => 'html',             
                   'value' => function($model) {
                    return Html::img('../../uploads/' . $model['image'], ['width'=>'100','height'=>'100'], ['class' => 'circular-image']);
                },
            ],

            // ],
            //'qr_code',
            [
                'attribute' => 'qr_code',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('../../qr/' . $model['qr_code'], ['width' => '150']);
                }
            ],
            'created_at',
            'created_by',

//            [
//                'attribute' => 'updated_at' ,
//                'content' => function($model) {
//                    return date('d-m-Y', $model->created_at);
//                }
//            ],
//             'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_products' => $model->id_products]);
                }
            ],
        ],
    ],
    ); ?>


</div>
