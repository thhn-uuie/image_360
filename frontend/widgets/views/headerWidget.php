<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\searchBarWidget;
AppAsset::register($this);

?>

<div class="top-bar">
    <div class="row">
        <ul>
<!--            <li><a href="#"><i class="icon fa fa-heart"></i>Yêu thích</a></li>-->
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

