
<?php
use yii\helpers\Url;
/** @var yii\web\View $this */
/** @var common\models\Products $model */

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
            width: 300px;
            height: 150px;
        }
    </style>
</head>
<body>

<div id="panorama"></div>

<script>
    <?php

    $url = Url::to('../../file360/') . $model->files;
    ?>
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": "<?php echo $url; ?>",
        "autoLoad": true
    });
</script>

</body>
</html>
