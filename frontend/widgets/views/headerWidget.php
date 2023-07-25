<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;


$log_out = Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
    . Html::submitButton(
        'Logout ',
        ['class' => 'btn btn-link logout text-decoration-none']
    )
    . Html::endForm();
AppAsset::register($this);
?>

<div class="top-bar">
    <div class="row">
        <div class="col-md-9">
            <ul>
                <li><a href="#"><i class="icon fa fa-user"></i>Tài khoản của tôi</a></li>
                <li><a href="#"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
                <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>

                <li><a href="<?= Url::toRoute(['site/new-login']) ?>"><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                <li><?php $log_out?></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>