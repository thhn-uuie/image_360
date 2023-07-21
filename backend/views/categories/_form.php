<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <style>
        .container .wrapper {
      position: relative;
      height: 200px;
      width: 300px;
      border-radius: 10px;
      background: #fff;
      border: 2px dashed #c2cdda;
      display: flex;
      margin-left: 108px;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .wrapper.active {
      border: none;
    }

    .wrapper .image {
      position: absolute;
      height: 100%;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wrapper img {
      height: 500px;
      width: 100%;
      object-fit: cover;
    }

    .wrapper .icon {
      margin-left: 30px;
      font-size: 100px;
      color: #9658fe;
    }

    .wrapper .text {
      font-size: 20px;
      font-weight: 500;
      color: #5B5B7B;
    }

    .wrapper #cancel-btn i {
      position: absolute;
      font-size: 20px;
      right: 15px;
      top: 15px;
      color: #9658fe;
      cursor: pointer;
      display: none;
    }

    .wrapper.active:hover #cancel-btn i {
      display: block;
    }

    .wrapper #cancel-btn i:hover {
      color: #e74c3c;
    }

    .wrapper .file-name {
      position: absolute;
      bottom: 0px;
      width: 100%;
      padding: 8px 0;
      font-size: 18px;
      color: #fff;
      display: none;
      background: linear-gradient(135deg, #3a8ffe 0%, #9658fe 100%);
    }

    .wrapper.active:hover .file-name {
      display: block;
    }

    .container #custom-btn {
      margin-top: 30px;
      margin-left: 200px;
      display: block;
      width: 40%;
      height: 40px;
      border: none;
      outline: none;
      border-radius: 25px;
      color: #FBE9E7;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      text-transform: uppercase;
      cursor: pointer;
      background: linear-gradient(135deg, #3a8ffe 0%, #9658fe 100%);
    }

    .form-group.field-products-file_360 label.control-label {
      color: white;
      margin-left: 18px;
      margin-top: 7px;
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
      margin-top: 80px;
      margin-right: 254px;
    }

    .row {
      --bs-gutter-x: 29rem;
      --bs-gutter-y: 0;
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

    label {
    display: inline-block;
    margin-bottom: -20.5rem;
    color: black;
    }

    .form-group {
    margin-bottom: 10px;
    }

    label {
    display: inline-block;
    margin-bottom: 0.5rem;
    color: #111c5b;
    margin-top: 8px;
    margin-left: 9px;
    }

  </style>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="https://codepen.io/gymratpacks/pen/VKzBEp#0">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../views/categories/css/form_custom.css" type="text/css">
  </head>



  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <!-- <div class="col-sm-2"> -->

        <!-- Upload image -->
      </div>
      <div class="container">
        <div class="wrapper">
          <div class="image" >
            <img class="categories-pic">
          </div>
          <div class="content">
            <div class="icon">
              <i class="fa fa-cloud-upload"></i>
            </div>
            <div class="text">
              No file chosen, yet!
            </div>
          </div>
          <div id="cancel-btn">
            <i class="fas fa-times"></i>
          </div>
          <div class="file-name">
            File name here
          </div>
        </div> 

        <label for="categories-file_image">

          <div id="custom-btn">
            <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
          </div>
        </label>

      </div>
      <!-- <div class="avatar-wrapper">
        
        <img class="categories-pic" style="    margin-top: -1px;
                margin-left: -19px;
                border-radius: 0%;
                width: 500px;
                height: 239px;" src="" />
        <div class="upload-button">
          <label for="categories-file_image">
            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
          </label>
        </div>
        <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
      </div> -->
    </div>
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

      </form>
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