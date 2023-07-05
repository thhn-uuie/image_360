<?php

use common\models\base\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\base\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name_products')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            'Hoạt động' => 'Hoạt động',
            'Không hoạt động' => 'Không hoạt động',
        ],
        [
            'prompt' => 'Trạng thái'
        ]
    ) ?>

    <?= $form->field($model, 'id_category')->dropDownList(
        ArrayHelper::map(Categories::find()->all(),'id_category', 'name_category'),
        [
            'prompt' => 'Danh mục'
        ]
    ) ?>

    <?= $form->field($model, 'file_image')->fileInput() ?>

    <?= $form->field($model, 'file_360')->fileInput() ?>

    <?= $form->field($model, 'qr_code')->hiddenInput(['id_products'=>'qr_code'])->label(false) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
