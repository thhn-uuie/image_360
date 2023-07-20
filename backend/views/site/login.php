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
        <link rel="stylesheet" href="../views/site/css/login-style.css" type="text/css">
    </head>
    <div class="left">
        <div class="header">
        </div>

        <div class="site-login">
            <h1 style="font-weight: bold; color: #f25555; padding-left:70px; margin-bottom:50px"><?= Html::encode($this->title) ?></h1>
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
            "panorama": "login-image.jpg",
            "autoRotate": -2,
            "autoLoad": true
        });
    </script>
</div>

