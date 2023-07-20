<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

$log_out = Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
    . Html::submitButton(
        'Logout ',
        ['class' => 'btn btn-link logout text-decoration-none']
    )
    . Html::endForm();
AppAsset::register($this);

$log_in = Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hero_area">
    <?php $this->beginBody() ?>


    <!-- header section strats -->
    <header class="header_section">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="http://localhost/image_360/frontend/web/index.php">
          <span>
            Trình diễn ảnh 360
          </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false">
                <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <?php echo Html::a('Trang chủ', ['/site/index'], ['class' => 'nav-link']) ?>

                        <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <?php echo Html::a('Danh mục ảnh', ['/site/categories'], ['class' => 'nav-link']) ?>
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
                <div class="user_option">
                    <a href="">

                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div style="margin-left: -50px"><?= $log_in ?></div>
                        <div style="margin-right: 50px"><?= $log_out ?></div>
                    </a>

                    <form class="form-inline ">
                        <button class="btn nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- end header section -->
    <!-- slider section -->

    <?= $content ?>

    <!-- footer section -->
    <footer class=" footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->
    <!-- end info section -->


    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage();
