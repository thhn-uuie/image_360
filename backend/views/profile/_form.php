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

    <?php if (Yii::$app->user->identity->id_role == 1): ?>
        <?php $ids = User::find()
            ->select('users.id_user')
            ->leftJoin('profile', 'users.id_user = profile.id_user')
            ->where(['profile.id_user' => null])
            ->column();

        ?>
        <?= $form->field($model, 'id_user')->dropDownList(
            ArrayHelper::map(User::find()->where(['id_user' => $ids])->all(), 'id_user', 'username'),
            [
                'prompt' => 'Chọn user',
                'style' => 'width: 300px'
            ]
        ) ?>
    <?php endif; ?>

    <!--    --><?php //= $form->field($model, 'id_user')->hiddenInput(['value' => $model->getIdUser()]) ?>
    <!--    --><?php //endif;?>

    <style>
        .avatar-wrapper {
            position: relative;
            height: 200px;
            width: 200px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 2px 1px 15px -5px #360303;
            transition: all .3s ease;
            margin-bottom: 30px;
            margin-top: 30px;

            &:hover {
                transform: scale(1.05);
                cursor: pointer;
            }

            &:hover .profile-pic {
                opacity: .5;
            }

            .profile-pic {
                height: 100%;
                width: 100%;
                transition: all .3s ease;

            &:after {
                font-family: FontAwesome;
                content: "\f007";
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                font-size: 190px;
                background: #ab9443;
                color: #fff8de;
                text-align: center;
            }

            }
            .upload-button {
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;

                .fa-arrow-circle-up {
                    position: absolute;
                    font-size: 234px;
                    top: -17px;
                    left: 0;
                    text-align: center;
                    opacity: 0;
                    transition: all .3s ease;
                    color: #000000;
                }

                &:hover .fa-arrow-circle-up {
                    opacity: .9;
                }

            }
        }
    </style>
    <div class="avatar-wrapper">
        <img class="profile-pic" src=""/>
        <div class="upload-button">
            <label for="profile-file_image"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></label>
        </div>
        <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview(this)', 'style' => 'display:none']) ?>
    </div>


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
    <script>
        function imagePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    var fileurl = event.target.result;
                    $('.profile-pic').attr('src', fileurl);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function () {
            imagePreview(this);
        });
        $(".upload-button").on('click', function () {
            $(".file-upload").click();
        });
    </script>
    <!--    <script>-->
    <!--        function imagePreview() {-->
    <!--        var fileSelected = document.getElementById('profile-file_image').files;-->
    <!--            if (fileSelected.length > 0) {-->
    <!--                var fileToLoad = fileSelected[0];-->
    <!--                var fileReader = new FileReader();-->
    <!--                fileReader.onload = function(fileLoaderEvent) {-->
    <!--                    var srcData = fileLoaderEvent.target.result;-->
    <!--                    var previewImage = document.createElement('img');-->
    <!--                    previewImage.src = srcData;-->
    <!--                    previewImage.style.height = '150px';-->
    <!--                    previewImage.style.width = '140px';-->
    <!--                    document.getElementById('profile-pic').innerHTML = previewImage.outerHTML;-->
    <!--                }-->
    <!--                fileReader.readAsDataURL(fileToLoad);-->
    <!--            }-->
    <!--        }-->
    <!--    </script>-->
    <?php ActiveForm::end(); ?>

</div>
