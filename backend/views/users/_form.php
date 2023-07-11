<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\base\Role;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\base\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_role')->dropDownList(
       ArrayHelper::map(Role::find()->all(),'id_role', 'name'),
       [
           'prompt'=>'Lựa chọn chức năng'
       ]
   ) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
