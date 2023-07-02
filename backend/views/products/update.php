<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Products $model */

$this->title = 'Update Products: ' . $model->id_products;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_products, 'url' => ['view', 'id_products' => $model->id_products]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
