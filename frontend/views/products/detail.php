<?php

use yii\imagine\Image;
use yii\helpers\Url;
use frontend\widgets\recommendedWidget;
use frontend\widgets\rateCmtWidget;

?>
<head>
    <link rel="stylesheet" href="../web/view-products/css/popup.css" type="text/css">
    <link rel="stylesheet" href="../web/view-products/css/popup360.css" type="text/css">
    <link rel="stylesheet" href="../web/view-products/css/ratecmt.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-products" src="<?php echo '../../image/products/' . $products->image ?>"
                         id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?php echo $products->name_products ?></h1>
                        <p class="py-2">
                            <?php $fullStar = floor($rateAvg[0]); ?>
                            <?php for ($i = 0; $i < $fullStar; $i++): ?>
                                <i class="fa fa-star text-warning"></i>
                            <?php endfor; ?>


                            <?php if (($rateAvg[0] - $fullStar) != 0): ?>
                                <?php $halfStar = 1; ?>
                                <i class="fa fa-star-half-o text-warning"></i>
                            <?php else: ?>
                                <?php $halfStar = 0;
                            endif; ?>

                            <?php $emptyStar = 5 - ($fullStar + $halfStar); ?>
                            <?php for ($st = 0; $st < $emptyStar; $st++): ?>
                                <i class="fa fa-star text-secondary"></i>
                            <?php endfor; ?>


                            <span class="list-inline-item text-dark">Đánh giá: <?php echo round($rateAvg[0], 1) ?>
                                    | <?php echo $rateAvg[1] ?> Bình luận
                            | Lượt xem: <strong> <?php echo $viewCount->view_count ?> </strong></span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Danh mục:</h6>
                            </li>
                            <li class="list-inline-item">
                                <a href="<?= Url::toRoute(['products/products-category', 'id_cate' => $products->id_category]) ?>">
                                    <p class="text-muted">
                                        <strong><?php echo $name_cate->name_category ?></strong></p>
                                </a>
                            </li>
                        </ul>

                        <h6>Mô tả:</h6>
                        <p><?php echo $products->description ?></p>


                        <h6>Mã QR: </h6>

                        <!--Start Pop Up QR code-->
                        <button class="open-modal-btn">Xem</button>
                        <div class="modal-qrcode hide-qr">
                            <div class="modal-inner">
                                <div class="modal-header-qr">
                                    <p>QR code</p>
                                    <i class="fa fa-times" style="cursor: pointer"></i>
                                </div>

                                <div class="modal-body-qr">
                                    <img style="width: 250px; height: 250px"
                                         src="<?php echo '../../qr/' . $products->qr_code ?>">
                                </div>
                            </div>
                        </div>
                        <!--End Pop Up QR code-->

                        <h6 style="margin-top: 10px">Ảnh 360 độ: </h6>
                        <!-- Start Pop Up Image 360-->
                        <div class="start-btn-360">
                            <button class="open-modal-btn-360">Xem</button>
                        </div>

                        <div class="modal-360">
                            <div class="modal-inner-360">
                                <div class="modal-header-360">
                                    <p>Ảnh 360 độ</p>
                                    <i class="fa fa-times" style="cursor: pointer"></i>
                                </div>
                                <div class="form360">
                                    <?php echo $this->render('view360', ['products' => $products]) ?>

                                </div>
                            </div>
                        </div>


                        <script>
                            $(document).ready(function () {
                                $('.start-btn-360').click(function () {
                                    $('.modal-360').toggleClass("show-modal-360");
                                    $('.start-btn-360').toggleClass("show-modal-360");
                                });
                                $('.fa-times').click(function () {
                                    var popup = $(this).closest(".modal-360");
                                    popup.toggleClass("show-modal-360");
                                    $('.start-btn-360').toggleClass("show-modal-360");
                                    event.stopPropagation();
                                });
                            });
                        </script>
                        <!--End Pop Up Image 360-->

                        <div class="row pb-3">
                            <div class="col d-grid">
                                <button type="button" name="add_review" id="add_review" class="btn btn-success btn-lg" style="margin-top: 20px;">
                                    Đánh giá
                                </button>

                            </div>
                        </div>

                            <div id="review_modal" class="modal-review" role="dialog">
                                <div class="modal-review-dialog" role="document">
                                    <div class="modal-review-content">
                                        <div class="modal-review-header">
                                            <h5 class="modal-review-title">Đánh giá - Bình luận sản phẩm</h5>
                                            <i id="icon-close" class="fa fa-times" style="cursor: pointer"></i>
                                        </div>
                                        <div class="modal-review-body">
                                            <form method="post"
                                                  action="<?= Url::toRoute(['products/detail', 'id_products' => $products->id_products]) ?>">
                                                <input type="hidden" name="_csrf-frontend"
                                                       value="<?= Yii::$app->request->getCsrfToken() ?>"/>
                                                <h4 class="text-center mt-2 mb-4">
                                                    <div class="rating-css">
                                                        <div class="star-icon">
                                                            <input type="radio" value="1" name="product_rating" checked
                                                                   id="rating1">
                                                            <label for="rating1" class="fa fa-star"></label>
                                                            <input type="radio" value="2" name="product_rating"
                                                                   id="rating2">
                                                            <label for="rating2" class="fa fa-star"></label>
                                                            <input type="radio" value="3" name="product_rating"
                                                                   id="rating3">
                                                            <label for="rating3" class="fa fa-star"></label>
                                                            <input type="radio" value="4" name="product_rating"
                                                                   id="rating4">
                                                            <label for="rating4" class="fa fa-star"></label>
                                                            <input type="radio" value="5" name="product_rating"
                                                                   id="rating5">
                                                            <label for="rating5" class="fa fa-star"></label>
                                                        </div>
                                                    </div>
                                                </h4>

                                                <input type="hidden" id="id_products_current" name="id_products_current"
                                                       value="<?php echo($products->id_products); ?>">
                                                <input type="hidden" id="id_user_current" name="id_user_current"
                                                       value="<?php echo Yii::$app->user->identity->getId(); ?>">
                                                <input type="text" name="comment" id="comment" class="form-control"
                                                       placeholder="Nhập bình luận..."/>
                                                <input type="submit" id="rate-submit" value="Lưu">
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../web/view-products/js/popup.js"></script>

    <!-- Close Content -->

    <!-- Start Rate and Comments-->
    <div class="card">
        <div class="card-header" style="font-size: 25px"><strong>ĐÁNH GIÁ - BÌNH LUẬN SẢN PHẨM</strong></div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <h1 class="text-warning mt-4 mb-4">
                        <b><span id="average_rating"><?php echo round($rateAvg[0], 1) ?></span> / 5</b>
                    </h1>
                    <div class="mb-3">
                        <?php $fullStar = floor($rateAvg[0]); ?>
                        <?php for ($i = 0; $i < $fullStar; $i++): ?>
                            <i class="fa fa-star star-light mr-1 main_star text-warning"></i>
                        <?php endfor; ?>


                        <?php if (($rateAvg[0] - $fullStar) != 0): ?>
                            <?php $halfStar = 1; ?>
                            <i class="fa fa-star-half-o star-light mr-1 main_star text-warning"></i>
                        <?php else: ?>
                            <?php $halfStar = 0;
                        endif; ?>

                        <?php $emptyStar = 5 - ($fullStar + $halfStar); ?>
                        <?php for ($st = 0; $st < $emptyStar; $st++): ?>
                            <i class="fa fa-star star-light mr-1 main_star"></i>
                        <?php endfor; ?>

                    </div>
                    <h3><span id="total_review"><?php echo $rateAvg[1] ?></span> Đánh giá</h3>
                </div>
                <div class="col-sm-4">
                    <?php $star = [5, 4, 3, 2, 1] ?>
                    <?php for ($i = 0; $i < count($star); $i++): ?>
                        <?php $rateProducts = \common\models\base\Rate::find()->where(['id_products' => $products->id_products, 'rate' => $star[$i]])->all();
                        ?>

                        <p>
                        <div class="progress-label-left"><b><?php echo $star[$i] ?></b> <i
                                    class="fa fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span
                                    id="total_five_star_review"><?php echo count($rateProducts) ?></span>)
                        </div>
                        <div class="progress">
                            <?php if ($rateAvg[1] == 0): ?>
                                <div class="progress-bar bg-warning" role="progressbar"
                                     aria-valuenow="0"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            <?php else: ?>
                                <div class="progress-bar bg-warning" role="progressbar"
                                     style="width: <?php echo count($rateProducts) / $rateAvg[1] * 100 ?>%"
                                     aria-valuenow="<?php echo count($rateProducts) / $rateAvg[1] * 100 ?>"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            <?php endif; ?>
                        </div>
                        </p>
                    <?php endfor; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="mt-5" id="review_content"></div>

    <script>

        $(document).ready(function () {

            $('#add_review').click(function () {

                $('#review_modal').toggleClass('show-form');

            });
            $('#icon-close').click(function () {
                $('#review_modal').toggleClass('show-form');
            });

        });

    </script><!-- End rate and comments-->
</section>


<!-- Start Recommended Products -->
<?= recommendedWidget::widget() ?>
<!-- End Recommended Products -->


<!-- Start Footer -->
<!--<footer class="bg-dark" id="tempaltemo_footer">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!---->
<!--            <div class="col-md-4 pt-5">-->
<!--                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Zay Shop</h2>-->
<!--                <ul class="list-unstyled text-light footer-link-list">-->
<!--                    <li>-->
<!--                        <i class="fa fa-map-marker-alt fa-fw"></i>-->
<!--                        123 Consectetur at ligula 10660-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <i class="fa fa-phone fa-fw"></i>-->
<!--                        <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <i class="fa fa-envelope fa-fw"></i>-->
<!--                        <a class="text-decoration-none" href="mailto:info@company.com">info@company.com</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-4 pt-5">-->
<!--                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>-->
<!--                <ul class="list-unstyled text-light footer-link-list">-->
<!--                    <li><a class="text-decoration-none" href="#">Luxury</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Sport Wear</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Popular Dress</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Sport Shoes</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--            <div class="col-md-4 pt-5">-->
<!--                <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>-->
<!--                <ul class="list-unstyled text-light footer-link-list">-->
<!--                    <li><a class="text-decoration-none" href="#">Home</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">About Us</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Shop Locations</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">FAQs</a></li>-->
<!--                    <li><a class="text-decoration-none" href="#">Contact</a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--        <div class="row text-light mb-4">-->
<!--            <div class="col-12 mb-3">-->
<!--                <div class="w-100 my-3 border-top border-light"></div>-->
<!--            </div>-->
<!--            <div class="col-auto me-auto">-->
<!--                <ul class="list-inline text-left footer-icons">-->
<!--                    <li class="list-inline-item border border-light rounded-circle text-center">-->
<!--                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i-->
<!--                                    class="fab fa-facebook-f fa-lg fa-fw"></i></a>-->
<!--                    </li>-->
<!--                    <li class="list-inline-item border border-light rounded-circle text-center">-->
<!--                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i-->
<!--                                    class="fab fa-instagram fa-lg fa-fw"></i></a>-->
<!--                    </li>-->
<!--                    <li class="list-inline-item border border-light rounded-circle text-center">-->
<!--                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i-->
<!--                                    class="fab fa-twitter fa-lg fa-fw"></i></a>-->
<!--                    </li>-->
<!--                    <li class="list-inline-item border border-light rounded-circle text-center">-->
<!--                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i-->
<!--                                    class="fab fa-linkedin fa-lg fa-fw"></i></a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            <div class="col-auto">-->
<!--                <label class="sr-only" for="subscribeEmail">Email address</label>-->
<!--                <div class="input-group mb-2">-->
<!--                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail"-->
<!--                           placeholder="Email address">-->
<!--                    <div class="input-group-text btn-success text-light">Subscribe</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="w-100 bg-black py-3">-->
<!--        <div class="container">-->
<!--            <div class="row pt-2">-->
<!--                <div class="col-12">-->
<!--                    -->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</footer>-->
<!-- End Footer -->
