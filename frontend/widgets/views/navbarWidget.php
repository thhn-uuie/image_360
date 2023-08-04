<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<nav class="navbar navbar-expand-lg custom_nav-container" style="padding: 0rem 0rem!important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <?php echo Html::a('Trang chủ', ['/site/index'], ['class' => 'nav-link']) ?>

                <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <?php echo Html::a('Sản phẩm', ['/categories/categories'], ['class' => 'nav-link']) ?>
            </li>

            <li class="nav-item active">
                <a class="nav-link" style="cursor: pointer">Danh mục</a>
                <div class="sub-menu-1">
                    <ul>
                        <?php $category = \common\models\Categories::find()->all();
                        foreach ($category as $item):?>
                            <li><a class="nav-link"
                                   href="<?= Url::toRoute(['products/products-category', 'id_cate' => $item->id_category]) ?>"><?php echo $item->name_category; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="why.html">-->
<!--                    Why Us-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="testimonial.html">-->
<!--                    Testimonial-->
<!--                </a>-->
<!--            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Liên hệ</a>
            </li>
        </ul>
        <!--                <div class="user_option">-->
        <!--                    <a href="">-->
        <!---->
        <!--                        <i class="fa fa-user" aria-hidden="true"></i>-->
        <!--                        <div style="margin-left: -50px">--><?php ////= $log_in ?><!--</div>-->
        <!--                      <div style="margin-right: 50px">--><?php ////= $log_out ?><!--</div>-->
        <!--                    </a>-->
        <!---->
        <!--                    <form class="form-inline ">-->
        <!--                        <button class="btn nav_search-btn" type="submit">-->
        <!--                            <i class="fa fa-search" aria-hidden="true"></i>-->
        <!--                        </button>-->
        <!--                    </form>-->
        <!--                </div>-->
    </div>
</nav>