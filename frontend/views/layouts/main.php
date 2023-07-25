<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use frontend\widgets\headerWidget;
use frontend\widgets\navbarWidget;




$log_in = Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]);

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
                    <div id="drop-text" class="dropdown-text">
                        <span id = "span" class="every">Everything</span>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->
                        <i id="icon" class="arrow-down"></i>
                    </div>
                        <ul id="list" class="dropdown-list">
                            <li class="dropdown-list-item">Everything</li>
                            <li class="dropdown-list-item">Videos</li>
                            <li class="dropdown-list-item">Community</li>
                            <li class="dropdown-list-item">Playlists</li>
                            <li class="dropdown-list-item">Shorts</li>
                        </ul>
                </div>

                
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
                span.every {
                    width: 114px;
                    height: 26px;
                    margin-left: 278px;
                }
                .every {
                    position: relative;
                    width: 111px;
                    border-radius: 50px;
                    border: 1px solid white;
                    background-color: red;
                    box-shadow: gray;
                    cursor: pointer;
                    text-align: center;
                }

                .dropdown-text{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    font-size: 1rem;
                    font-weight: 500;
                    color: white;
                    padding: 1rem 1.5rem;
                }
                .every {
                    margin-left: 144px;
                    position: absolute;
                    top: 6px;
                    height: 27px;
                    width: 113px;
                }

                .arrow-down {
                    position: absolute;
                    top: 17px;
                    left: 403px;
                    border-left: 5px solid transparent;
                    border-right: 5px solid transparent;
                    border-top: 5px solid white;
                }

                .search-bar {
                    display: flex;
                    align-items: center;
                    min-width: 700px;
                    border-radius: 50px;
                    background-color: white;
                }

                .search-box{
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

                .input::placeholder{
                    font-size: 1rem;
                    font-weight: 500;
                    color: purple;
                }

                form {
                    position: relative;
                }

                input[type="text"] {
                    width: 400px;
                    height: 30px;
                    padding: 8px;
                    border: 1px solid pink;
                    border-radius: 4px;
                    outline: none;
                    margin-left: 400px;
                    color: #a91630;
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
                    top: 2rem;
                    left: 300px;
                    width: 120px;
                    border-radius: 15px;
                    max-height: 0;
                    overflow: hidden;
                    background-color: lightseagreen;
                    transition: max-height 0.5s;
                    /* list-style: none;
                    padding: 0;
                    margin: 0;
                    background-color: white;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    z-index: 1;
                    margin-left: 281px; */
                    /* display: none; */
                }

                #list.show{
                    max-height: 300px;
                }

                .dropdown-list-item {
                    font-size: 0.9rem;
                    font-weight: 500;
                    padding: 1rem 0 1rem 1.5rem;
                    cursor: pointer;
                    margin-left: -40px;
                    transition: margin-left 0.2s ease, color 0.2s ease;
                    /* padding: 8px 12px;
                    cursor: pointer; */
                    /* height: 30px;
                    width: 10px;
                    margin-left: 100px; */
                }

                .dropdown-list-item:hover {
                    color: #f2f2f2;
                    /* margin-left: 0.01rem; */
                    transform: translateX(10px);
                }

                .dropdown-list.show {
                    display: block;
                }
                body{
                    /* display: flex; */
                    align-items: center;
                    /* justify-content: center; */
                    height: 70vh;
                }
            </style>

            <script>
                let dropdownBtn =document.getElementById("drop-text");
                let list =document.getElementById("list");
                let icon =document.getElementById("icon");
                let span =document.getElementById("span");

                dropdownBtn.onclick = function(){
                    list.classList.toggle("show");
                    icon.style.rotate = "-180deg";
                };

                window.onclick =function(e){
                    if(
                        e.target.id !== "drop-text" && 
                        e.target.id !== "span" && 
                        e.target.id !== "icon"
                        ) {
                            list.classList.remove("show");
                            icon.style.rotate = "0deg";
                        }
                }

            </script>

            
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