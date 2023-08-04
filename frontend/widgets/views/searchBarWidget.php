<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

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

<style>
    #search-container {
        margin-right: 25%;
    }

    #search-container input {
        background-color: #ffffff;
        width: 47%;
        padding: 0.5em 0.3em;
        border: 2px solid #b79397;
    }

    #search-container input:focus {
        border-bottom-color: #6759ff;
    }

    .search-btn-bg {
        background: #ff6f6f;
        padding: 0.5em 2em;
        margin-left: 0.5em;
        color: #ffffff;
        border-radius: 5px;
        border: none;
    }

    .active {
        color: #ffffff;
    }
</style>