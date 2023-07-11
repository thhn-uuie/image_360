<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \common\models\form\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>


<div class="container">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auto rotate</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
        <style>
            * {
                box-sizing: border-box;
            }

            @import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


            body {
                font-family: 'Rubik', sans-serif;
                background: #F8E8EE;
            }

            .container {
                display: flex;
                height: 100vh;
            }

            .left {
                overflow: hidden;
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: center;
                animation-name: left;
                animation-duration: 0s;
                animation-fill-mode: both;
                animation-delay: 0s;
            }

            .right {
                flex: 1;
                /*background-color: black;*/
                transition: 0.5s;
                /*background-image: url(https://cdn.pannellum.org/2.5/pannellum.htm#panorama=https://pannellum.org/images/jfk.jpg&amp;autoRotate=-2);*/
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;

            }

            #panorama {
                margin-left:100px;
            }

            .header > h2 {
                margin: 0;
                color: #4f46a5;
            }

            .header > h4 {
                margin-top: 10px;
                font-weight: normal;
                font-size: 15px;
                color: rgba(0, 0, 0, .4);
            }

            .site-login {
                /*max-width: 100%;*/
                display: flex;
                flex-direction: column;
            }

            /*.form > p {*/
            /*    text-align: right;*/
            /*}*/

            /*.form > p > a {*/
            /*    color: #000;*/
            /*    font-size: 14px;*/
            /*}*/

            .form-field {
                height: 46px;
                padding: 0 16px;
                border: 2px solid #ddd;
                border-radius: 4px;
                font-family: 'Rubik', sans-serif;
                outline: 0;
                transition: .2s;
                margin-top: 20px;
            }

            .form-field:focus {
                border-color: #0f7ef1;
            }

            .form > button {
                padding: 12px 10px;
                border: 0;
                background: linear-gradient(to right, #de48b5 0%, #0097ff 100%);
                border-radius: 3px;
                margin-top: 10px;
                color: #fff;
                letter-spacing: 1px;
                font-family: 'Rubik', sans-serif;
            }

            .animation {
                animation-name: move;
                animation-duration: .4s;
                animation-fill-mode: both;
                animation-delay: 0.5s;
            }

            @keyframes move {
                0% {
                    opacity: 0;
                    visibility: hidden;
                    transform: translateY(-40px);
                }

                100% {
                    opacity: 1;
                    visibility: visible;
                    transform: translateY(0);
                }
            }

            @keyframes left {
                0% {
                    opacity: 0;
                    width: 0;
                }

                100% {
                    opacity: 1;
                    padding: 20px 40px;
                    width: 440px;
                }
            }
        </style>
    </head>
    <div class="left">
        <div class="header">
        </div>
        <div class="site-login">
            <h1 style="font-weight: bold; color: #48303c"><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to login:</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-field a3']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-field a4']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>
    <div class="right"></div>
    <div id="panorama"></div>
    <script>
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": "https://pannellum.org/images/jfk.jpg",
            "autoRotate": -2,
            "autoLoad": true
        });
    </script>
</div>

