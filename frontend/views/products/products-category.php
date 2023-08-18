<?php
use yii\helpers\Url;
?>
<head>
    <link rel="stylesheet" href="products/css/main.css">
    <link rel="stylesheet" href="products/css/owl.carousel.css">
    <link rel="stylesheet" href="products/css/owl.transitions.css">
    <link rel="stylesheet" href="products/css/animate.min.css">
    <link rel="stylesheet" href="products/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="products/css/font-awesome.css">
</head>


<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ============================================== HOT DEALS ============================================== -->
                <?= \frontend\widgets\popular::widget() ?>
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->
                <?= \frontend\widgets\topRateWidget::widget() ?>
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->



                <!--                <div class="home-banner"><img src="products/images/banners/LHS-banner.jpg" alt="Image"></div>-->
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <!--                --><?php //= \frontend\widgets\sectionHero::widget() ?>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <?php
                        $id_category = Yii::$app->request->get('id_cate');
                        $name_cate = \common\models\Categories::findOne(['id_category'=>$id_category]);
                        ?>
                        <h3 class="new-product-title pull-left"> Hình ảnh thuộc danh mục <?php echo $name_cate->name_category; ?>
                        </h3>
                        <!--        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">-->
                        <!--            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Tất cả</a></li>-->
                        <!--        </ul>-->
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="row">
                                    <?php foreach ($products_cate as $item): ?>
                                        <div class="col-md-3">
                                            <div class="product" style="background: rgb(234 231 231 / 73%); margin-bottom: 20px;">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                                                            <img src="<?php echo '../../image/products/' . $item->image ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <!--                                    <div class="tag new"><span>new</span></div>-->
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left" style="margin-left: 10px">
                                                    <h3 class="name">
                                                        <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                                                            <?= $item->name_products?>
                                                        </a>
                                                    </h3>

                                                    <?php for ($i = 0; $i < count($averageRatings); $i++): ?>
                                                        <?php if ($item->id_products == $averageRatings[$i]['id_products']): ?>
                                                            <div class="product-price">
                                                                <p style="color:black; font-size:14px">Đánh giá: <span class="price"><?= $averageRatings[$i]['average_rating']?> </span>
                                                                    <i class="fa fa-star text-warning"></i>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" id="wishlist" href="javascript:void(0)" onclick="addWL(<?= Yii::$app->user->identity->id_user?>,<?= $item->id_products ?>)" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i> Yêu thích
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.col-md-3 -->
                                    <?php endforeach; ?>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.product-slider -->
                            <style>
                                .product-slider .row {
                                    display: flex;
                                    flex-wrap: wrap;
                                    justify-content: flex-start;

                                }

                                .product-slider .col-md-3 {
                                    flex-basis: 25%;
                                    max-width: 25%;
                                }
                            </style>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->


                </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================================= FOOTER : END============================================================= -->
<script>

    function addWL(user, id) {
        if (addWis(user, id)) {
            alert("dã có");
        } else {
            $.get('<?= Url::toRoute(['wishlist/add'])?>', {'id': id}, function (data) {
                alert("thanh cong");
            });
        }

    }

    function addWis(id_user, id_products) {
        var isFavorite = false;
        $.ajax({
            url: '<?= Url::toRoute(['wishlist/view-wis']) ?>',
            type: 'GET',
            dataType: 'json',
            async:false,
            success: function (response) {
                console.log(response);
                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        if (id_user == response[i]['id_user'] && id_products == response[i]['id_products']) {
                            isFavorite = true;
                            break;
                        }
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        return isFavorite;
    }
</script>
<script src="products/js/jquery-1.11.1.min.js"></script>
<script src="products/js/bootstrap.min.js"></script>
<script src="products/js/bootstrap-hover-dropdown.min.js"></script>
<script src="products/js/owl.carousel.min.js"></script>
<script src="products/js/bootstrap-slider.min.js"></script>
<script src="products/js/bootstrap-select.min.js"></script>
<script src="products/js/scripts.js"></script>




