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
                position: relative;
            }

            .left {
                /*overflow: hidden;*/
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                justify-content: center;
                animation-name: left;
                animation-duration: 0s;
                animation-fill-mode: both;
                animation-delay: 0s;
            }

            #panorama {
                margin-left:100px;
                position: relative;
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
                padding-left: 90px;

            }


            .form-field {
                height: 46px;
                width:300px;
                padding: 0 16px;
                border: 2px solid #ddd;
                border-radius: 4px;
                font-family: 'Rubik', sans-serif;
                outline: 0;
                transition: .2s;
                margin-top: 10px;
            }

            .form-field:focus {
                border-color: #F48FB1;

            }

            .btn-login {
                padding: 12px 127px;
                border: 1px solid transparent;
                vartical-align: middle;
                text-align: center;
                background: linear-gradient(to right, #ff5151 0%, #ff7b7b 100%);
                border-radius: 3px;
                margin-top: 10px;
                color: #ffffff;
                letter-spacing: 1px;
                font-size:15px;
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
<!--        <h1 style="font-weight: bold;white-space: nowrap; color: #cc0a2f"> TRÌNH DIỄN ẢNH 360</h1>-->
        <div class="site-login">
            <h1 style="font-weight: bold; color: #f25555; padding-left:70px; margin-bottom:50px"><?= Html::encode($this->title) ?></h1>
<!--            <p style="color: #450808; font-size: 15px;">Please fill out the following fields to login:</p>-->
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-field a3']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-field a4']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn-login', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

    <div id="panorama">
    </div>
    <script>
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": "https://pannellum.org/images/jfk.jpg",
            "autoRotate": -2,
            "autoLoad": true
        });
    </script>
</div>

