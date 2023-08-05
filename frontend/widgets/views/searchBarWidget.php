<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;
use frontend\controllers\ProductsController;
use kartik\select2\Select2;
use yii\web\Response;
use frontend\models\Products;

?>

<head>
    <link rel="stylesheet" href="../web/search/custom_search_bar.css" type="text/css">
</head>

<body>
    <div class="search-bar">
        <?= Autocomplete::widget([
            'name' => 'search', //tên của ô tìm kiếm
            'options' => [  
                'class' => 'form-control',
                'placeholder' => 'Tìm kiếm sản phẩm...',
                'action' => Url::toRoute(['products/search']),
                'method' => 'get'
            ],
            'clientOptions' => [  //các thuộc tính của ô tìm kiếm
                // 'source' => Url::to(['products/search']),
                'action' => Url::to(['products/search']),          // Đường dẫn đến action xử lý tìm kiếm
                'minLength' => 2,
            ],
        ]) ?>
        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-success']) ?> -->
    </div>

  
  

</body>




<style>
    .form-control {
        display: block;
        width: 80%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: -7rem;
        font-weight: 400;
        line-height: 1.5;
        color: #007bff;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ff0060;
        border-radius: 15px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn.btn-primary {
        background: #007bff;
        border: 0 none;
        border-radius: 20px;
        margin-left: -7%;
        margin-top: 0%;
    }

    span.every {
        width: 114px;
        height: 29px;
        margin-left: 176px;
        margin-top: -2px;
    }

    .every {
        position: relative;
        width: 111px;
        border-radius: 50px;
        border: 1px solid white;
        background-color: #ff0060;
        box-shadow: gray;
        cursor: pointer;
        text-align: center;
        margin-left: 144px;
        position: absolute;
        top: 6px;
        height: 27px;
        width: 113px;
    }

    .search-bar {
        display: flex;
        align-items: center;
        min-width: 90%;
        border-radius: 50px;
        margin-left: 10%;
    }

    .search-box {
        display: flex;
        align-items: center;
        padding-right: 1rem;
        width: 100%;
        color: plum;
        border: 0;
        outline: 0;
    }


    input {
        padding: 1rem;
        width: 100%;
        font-size: 1rem;
        font-weight: 500;
        color: purple;
        border: 0;
        outline: 0;
        margin-left: 50px;
        color: #a91630;
    }

    .input::placeholder {
        font-size: 1rem;
        font-weight: 500;
        color: purple;
        border-radius: 20px;
        margin-left: 200%;
    }

    form {
        position: relative;
    }

    .input[type="text"] {
        width: 400px;
        height: 27px;
        padding: 8px;
        border: 1px solid pink;
        border-radius: -4px;
        outline: none;
        margin-left: -773px;
        margin-right: 200px;
        margin-top: 6px;
        color: #a91630;
    }

    button[type="submit"] {
        padding: 8px 12px;
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        color: white;
        cursor: pointer;
        margin-left: -227px;
    }

    button[type="submit-search"] {
        padding: 8px 12px;
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        color: white;
        margin-left: -23%;
        height: 4%;
        width: 4%;
    }



    #navbarSupportedContent {
        width: 100%;
        background-color: rgb(249, 236, 230);
        -webkit-box-pack: center;
        justify-content: center;
        padding: 10px 0px;
        border-radius: 15px 15px 0px 0px;
        z-index: 999;
    }

    #list.show {
        max-height: 300px;
    }



    .search-input {
        margin-right;
        : 100px
    }
</style>