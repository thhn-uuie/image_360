<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
<div class="top-bar animate-dropdown">
    <div class="container">
        <div class="header-top-inner">
            <div class="cnt-account">
                <ul class="list-unstyled">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li>
                            <a href="<?= Url::toRoute(['site/login']) ?>">
                                <i class="icon fa fa-lock"></i>
                                Đăng nhập
                            </a>
                        </li>
                    <?php else: ?>
                        <li><a href="<?php echo Yii::$app->homeUrl . '../backend/web/' ?>"><i
                                        class="icon fa fa-user"></i>Quản lý</a></li>

                        <li><a href="<?= Url::toRoute(['wishlist/wishlist']) ?>"><i class="icon fa fa-heart"></i>Yêu
                                thích</a></li>
                        <li style="margin-right:-140px"></li>
                        <li>
                            <div class="dropdown">
                                <?php $ava = \common\models\Profile::findOne(['id_user' => Yii::$app->user->identity->id_user]) ?>
                                <a href="javascript:void(0)" id="navbarDropdown" onclick="clickDropDown()"
                                   class="dropbtn">
                                    <img src="<?php echo Url::base() . '/../image/avatars/' . $ava->avatar ?>" alt=""
                                         style="width: 35px;height: 35px;border-radius: 50%; margin-left:20px">
                                    <?= Yii::$app->user->identity->username ?>
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <div id="myDropdown" class="dropdown-content">
                                    <a id="log-out">
                                        <?= Html::beginForm(['/site/logout'], 'post', ['class' => 'logout'])
                                        . Html::submitButton(
                                            '<p class="content-log-out"><i class="icon fa fa-sign-out" style="font-size:15px"></i> Đăng xuất</p>',
                                            ['class' => 'btn btn-link logout-btn', 'style' => 'height:45px']
                                        )
                                        . Html::endForm(); ?>
                                    </a>
                                </div>
                            </div>


                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.cnt-account -->
            <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
        <?= \frontend\widgets\searchBarWidget::widget() ?>
        <!--        --><?php //= \frontend\widgets\navbarWidget::widget() ?>

    </div>
    <!-- /.container -->
</div>
<!-- /.header-top -->

<style>
    .content-log-out {
        font-family: poppins, sans-serif !important;
        font-size: 14px;
        margin-left: -10vw;
        margin-top: 10px;
    }

    .dropdown-content {
        display: none;
        height: 48px;
        position: absolute;
        background-color: #ffc8d3;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 3;
        margin-left: 4vw;
    }

    @media (max-width: 768px) {
        .content-log-out {
            margin-left: -16vw;
            margin-top: 10px;
        }

        .dropdown-content {
            min-width: 125px;
            margin-left: 8vw;
        }
    }

    @media (min-width: 769px) and (max-width: 991px) {
        .content-log-out {
            margin-left: -13vw;
        }

        .dropdown-content {
            min-width: 125px;
            margin-left: 8vw;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .content-log-out {
            margin-left: -15vw;
        }
    }

    .btn {
        padding: 0 !important;
    }

    .dropbtn {
        font-family: poppins, sans-serif;
        color: #007bff;
        font-size: 14px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
    }


    #log-out {
        color: black;
        text-decoration: none;
    }


    .show {
        display: block;
    }
</style>


<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function clickDropDown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
