<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\base\Role;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\base\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">


    <?php $form = ActiveForm::begin(); ?>


    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../views/users/css/custom.css">
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">


                <fieldset>

                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'id_role')->dropDownList(
                        ArrayHelper::map(Role::find()->all(), 'id_role', 'name'),
                        [
                            'prompt' => 'Lựa chọn chức năng',
                        ]
                    ) ?>

                </fieldset>


                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>

                </form>
            </div>
        </div>

    </body>

    </html>




    <?php ActiveForm::end(); ?>


</div>