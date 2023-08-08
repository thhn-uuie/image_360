<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <link rel="stylesheet" href="../web/login/login.css" type="text/css">
</head>

<html>
<div class="overlay">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <form>
        <div class="con">

            <header class="head-form">
                <h5>Đăng nhập</h5>
            </header>
            <br>
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

            

        </div>
    </form>
    <?php ActiveForm::end(); ?>

</div>

</html>

