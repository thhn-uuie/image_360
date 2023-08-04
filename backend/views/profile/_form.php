<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var common\models\Profile $model */
/** @var yii\widgets\ActiveForm $form */
?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="../views/profile/css/upload-img.scss" type="text/css">
    <link rel="stylesheet" href="../views/profile/css/form-body.css" type="text/css">
</head>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card">
            <div class="row">
                <div class="col-md-5">

                    <!-- Upload image -->
                    <div class="avatar-wrapper">
                        <?php if ($model->avatar !== null): ?>
                            <img class="profile-pic" src="<?php echo '../../image/avatars/' . $model->avatar ?>"/>
                        <?php else: ?>
                            <img class="profile-pic" src=""/>
                        <?php endif; ?>
                        <div class="upload-button">
                            <label for="profile-file_image">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </label>
                        </div>
                        <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
                    </div>

                </div>

                <div class="col-md-7">

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Nhập ngày sinh...'],
                        'pluginOptions' => [
                            'autoclose' => true
                        ],
                    ]) ?>


                    <?= $form->field($model, 'gender')->radioList(
                        [
                            'Nam' => 'Nam',
                            'Nữ' => 'Nữ',
                        ]
                    ) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- JS: image preview    -->
    <script>
        function imagePreview() {
            var fileSelected = document.getElementById('profile-file_image').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function (fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    $('.profile-pic').attr('src', srcData);
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>
    <?php ActiveForm::end(); ?>

</div>
