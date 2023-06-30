<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\View $model */

$this->title = 'Update View: ' . $model->id_view;
$this->params['breadcrumbs'][] = ['label' => 'Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_view, 'url' => ['view', 'id_view' => $model->id_view]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
