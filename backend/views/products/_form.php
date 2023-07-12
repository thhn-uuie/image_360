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

    <?= $form->field($model, 'file_image')->fileInput(['onchange' => 'imagePreview()']) ?>
    <div id='displayImg'></div>

    <?= $form->field($model, 'file_360')->fileInput() ?>

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
        ArrayHelper::map(Categories::find()->all(),'id_category', 'name_category'),
        [
            'prompt' => 'Danh mục'
        ]
    ) ?>



<!--    --><?php //= $form->field($model, 'file_360')->fileInput(['onchange' => 'uploadFile360()']) ?>
<!--    <div id='panorama'></div>-->


    <?= $form->field($model, 'qr_code')->hiddenInput(['id_products'=>'qr_code'])->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<!--    <script>-->
<!--        function uploadFile360() {-->
<!--            var fileSelected = document.getElementById('products-file_360').files;-->
<!--            if (fileSelected.length > 0) {-->
<!--                var fileToLoad = fileSelected[0];-->
<!--                var fileReader = new FileReader();-->
<!--                fileReader.onload = function (fileLoaderEvent) {-->
<!--                    var iframe = document.createElement('iframe');-->
<!--                    iframe.width = '600';-->
<!--                    iframe.height = '400';-->
<!--                    iframe.allowfullscreen = true;-->
<!--                    iframe.style.borderStyle = 'none';-->
<!--                    iframe.src = 'https://cdn.pannellum.org/2.5/pannellum.htm#panorama=';-->
<!--                    document.getElementById('panorama').innerHTML = iframe.outerHTML;-->
<!--                }-->
<!--                fileReader.readAsDataURL(fileToLoad);-->
<!--            }-->
<!--        }-->
<!--    </script>-->


    <script>
        function imagePreview() {
        var fileSelected = document.getElementById('products-file_image').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var previewImage = document.createElement('img');
                    previewImage.src = srcData;
                    previewImage.style.height = '150px';
                    previewImage.style.width = '140px';
                    document.getElementById('displayImg').innerHTML = previewImage.outerHTML;
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>

    <script>
        function img360Preview() {
            var fileSelected = document.getElementById('products-file_image').files;
            if (fileSelected.length > 0) {
                var fileToLoad = fileSelected[0];
                var fileReader = new FileReader();
                fileReader.onload = function(fileLoaderEvent) {
                    var srcData = fileLoaderEvent.target.result;
                    var loader = new THREE.CubeTextureLoader();
                    loader.setPath('/path/to/images/'); // đường dẫn tới thư mục chứa ảnh 360 độ
                    var textureCube = loader.load([
                        'right.jpg', 'left.jpg', 'top.jpg', 'bottom.jpg', 'front.jpg', 'back.jpg'
                    ]);
                    var material = new THREE.MeshBasicMaterial({
                        envMap: textureCube,
                        side: THREE.DoubleSide
                    });
                    var geometry = new THREE.SphereGeometry(500, 60, 40);
                    var mesh = new THREE.Mesh(geometry, material);
                    mesh.rotation.x = Math.PI / 2;
                    var previewContainer = document.getElementById('displayImg');
                    // Xóa bất kỳ phần tử HTML nào trong phần tử hiển thị trước đó
                    while (previewContainer.firstChild) {
                        previewContainer.removeChild(previewContainer.firstChild);
                    }
                    previewContainer.appendChild(mesh.renderer.domElement);
                }
                fileReader.readAsDataURL(fileToLoad);
            }
        }
    </script>


    <?php ActiveForm::end(); ?>

</div>
