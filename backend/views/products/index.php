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


$this->title = 'Quản lý sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tạo sản phẩm mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => 'Hiển thị <strong>{begin}-{end}</strong> sản phẩm của <strong>{totalCount}</strong> sản phẩm',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header'=>'STT',
                'headerOptions' => [
                    'style' => 'width:20px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:20px;text-align:center'
                ],
                ],

            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img('../../image/products/' . $model['image'], ['width' => '100', 'height' => '100'], ['class' => 'circular-image']);
                },

                    'headerOptions' => [
                        'style' => 'width:150px;text-align:center'
                    ],
                    'contentOptions' => [
                        'style' => 'width:150px;text-align:center'
                    ],

            ],
            [
                    'attribute' => 'name_products',
                'headerOptions' => [
                    'style' => 'width:300px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:300px;text-align:center'
                ],
                ],
//            [
//                'attribute' => 'description',
//                'headerOptions' => [
//                    'style' => 'width:200px;text-align:center'
//                ],
//            ],


//            'status',


            [
                'attribute' => 'id_category',
                'headerOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],

                'filter' => Html::activeDropDownList(
                    $searchModel,
                    'id_category',
                    \common\models\Products::getCategoriesName(),
                    ['class' => 'form-control', 'prompt' => 'Chọn']
                ),
                'value' => function ($model) {
                    return $model->category->name_category;
                },

            ],


            // ],
            //'qr_code',
//            [
//                'attribute' => 'qr_code',
//                'format' => 'html',
//                'value' => function ($model) {
//                    return Html::img('../../qr/' . $model['qr_code'], ['width' => '150']);
//                }
//            ],
            [
                'attribute' => 'created_at',
                'content' => function ($model) {
                    return date('d-m-Y h:i:s', $model->created_at);
                },
                'headerOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:200px;text-align:center'
                ],
            ],
            [
                'attribute' => 'created_by',

                'headerOptions' => [
                    'style' => 'width:110px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:110px;text-align:center'
                ],
            ],

//            [
//                'attribute' => 'updated_at' ,
//                'content' => function($model) {
//                    return date('d-m-Y h:i:s', $model->created_at);
//                }
//            ],
//             'updated_by',

            [
                'attribute' => 'status',
                'content' => function ($model) {
                    if ($model->status == 'Hoạt động') {
                        return '<span class="badge bg-success" style="font-size: 12px;">Hoạt động</span>';
                    } else {
                        return '<span class="badge bg-danger" style="font-size: 12px;">Không hoạt động</span>';
                    }
                },
                'headerOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'width:150px;text-align:center'
                ],
            ],
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
