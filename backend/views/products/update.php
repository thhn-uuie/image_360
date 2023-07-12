<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Products $model */

$this->title = 'Cập nhật sản phẩm: ' . $model->name_products;
$this->params['breadcrumbs'][] = ['label' => 'Quản lý sản phẩm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name_products, 'url' => ['view', 'id_products' => $model->id_products]];
$this->params['breadcrumbs'][] = 'Cập nhật sản phẩm';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
