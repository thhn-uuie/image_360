<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Categories;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name_products')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            '0' => 'Inactive',
            '1' => 'Active',
        
        ]
    ) ?>

    <?= $form->field($model, 'id_category')->dropDownList(
        ArrayHelper::map(Categories::find()->all(),'id_category', 'name_category'),
        [
            'prompt'=>'Select One'
        ]
    ) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'files')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qr_code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
