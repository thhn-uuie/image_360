<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \common\models\form\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>


<html>
<div class="overlay">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <form>
        <div class="con">
            <header class="head-form">
                <h5>Đăng nhập</h5>
            </header>

            <div class="field-set">
                <span class="input-item">
                    <i class="fa fa-user-circle"></i>
                </span>
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                <br>
                <span class="input-item">
                    <i class="fa fa-key"></i>
                </span>
                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <br>
                <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
            </div>

            <div class="other">
                <button class="btn submits frgt-pass">Quên mật khẩu?</button>
                <button class="btn submits sign-up">Đăng ký
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
            </div>

        </div>
    </form>
    <?php ActiveForm::end(); ?>

</div>

</html>

