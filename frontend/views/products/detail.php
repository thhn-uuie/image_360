<?php

use yii\imagine\Image;
use yii\helpers\Url;
use frontend\widgets\recommendedWidget;

?>
<head>
    <link rel="stylesheet" href="../web/view-products/css/popup.css" type="text/css">
    <link rel="stylesheet" href="../web/view-products/css/popup360.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css">
</head>
<style>
    #panorama {
        width: 90vw;
        height: 500px;
    }
</style>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <?php foreach ($products_cate as $item): ?>
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-products" src="<?php echo '../../image/products/' . $item->image ?>"
                             id="product-detail">
                    </div>

                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $item->name_products ?></h1>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Đánh giá 4.8 | 36 Bình luận</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Danh mục:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <a href="<?= Url::toRoute(['products/products-category', 'id_cate' => $name_cate[0]['id_category']]) ?>">
                                        <p class="text-muted">
                                            <strong><?php echo $name_cate[0]['name_category'] ?></strong></p>
                                    </a>
                                </li>
                            </ul>

                            <h6>Mô tả:</h6>
                            <p><?php echo $item->description ?></p>


                            <h6>Mã QR:
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
                                                 src="<?php echo '../../qr/' . $item->qr_code ?>">
                                        </div>
                                    </div>
                                </div>
                            </h6>
                            <!--End Pop Up QR code-->

                            <h6>Ảnh 360 độ:
                            <!--Start Pop Up Image 360-->
                            <button class="open-modal-btn-360">Xem</button>
                            <div class="modal-360 hide-360">
                                <div class="modal-inner-360">
                                    <div class="modal-header-360">
                                        <p>Ảnh 360 độ</p>
                                        <i class="fa fa-times" style="cursor: pointer"></i>
                                    </div>
                                    <div id="panorama"></div>
                                        <script>
                                            pannellum.viewer('panorama', {
                                                "type": "equirectangular",
                                                "panorama": "<?php echo '../../image/file360/' . $item->files?>",
                                                "autoLoad": true
                                            });
                                        </script>
                                </div>
                            </div>
                            </h6>
                            <!--End Pop Up Image 360-->

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">

                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">
                                            Đánh giá
                                        </button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <script src="../web/view-products/js/popup.js"></script>
    <script src="../web/view-products/js/popup360.js"></script>

</section>
<!-- Close Content -->

<!-- Start Rate and Comments-->
<div class="card">
    <div class="card-header">ĐÁNH GIÁ - BÌNH LUẬN</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4 text-center">
                <h1 class="text-warning mt-4 mb-4">
                    <b><span id="average_rating">0.0</span> / 5</b>
                </h1>
                <div class="mb-3">
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                    <i class="fa fa-star star-light mr-1 main_star"></i>
                </div>
                <h3><span id="total_review">0</span> Review</h3>
            </div>
            <div class="col-sm-4">
                <p>
                <div class="progress-label-left"><b>5</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>4</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>3</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>2</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                </div>
                </p>
                <p>
                <div class="progress-label-left"><b>1</b> <i class="fa fa-star text-warning"></i></div>

                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                </div>
                </p>
            </div>
            <div class="col-sm-4 text-center">
                <h3 class="mt-4 mb-3">Write Review Here</h3>
                <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
            </div>
        </div>
    </div>
</div>
<div class="mt-5" id="review_content"></div>
<!-- End rate and comments-->
<!-- Start form rate and comments-->
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End form rate ans comments-->

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