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
            
                      
            'name_products',
            'description',

            [
                    'attribute' => 'status',
                    'content' => function($model) {
                        if($model->status == 'Hoạt động') {
                            return '<span class="badge text-bg-success" style="font-size: 12px;">Họat động</span>';
                        } else {
                            return '<span class="badge text-bg-danger" style="font-size: 12px;">Không hoạt động</span>';
                        }
                    },
                    'headerOptions' => [
                            'style' => 'width:150px; text-align:center'
                    ],
                    'contentOptions' => [
                            'style' => 'width:150px; text-align:center'
                    ]
            ],
           
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
                'value' => function($model) {
                    return $model->id_category;
                },

            ],

            [
                'attribute' => 'image',
                'format' => 'html',             
                   'value' => function($model) {
                    return Html::img('../../uploads/' . $model['image'], ['width'=>'100','height'=>'100'], ['class' => 'circular-image']);
                    //return Html::tag('div', Html::img('../../uploads/' . $model['image'], ['width'=>'100','height'=>'100']), ['class' => 'circular-image']);
                },
            ],

//            [
//                'attribute' => 'files',
//                'format' => 'html',
//                'value' => function($model) {
//                    return Html::img('../../file360/' . $model['files'], ['width'=>'150','height'=>'150']);
//                },
//
//            ],

//            [
//                'attribute' => 'qr_code',
//                'format' => 'html',
//                'value' => function($model) {
//                    return Html::img('../../qr/'.$model['qr_code'], ['width'=>'150']);
//                }
//            ],

            [
                'attribute' => 'created_at' ,
                'content' => function($model) {
                    return date('d-m-Y', $model->created_at);
                }
            ],

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
        
    ]); ?>


</div>
