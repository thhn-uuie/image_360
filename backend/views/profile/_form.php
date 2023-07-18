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

    <!--    --><?php //= $form->field($model, 'id_user')->hiddenInput(['value' => $model->getIdUser()]) ?>
    <!--    --><?php //endif;?>

    <head>
        <link rel="stylesheet" href="../views/profile/css/upload-img.scss" type="text/css">
        <link rel="stylesheet" href="../views/profile/css/form-body.css" type="text/css">
    </head>
    <div class="container d-flex justify-content-center mt-5">
        <div class="card">
            <div class="row">
                <div class="col-md-5">

                    <!-- Upload image -->
                    <div class="avatar-wrapper">
                        <img class="profile-pic" src=""/>
                        <div class="upload-button">
                            <label for="profile-file_image">
                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                            </label>
                        </div>
                        <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
                    </div>

                </div>

                <div class="col-md-7">
                    <?php if (Yii::$app->user->identity->id_role == 1): ?>
                        <?php $ids = User::find()
                            ->select('users.id_user')
                            ->leftJoin('profile', 'users.id_user = profile.id_user')
                            ->where(['profile.id_user' => null])
                            ->column();
//
//                        ?>
                        <?= $form->field($model, 'id_user')->dropDownList(
//                            ArrayHelper::map(User::find()->where(['id_user' => $ids])->all(), 'id_user', 'username'),
                            ArrayHelper::map(User::find()->all(), 'id_user', 'username'),
                            [
                                'prompt' => 'Chọn user',
                                // 'style' => 'width: 300px'
                            ]
                        ) ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender')->radioList(
                        [
                            'Nam' => 'Nam',
                            'Nữ' => 'Nữ',
                        ]
                    ) ?>

                    <?= $form->field($model, 'enmail')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phone')->textInput() ?>

                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                </div>
            </div>
        </div>
    </div>


<!--    <script>-->
<!--        function imagePreview(input) {-->
<!--            if (input.files && input.files[0]) {-->
<!--                var reader = new FileReader();-->
<!--                reader.onload = function (event) {-->
<!--                    var fileurl = event.target.result;-->
<!--                    $('.profile-pic').attr('src', fileurl);-->
<!--                }-->
<!--                reader.readAsDataURL(input.files[0]);-->
<!--            }-->
<!--        }-->
<!---->
<!--        $(".file-upload").on('change', function () {-->
<!--            imagePreview(this);-->
<!--        });-->
<!--        $(".upload-button").on('click', function () {-->
<!--            $(".file-upload").click();-->
<!--        });-->
<!--    </script>-->
        <script>
            function imagePreview() {
            var fileSelected = document.getElementById('profile-file_image').files;
                if (fileSelected.length > 0) {
                    var fileToLoad = fileSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoaderEvent) {
                        var srcData = fileLoaderEvent.target.result;
                        $('.profile-pic').attr('src', srcData);
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
            }
        </script>
    <?php ActiveForm::end(); ?>

</div>
