<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<head>
<link rel="stylesheet" href="<?php echo \yii\helpers\Url::base(). '/search_bar/search_bar.css'?>" type="text/css">

</head>

<div id="search-container">
    <?php
    $form = ActiveForm::begin([
        'action' => ['/search/index'],
        'method' => 'get',
        'id' => 'search_mini_form'
    ])
    ?>
    <input
            type="text"
            id="search"
            name="string"
            placeholder="Nhập tên sản phẩm..."
    />
    <?= Html::submitButton('Tìm kiếm',
        ['class' => 'search-btn-bg']) ?>
    <?php ActiveForm::end() ?>
</div>

<div id="products"></div>
</div>

