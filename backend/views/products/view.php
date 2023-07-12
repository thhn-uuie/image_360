<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/** @var yii\web\View $this */
/** @var common\models\Products $model */

$this->title = $model->name_products;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>



<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_products' => $model->id_products], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_products' => $model->id_products], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_products',
            'name_products',
            'description',
            'status',
            'id_category',
            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',             
                'value' => Html::img('../../uploads/'.$model['image'], ['width'=>'150'])
                
            ],
            //'files',
            [
                //'label' => 'anh',
                'attribute' => 'files',
                'format' => 'raw',
                'value' => $this->render('view360', ['model' => $model]),
                'contentOptions' => ['style' => 'width:150px; height:150px;'],
            ],
            //'qr_code',
            [
                'attribute' => 'qr_code',
                'format' => 'html',             
                'value' => Html::img('../../qr/'.$model['qr_code'], ['width'=>'150'])
            ],
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
