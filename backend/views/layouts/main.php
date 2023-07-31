<?php

/** @var View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\models\Profile;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\web\View;

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

    <body class="nav-md">
    <?php $this->beginBody() ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/image_360/backend/web/" class="site_title"><span
                                    class="glyphicon glyphicon-picture"></span>
                            <span> Ảnh 360</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <?php $profile_id_user = Profile::findOne(['id_user' => Yii::$app->user->identity->id_user]) ?>
                            <div class="profile_pic">
                                <img alt="..." class="img-circle profile_img" src="<?php echo '../../image/avatars/'.$profile_id_user->avatar ?>">
                            </div>

                        <?php $user = \common\models\User::findOne(['id_user'=>$profile_id_user->id_user]); ?>
                        <div class="profile_info">
                            <span>Xin chào,</span><br>

                            <span style="font-size: 15px; color: #720303; font-weight: bold"><?php echo $user->username ?></span>
                            <h2></h2>
                        </div>

                    </div>
                    <!-- /menu profile quick info -->

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <!-- <h3>General</h3> -->
                            <ul class="nav side-menu">
                                <?php if (Yii::$app->user->identity->id_role == 1) { ?>
                                    <li>
                                        <a style="font-weight:400"><i class="fa fa-user" ></i> Quản lý tài khoản <span
                                                    class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <?php echo Html::a('Tạo tài khoản mới', ['/users/create']) ?>
                                            </li>

                                            <li>
                                                <?php echo Html::a('Danh sách tài khoản dược tạo', ['/users']) ?>
                                            </li>

                                        </ul>
                                    </li>
                                <?php } ?>
                                <?php if (Yii::$app->user->identity->id_role == 1) { ?>
                                    <li>
                                        <a style="font-weight:400"><i class="fa fa-info-circle"></i> Hồ sơ <span
                                                    class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <?php echo Html::a('Danh sách hồ sơ các tài khoản', ['/profile']) ?>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <li><a style="font-weight:400"><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span
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
                                <li><a style="font-weight:400"><i class="fa fa-th-list"></i> Danh mục sản phẩm <span
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


                            </ul>
                        </div>

                    </div>

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars" style="color:#fff"></i></a>
                    </div>

                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <?php $profile_id_user = Profile::findOne(['id_user' => Yii::$app->user->identity->id_user]) ?>
                                    <a href="javascript:" class="user-profile dropdown-toggle" aria-haspopup="true"
                                       id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo '../../image/avatars/'.$profile_id_user->avatar ?>" alt="">
                                    </a>

                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                     aria-labelledby="navbarDropdown">
                                    <?php if (Yii::$app->user->identity->id_role == 2): ?>
                                        <?php $profile = Profile::findOne(['id_user' => Yii::$app->user->identity->id_user]) ?>
                                        <?php if ($profile == null): ?>
                                            <a class="dropdown-item"
                                               href="/image_360/backend/web/index.php?r=profile/create"> Profile</a>
                                        <?php else: ?>
                                            <a class="dropdown-item"
                                               href="<?= Url::toRoute(['profile/view', 'id_user' => $profile->id_user]) ?>">
                                                Hồ sơ</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?= Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Đăng xuất (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'dropdown-item']
                                    )
                                    . Html::endForm(); ?>
                                </div>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>

