<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\base\Products $model */

$this->title = 'Create Products';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
    $this->registerJsFile('https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js', ['depends' => [\yii\web\JqueryAsset::class]]);
    $this->registerJs("
        function createQRCode() {
            var qrCode = new QRCode();
            var url = window.location.href;
            qrCode.setText(url);
            var qrcodeImage = qrCode.getQRCodeImage();
            document.getElementById('qrcode').value = qrcodeImage;
        }
    ");
    $this->registerJs("
        $('#product-form').on('beforeSubmit', function() {
            createQRCode();
            return true;
        });
    ");
?>