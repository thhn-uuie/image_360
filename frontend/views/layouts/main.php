<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

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
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>

<body class="hero_area">
    <?php $this->beginBody() ?>


    <!-- header section strats -->
    <header class="header_section">
        <div class="top-bar">
            <div class="row">

                <div class="col-md-9">
                    <ul>
                        <li><a href="#"><i class="icon fa fa-user"></i>Tài khoản của tôi</a></li>
                        <li><a href="#"><i class="icon fa fa-heart"></i>Yêu thích</a></li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                        <li><a href=""><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                    </ul>
                </div>
            </div>


        </div>
        <div>
            <!-- <form action="<?= \yii\helpers\Url::to(['product/search']) ?>" method="get">
                <input type="text" name="ProductSearch[name]" placeholder="Search for products...">
                <button type="submit"><i class="fa fa-search"></i></button>

                <ul class="dropdown-list">
                    <li class="dropdown-list-item">Everything</li>
                    <li class="dropdown-list-item">Videos</li>
                    <li class="dropdown-list-item">Community</li>
                    <li class="dropdown-list-item">Playlists</li>
                    <li class="dropdown-list-item">Shorts</li>
                </ul>

                <div class="search-box">
                    <input type="text" id="search-input" placeholder="Search anything...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </form> -->

            <!-- search bar start -->
            <div class="search-bar">
                <!-- dropdown start -->
                <div class="dropdown">
                    <div class="dropdown-text">
                        <span>Everything</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>

                <ul class="dropdown-list">
                    <li class="dropdown-list-item">Everything</li>
                    <li class="dropdown-list-item">Videos</li>
                    <li class="dropdown-list-item">Community</li>
                    <li class="dropdown-list-item">Playlists</li>
                    <li class="dropdown-list-item">Shorts</li>
                </ul>
                <!-- dropdown end -->

                <!-- search box input start -->
                <div class="search-box"></div>
                    <input type="text" id="search-input" placeholder="Search anything...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <button type="submit"><i class="fa fa-search"></i></button>
                <!-- search box input end -->
            </div>
            <!-- search bar end -->

            <style>
                /* body {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 70vh;
                    background-color: green;
                } */
                .search-bar {

                }
                form {
                    position: relative;
                }

                input[type="text"] {
                    width: 400px;
                    height: 30px;
                    padding: 8px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    outline: none;
                    margin-left: 400px;
                }

                button[type="submit"] {
                    padding: 8px 12px;
                    background-color: #007bff;
                    border: none;
                    border-radius: 4px;
                    color: white;
                    cursor: pointer;
                }

                .dropdown-list {
                    position: absolute;
                    top: 40px;
                    left: 0;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    background-color: white;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                    margin-left: 281px;
                    /* display: none; */
                }

                .dropdown-list-item {
                    padding: 8px 12px;
                    cursor: pointer;
                    /* height: 30px;
                    width: 10px;
                    margin-left: 100px; */
                }

                .dropdown-list-item:hover {
                    background-color: #f2f2f2;
                }

                .dropdown-list.show {
                    display: block;
                }
            </style>
        </div>

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
                    <?= $log_in ?>

                    <?= $log_out ?>
                </ul>

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