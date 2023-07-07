<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\models\Profile;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$formLogout = Html::beginForm(['/site/logout'], 'post')
. Html::submitButton(
    'Logout (' . Yii::$app->user->identity->username . ')',
    ['class' => 'dropdown-item']
)
. Html::endForm();

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

<body class="nav-md">
    <?php $this->beginBody() ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/image_360/backend/web/" class="site_title"><span class="glyphicon glyphicon-picture"></span>
                            <span> Image 360</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <!-- <h3>General</h3> -->
                            <ul class="nav side-menu">

                            
                            <?php if (Yii::$app->user->identity->id_role == 1) { ?>
                                <li>
                                    <a><i class="fa fa-user"></i> Quản lý tài khoản <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <?php echo Html::a('Tạo tài khoản mới', ['/users/create']) ?>
                                        </li>

                                        <li>
                                            <?php echo Html::a('Danh sách tài khoản', ['/users']) ?>
                                        </li>

                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if (Yii::$app->user->identity->id_role == 1) { ?>
                                <li>
                                    <a><i class="fa fa-info-circle"></i> Profile <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <?php echo Html::a('Tạo profile', ['/profile/create']) ?>
                                        </li>

                                        <li>
                                            <?php echo Html::a('Danh sách tài khoản', ['/profile']) ?>
                                        </li>

                                    </ul>
                                </li>
                            <?php } ?>
                                <li><a><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <?php echo Html::a('Tạo sản phẩm mới', ['/products/create']) ?>
                                        </li>
                                        <li>
                                            <?php echo Html::a('Danh sách sản phẩm', ['/products']) ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-th-list"></i> Danh mục sản phẩm <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <?php echo Html::a('Tạo danh mục mới', ['/categories/create']) ?>
                                        </li>
                                        <li>
                                            <?php echo Html::a('Danh sách danh mục', ['/categories']) ?>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-eye"></i> Lượt view cao nhất <span class="fa fa-chevron-down"></span></a>

                                </li>
                                <li><a><i class="fa fa-star"></i> Đánh giá sản phẩm <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    </ul>
                                </li>
                                
                                <li><a><i class="fa fa-pie-chart"></i> Biểu đồ </a>
                                    
                                    </ul>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <!-- <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div> -->
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt="">
                                </a>
                               
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <?php if(Yii::$app->user->identity->id_role == 2):?>
                                    <?php $profile = Profile::findOne(['id_user' => Yii::$app->user->identity->id_user])?>
                                        <?php if ($profile == null):?>
                                            <a class="dropdown-item" href="/image_360/backend/web/index.php?r=profile/create"> Profile</a>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="<?= Url::toRoute(['profile/view', 'id_user' => $profile->id_user])?>"> Profile</a>
                                        <?php endif;?>
                                <?php endif;?>
                                    <a class="dropdown-item" href="javascript:;"><span>Settings</span></a>
                                    <?= $formLogout ?>
                                </div>
                                
                            </li>

                            
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <?= $content ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();