<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



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

        <div class="container">
          <div class="wrapper">
            <div class="image">
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
      </div>
      <div class="col-md-7">
        <div class="form-group">
          <?= $form->field($model, 'name_category')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-group">
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
      </div>
    </div>
  </div>





  <!-- <div class="container">
    <div class="row">
      <div class="col-md-5"> -->
  <!-- <div class="col-sm-2"> -->

  <!-- Upload image -->
  <!-- </div>
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


  </div> -->


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

