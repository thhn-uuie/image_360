<?php

/** @var \yii\web\View $this */

/** @var string $content */

use yii\bootstrap5\Html;
use frontend\widgets\headerWidget;
use frontend\widgets\navbarWidget;
use yii\helpers\Url;

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

        <nav class="navbar navbar-expand-lg custom_nav-container ">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <?php echo Html::a('Trang chủ', ['/site/index'], ['class' => 'nav-link']) ?>

                        <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <?php echo Html::a('Sản phẩm', ['/site/categories'], ['class' => 'nav-link']) ?>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" style="cursor: pointer">Danh mục</a>
                        <div class="sub-menu-1">
                            <ul>
                                <?php $category = \common\models\Categories::find()->all();
                                foreach ($category as $item): ?>
                                    <li><a class="nav-link"
                                            href="<?= Url::toRoute(['products/products-category', 'id_products' => $item->id_category]) ?>"><?php echo $item->name_category; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="why.html">
                            Why Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimonial.html">
                            Testimonial
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>

                </ul>

            </div>
        </nav>
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

