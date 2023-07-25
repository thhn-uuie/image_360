<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>




<html>
<div class="overlay">
    <form>
        <div class="con">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <header class="head-form">
                <h2>Log In</h2>
                <p>login here using your username and password</p>
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
                <span>
                    <i class="fa fa-eye" aria-hidden="true" type="button" id="eye"></i>
                </span>
                <br>
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <div class="other">
                <button class="btn submits frgt-pass">Forgot Password</button>
                <button class="btn submits sign-up">Sign Up
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </button>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </form>
</div>

</html>

<style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    input[type="text"] {
    width: 300px;
    height: 35px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    margin-left: 0px;
}
    body {
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;
        font-family: 'Vibur', cursive;
        font-family: 'Abel', sans-serif;
        opacity: .95;
    }

    .form-label {
        margin-bottom: 125px;
        margin-top: 0px;
        margin-left: -70px;
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

    header h2 {
        font-size: 575%;
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
        font-family: 'Abel', sans-serif;
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

    .btn-success {
        color: #271313;
        background-color: #28a745;
        border-color: #28a745;
        margin-left: 32px;
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