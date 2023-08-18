<?php

/** @var \yii\web\View $this */

/** @var string $content */

use yii\bootstrap5\Html;
use frontend\widgets\topMenu;
use frontend\widgets\navbarWidget;
use frontend\widgets\searchArea;
use frontend\widgets\shoppingCart;
use frontend\widgets\navbar;
use frontend\widgets\topNavigation;
use frontend\widgets\hotDeals;
use frontend\widgets\specialOffer;
use frontend\widgets\productsTag;
use frontend\widgets\scrollTag;
use frontend\widgets\showProduct;
use frontend\widgets\bestSeller;
use frontend\widgets\footer;
use frontend\assets\AppAsset;
use frontend\widgets\searchBarWidget;

AppAsset::register($this);


?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php $this->registerCsrfMetaTags() ?>
        <title>
            <?= Html::encode($this->title) ?>
        </title>
        <?php $this->head() ?>

    </head>


<body class="hero_area">
    <?php $this->beginBody() ?>


    <!-- header section starts -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <?= topMenu::widget() ?>

        <!-- ============================================== NAVBAR ============================================== -->
<!--        --><?php //= navbarWidget::widget() ?>
        <!-- ============================================== NAVBAR : END ============================================== -->

        <?= navbarWidget::widget()?>
    </header>
    <!-- end header section -->

    <?= $content ?>

    <?php $this->endBody() ?>
</body>

    </html>

<?php $this->endPage();