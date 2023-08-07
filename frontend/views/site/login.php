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
                <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </form>
    <?php ActiveForm::end(); ?>

</div>

</html>

<style>
    /* @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur'); */

    /** {*/
    /*    padding: 0;*/
    /*    margin: 0;*/
    /*    box-sizing: border-box;*/
    /*}*/

    input[type="text"] {
        width: 300px;
        height: 35px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
        /* margin-left: 6%; */
    }

    body {
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
        font-family: 'Serif font', cursive;
        font-family: 'Serif font', sans-serif;
        opacity: .95;
        font-size: 14px;
    }

    .form-label {
        margin-bottom: 125px;
        margin-top: 0px;
        margin-left: -28%;
    }

    .form-control {
        display: block;
        width: 300px;
        height: 35px;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        position: relative;
        transition: transform 0.3s ease-in-out;
        margin-top: -160px;
        margin-left: 6%;
    }

    .form-control:hover {
        transform: translateY(10px);
    }

    .fa {
        margin-left: -55px;
        margin-bottom: 0px;
        margin-top: 10px;
    }

    form {
        width: 550px;
        min-height: 400px;
        height: auto;
        border-radius: 5px;
        margin: 2% auto;
        box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
        padding: 2%;
        background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
    }

    form .con {
        display: -webkit-flex;
        display: flex;

        -webkit-justify-content: space-around;
        justify-content: space-around;

        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;

        margin: 0 auto;
    }

    header {
        margin: 2% auto 10% auto;
        text-align: center;
    }

    header h5 {
        font-size: 400%;
        font-family: 'Playfair Display', serif;
        color: #056d39;
    }

    header p {
        letter-spacing: 0.05em;
    }

    .input-item {
        background: #fff;
        color: #333;
        padding: 14.5px 0px 15px 9px;
        border-radius: 5px 0px 0px 5px;
    }

    input[class="form-input"] {
        width: 250px;
        height: 50px;

        margin-top: 2%;
        padding: 15px;

        font-size: 16px;
        font-family: 'Arial', sans-serif;
        color: #5E6472;

        outline: none;
        border: none;

        border-radius: 0px 5px 5px 0px;
        transition: 0.2s linear;

    }

    input[id="txt-input"] {
        width: 250px;
    }

    input:focus {
        transform: translateX(-2px);
        border-radius: 5px;
    }


    button {
        display: inline-block;
        color: #14842f;

        width: 256px;
        height: 50px;

        padding: 0 20px;
        background: #fff;
        border-radius: 5px;

        outline: none;
        border: none;

        cursor: pointer;
        text-align: center;
        transition: all 0.2s linear;

        margin: 7% auto;
        letter-spacing: 0.05em;
    }

    .submits {
        width: 48%;
        display: inline-block;
        float: left;
        margin-left: 100px;
        -top: -60px;
    }

    button[type="submit"] {
        padding: 8px 12px;
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        color: white;
        cursor: pointer;
        margin-left: 14%;
    }

    .fa-user-plus:before {
        content: "\f234";
        margin-left: -70px;
    }

    .frgt-pass {
        background: transparent;
    }

    .sign-up {
        background: #B8F2E6;
    }


    button:hover {
        transform: translatey(3px);
        box-shadow: none;
    }

    button:hover {
        animation: ani9 0.4s ease-in-out infinite alternate;
    }

    @keyframes ani9 {
        0% {
            transform: translateY(3px);
        }

        100% {
            transform: translateY(5px);
        }
    }
</style>