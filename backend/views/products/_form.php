<?php

use common\models\base\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <head>
        <link rel="stylesheet" href="../views/products/css/upload-img.scss" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>

    </head>

    <div class="card">
        <div class="row">
            <div class="col-md-5">

                <!-- Upload image -->
                <div class="avatar-wrapper">
                    <img class="products-pic" src=""/>
                    <div class="upload-button">
                        <label for="products-file_image">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        </label>
                    </div>
                    <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>

                </div>


                <div class="avatar-wrapper">
                    <img class="f360-pic" src=""/>
                    <div id="panorama"></div>

                    <label for="products-file_360">
                        <i class="fa fa-file" aria-hidden="true"></i>
                    </label>
                    <?= $form->field($model, 'file_360')->fileInput(['onchange' => 'image360Preview()']) ?>
                </div>

                <!--                <div class="show-image360">-->
                <!--                    <img class="pic-360" src=""/>-->
                <!--                    <label for="products-file_360"> </label>-->
                <!--                </div>-->
                <!--                --><?php //= $form->field($model, 'file_360')->fileInput(['onchange' => 'image360Preview()']) ?>
            </div>
            <div class="col-md-7">
                <div class="col-md-10">
                    <?= $form->field($model, 'name_products')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        [
                            'Hoạt động' => 'Hoạt động',
                            'Không hoạt động' => 'Không hoạt động',
                        ],
                        [
                            'prompt' => 'Trạng thái'
                        ]
                    ) ?>

                    <?= $form->field($model, 'id_category')->dropDownList(
                        ArrayHelper::map(Categories::find()->all(), 'id_category', 'name_category'),
                        [
                            'prompt' => 'Danh mục'
                        ]
                    ) ?>

                    <?= $form->field($model, 'qr_code')->hiddenInput(['id_products' => 'qr_code'])->label(false) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        function imagePreview() {
            var fileSelected = document.getElementById('products-file_image').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function (fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    $('.products-pic').attr('src', srcData);
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }

    </script>


    <script>
        function image360Preview() {
            var fileSelected = document.getElementById('products-file_360').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function (fileLoaderEvent) {
                    var url = fileLoaderEvent.target.result;
                    pannellum.viewer('panorama', {
                        "type": "equirectangular",
                        "panorama": url,
                        "autoLoad": true
                    });
                    $('.pic-360').attr('src', url);
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }

    </script>


    <?php ActiveForm::end(); ?>

</div>
