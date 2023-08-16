<?php

/** @var \yii\web\View $this */

/** @var string $content */

use yii\bootstrap5\Html;
use frontend\widgets\headerWidget;
use frontend\widgets\navbarWidget;

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
    <header class="header_section">

        <?= headerWidget::widget() ?>

        <?= navbarWidget::widget()?>
    </header>

    <!-- end header section -->

    <?= $content ?>

    <!-- footer section -->
    <!--    <footer class=" footer_section">-->
    <!--        <div class="container">-->
    <!--            <p>-->
    <!--                &copy; <span id="displayYear"></span> All Rights Reserved By-->
    <!--                <a href="https://html.design/">Free Html Templates</a>-->
    <!--            </p>-->
    <!--        </div>-->
    <!--    </footer>-->
    <!-- footer section -->
    <!-- end info section -->


    <?php $this->endBody() ?>


    </body>

    </html>


<?php $this->endPage();

