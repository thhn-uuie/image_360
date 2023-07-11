<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if (Yii::$app->user->identity->id_role == 1):?>

    <?= $form->field($model, 'id_user')->dropDownList(
       ArrayHelper::map(User::find()->all(),'id_user','username'),
       [
           'prompt' => 'Chọn user'
       ]
   ) ?>
   <?php else: ?>
    <?= $form->field($model, 'id_user')->hiddenInput(['value' => $model->getIdUser()]) ?>
    <?php endif;?>

    <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()']) ?>
    <div id = "displayImg"></div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <script>
        function imagePreview() {
        var fileSelected = document.getElementById('profile-file_image').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var previewImage = document.createElement('img');
                    previewImage.src = srcData;
                    previewImage.style.height = '150px';
                    previewImage.style.width = '140px';
                    document.getElementById('displayImg').innerHTML = previewImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
    <?php ActiveForm::end(); ?>

</div>
