<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\searchBarWidget;
AppAsset::register($this);





?>
<head>
<link rel="stylesheet" href="../web/search/style.css" type="text/css">
<!-- web/search/style.css -->
</head>
<div class="top-b ar">
    <div class="row">
        <ul>
            <li><a href="#"><i class="icon fa fa-user"></i>Tài khoản của tôi</a></li>
            <li><a href="#"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
            <?php if (Yii::$app->user->isGuest): ?>
                <li>
                    <a href="<?= Url::toRoute(['site/login']) ?>">
                        <i class="icon fa fa-lock"></i>
                        Đăng nhập
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form', 'style' => 'margin-top:-8px'])
                        . Html::submitButton(
                            '<i class="icon fa fa-sign-out"></i> Đăng xuất',
                            ['class' => 'btn btn-link logout-btn']
                        )
                        . Html::endForm(); ?>
                </li>

            <?php endif; ?>

        </ul>



    </div>
    <?= searchBarWidget::widget()?>

</div>

