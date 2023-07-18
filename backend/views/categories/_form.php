<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\base\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <style>
    .col-md-5 {
      width: 60%;
      height: 240px;
      background-position: center center;
      background: url(http://cliquecities.com/assets/no-image-e3699ae….jpg);
      background-color: #7cc6b7;
      background-size: cover;
      background-repeat: no-repeat;
      display: inline-block;
      box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .imagePreview {
      width: 5%;
      height: 5px;
      background-position: center center;
      background: url(http://cliquecities.com/assets/no-image-e3699ae….jpg);
      background-color: #fff;
      background-size: cover;
      background-repeat: no-repeat;
      display: inline-block;
      box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
    }

    .btn-success {
      background: #20bb9b;
      border: -2px solid #169F85;
      float: right;
    }

    .row {
      --bs-gutter-x: 29rem;
      --bs-gutter-y: 0;
    }

    element.style {
      width: 5 px;
      height: 37px;
      overflow: hidden;
    }

    .categories-pic {
      width: 20;
      height: 20;
    }

    footer {
      background: #f7f7f7;
      padding: 51px 0px;
      display: block;
    }
  </style>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../views/categories/css/form_custom.css">
  </head>



  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="col-sm-2">

          <!-- Upload image -->
          <div class="avatar-wrapper">
            <img class="categories-pic" style="    margin-top: -1px;
                margin-left: -19px;
                border-radius: 0%;
                width: 405px;
                height: 239px;" src="" />
            <div class="upload-button">
              <label for="categories-file_image">
                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
              </label>
            </div>
            <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
          </div>


          <!-- Chọn ảnh danh mục -->
          <!-- <input type="file" class="uploadFile img" value="Upload Photo"
            style="width: 5 px;height: 100px;overflow: hidden;"> -->
          <!-- </label> -->
        </div><!-- col-2 -->
        <!-- <i class="fa fa-plus imgAdd"></i> -->
      </div>

      <div class="col-md-7">


        <?= $form->field($model, 'name_category')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->dropDownList(
          [
            'Ẩn' => 'Ẩn',
            'Hiện' => 'Hiện',
          ],
          [
            'prompt' => 'Trạng thái'
          ]
        ) ?>


      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
          </div>

        </div>
      </div>



      <script>
        function imagePreview() {
          var fileSelected = document.getElementById('categories-file_image').files;
          if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function (fileLoaderEvent) {
              var srcData = fileLoaderEvent.target.result;
              $('.categories-pic').attr('src', srcData);
            }
            fileReader.readAsDataURL(fileToLoad);
          }
        }

      </script>


      <?php ActiveForm::end(); ?>

    </div>