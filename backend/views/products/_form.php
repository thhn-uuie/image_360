<?php

use common\models\base\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Itstructure\CKEditor\CKEditor;

/** @var yii\web\View $this */
/** @var common\models\Products $model */
/** @var yii\widgets\ActiveForm $form */


?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
    <link rel="stylesheet" href="../product/upload-img.scss" type="text/css">
    <link rel="stylesheet" href="../product/upload.css" type="text/css">
</head>
<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="card">
        <div class="row">
            <div class="col-md-5">

                <!-- Upload image -->
                <div class="avatar-wrapper">
                    <?php if ($model->image !== null): ?>
                        <img class="products-pic" src="<?php echo Yii::$app->homeUrl.'../../image/products/' . $model->image ?>"/>
                    <?php else: ?>
                        <img class="products-pic" src=""/>
                    <?php endif; ?>

                    <div class="upload-button">
                        <label for="products-file_image">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                        </label>
                    </div>
                    <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()', 'style' => 'display:none']) ?>
                </div>

                <!-- Upload 360-->
                <div class="container-pr">
                    <div class="wrapper">
                        <div class="image">
                            <?php if ($model->files !== null): ?>

                                <style>
                                    #panorama {
                                        width: 336px!important;
                                        height: 200px!important;
                                    }
                                </style>

                            <?= $this->render('view360', ['model'=>$model]) ?>
                            <?php else: ?>

                            <div id="panorama" style="width:336px; height:200px;"></div>
                            <?php endif; ?>

                        </div>
                        <div class="content">
                            <div class="icon">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div class="text">
                                Chưa chọn file nào!
                            </div>
                        </div>
                        <div id="cancel-btn">
                            <i class="fas fa-times"></i>
                        </div>

                    </div>

                    <label class="products-360-label" for="products-file_360">
                        <div id="custom-btn">
                            <?= $form->field($model, 'file_360')->fileInput(['onchange' => 'image360Preview()', 'style' => 'display:none']) ?>
                        </div>
                    </label>

                </div>

            </div>
            <div class="col-md-7">
                <div class="col-md-10">
                    <?= $form->field($model, 'name_products')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'description')->widget(CKEditor::class, [
                        'options' => ['row' => 6],
                        'preset' => 'custom'
                    ]) ?>
                    <?= $form->field($model, 'status')->dropDownList(
                        [
                            'Hoạt động' => 'Hoạt động',
                            'Không hoạt động' => 'Không hoạt động',
                        ],
                        [
                            'prompt' => 'Trạng thái'
                        ]
                    ) ?>

                    <!-- $cate=Categories::find()->where(['status'=>'Hiện'])->all();
                    $categoryList =ArrayHelper::map($cate, 'id_category', 'name_category'); -->

                    <?= $form->field($model, 'id_category')->dropDownList(
                        ArrayHelper::map(Categories::find()->where(['status' => 'Hiện'])->all(), 'id_category', 'name_category'),
                        [
                            'prompt' => 'Danh mục'
                        ]
                    ) ?>
                    <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
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
                    console.log(url);
                    pannellum.viewer('panorama', {
                        "type": "equirectangular",
                        "panorama": url,
                        "autoLoad": true
                    });
                    $('.panorama').attr('src', url);
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }

    </script>


    <?php ActiveForm::end(); ?>

</div>
