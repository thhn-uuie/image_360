<?php

use common\models\base\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
// //hiển thị mã qr
// echo '<img src="' . $qrcodeImage . '">';
/** @var yii\web\View $this */
/** @var common\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

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

            'id_products',
                      
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
                    return Html::img('../../uploads/' . $model['image'], ['width'=>'150','height'=>'150']);
                },
                
            ],
            // 'files',
            // 'qr_code',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_products' => $model->id_products]);
                 }
            ],
        ],
    ]); ?>


</div>
