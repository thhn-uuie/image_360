<?php
use common\models\Products;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var Products $model */

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ảnh 360</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>
        #panorama {
            width: 150px;
            height: 150px;
        }
    </style>

</head>
<body>

<div id="panorama"></div>
<script>
    <?php
    $base_url = Url::base(true);
    $url_file = 'image_360/file360/'.$model->files;
    ?>

    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "https://pannellum.org/images/cerro-toco-0.jpg",
        "autoLoad": true
    });
</script>
</body>
</html>