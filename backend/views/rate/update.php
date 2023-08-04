<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\base\Rate $model */

$this->title = 'Update Rate: ' . $model->id_rate;
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rate, 'url' => ['view', 'id_rate' => $model->id_rate]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
