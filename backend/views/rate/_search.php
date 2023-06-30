<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\search\RateSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_rate') ?>

    <?= $form->field($model, 'id_products') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'comment') ?>

    <?= $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
