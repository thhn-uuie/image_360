<?php

use yii\helpers\Url;

?>
<head>
    <link rel="stylesheet" href="../../frontend/web/products/css/main.css">
    <link rel="stylesheet" href="../../frontend/web/products/css/owl.carousel.css">
    <link rel="stylesheet" href="../../frontend/web/products/css/owl.transitions.css">
    <link rel="stylesheet" href="../../frontend/web/products/css/animate.min.css">
    <link rel="stylesheet" href="../../frontend/web/products/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../frontend/web/products/css/font-awesome.css">


    <link rel="stylesheet" href="../view-products/css/popup.css" type="text/css">
    <link rel="stylesheet" href="../view-products/css/popup360.css" type="text/css">
    <link rel="stylesheet" href="../view-products/css/ratecmt.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-12'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">

                        <!-- Start Show image Products-->
                        <div class="col-xs-12 col-sm-12 col-md-6 ">
                            <div class="card mb-3" style="border:none">
                                <a data-lightbox="image-1" data-title="Gallery"
                                   href="<?php echo '../../image/products/' . $products->image ?>">
                                    <img class="card-img img-products"
                                         src="<?php echo '../../image/products/' . $products->image ?>"
                                         id="product-detail">
                                </a>
                                <div class="start-btn-360">
                                    <button class="open-modal-btn-360">Quan sát 360 độ</button>
                                </div>

                                <div class="modal-360">
                                    <div class="modal-inner-360">
                                        <div class="modal-header-360">
                                            <strong style="font-size: 26px; padding: 6px;color: white;">ẢNH 360 ĐỘ</strong>
                                            <i class="fa fa-times" style="cursor: pointer; font-size: 20px;color: white;"></i>
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
                            </div>
                        </div>
                        <!-- End Show image Products-->

                        <!-- Start Info product-->
                        <div class='col-sm-12 col-md-6 product-info-block'>
                            <div class="product-info">
                                <h1 class="name"><?= $products->name_products ?></h1>
                                <!-- Star rating | Comment | View -->
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="rating rateit-small">
                                                <span class="list-inline-item text-dark">
                                                    <?php echo round($rateAvg[0], 1) ?>
                                                </span>
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
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="reviews">
                                                <a class="lnk d-block">(<?php echo $rateAvg[1] ?> Bình luận)</a>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="reviews">
                                                <strong class="d-block"><?php echo $viewCount->view_count ?> Lượt
                                                    xem</strong>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Wishlist | Category-->
                                <div class="stock-container info-container m-t-10">
                                    <div id="wislist-style">
                                        <?php if (!Yii::$app->user->isGuest): ?>
                                            <a class="add-to-cart" id="wishlist"
                                               href="javascript:void(0)"
                                               onclick="addWL(<?= Yii::$app->user->identity->id_user ?>,<?= $products->id_products ?>)"
                                               title="Yêu thích">
                                                <i class="icon fa fa-heart"></i> Thêm vào Yêu thích
                                            </a>
                                        <?php else: ?>
                                            <a class="add-to-cart" id="wishlist"
                                               href="javascript:void(0)"
                                               onclick="addWL(null ,<?= $products->id_products ?>)"
                                               title="Yêu thích">
                                                <i class="icon fa fa-heart"></i> Thêm vào Yêu thích
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="stock-box">
                                                <span class="label" style="font-size:15px">Danh mục :</span>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="stock-box">
                                                <p class="text-muted">
                                                    <a href="<?= \yii\helpers\Url::toRoute(['products/products-category', 'id_cate' => $products->id_category]) ?>">
                                                        <strong>
                                                            <?php echo $name_cate->name_category ?>
                                                        </strong>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="description-container m-t-20">
                                    <?php echo $products->description ?>
                                </div><!-- /.description-container -->

                                <!-- Pop up QR | 360 -->
                                <div class="price-container info-container m-t-20">
                                    <div class="row">
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
                                    </div>
                                </div>
                                <!--Button Đánh giá -->
                                <div class="quantity-container info-container">
                                    <div class="row">
                                        <!-- Button Rate Products -->
                                        <div class="col d-grid">
                                            <button type="button" name="add_review" id="add_review"
                                                    class="btn btn-success btn-lg"
                                                    style="margin-top: 20px;">
                                                Đánh giá
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Info product -->
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <div id="review_modal" class="modal-review" role="dialog">
                            <div class="modal-review-dialog" role="document">
                                <div class="modal-review-content">
                                    <div class="modal-review-header">
                                        <h5 class="modal-review-title">Đánh giá - Bình luận sản phẩm</h5>
                                        <i id="icon-close" class="fa fa-times"
                                           style="cursor: pointer"></i>
                                    </div>
                                    <div class="modal-review-body">
                                        <form method="post">
                                            <input type="hidden" name="_csrf-frontend"
                                                   value="<?= Yii::$app->request->getCsrfToken() ?>"/>

                                            <!-- Star -->
                                            <h4 class="text-center mt-2 mb-4">
                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                        <input type="radio" value="1"
                                                               name="product_rating" checked
                                                               id="rating1">
                                                        <label for="rating1" class="fa fa-star"></label>
                                                        <input type="radio" value="2"
                                                               name="product_rating"
                                                               id="rating2">
                                                        <label for="rating2" class="fa fa-star"></label>
                                                        <input type="radio" value="3"
                                                               name="product_rating"
                                                               id="rating3">
                                                        <label for="rating3" class="fa fa-star"></label>
                                                        <input type="radio" value="4"
                                                               name="product_rating"
                                                               id="rating4">
                                                        <label for="rating4" class="fa fa-star"></label>
                                                        <input type="radio" value="5"
                                                               name="product_rating"
                                                               id="rating5">
                                                        <label for="rating5" class="fa fa-star"></label>
                                                    </div>
                                                </div>
                                            </h4>

                                            <!--Input form-->
                                            <input type="hidden" id="id_products_current"
                                                   name="id_products_current"
                                                   value="<?php echo($products->id_products); ?>">
                                            <input type="hidden" id="id_user_current"
                                                   name="id_user_current"
                                                   value="<?php echo Yii::$app->user->identity->getId(); ?>">

                                            <input type="text" name="comment" id="comment"
                                                   class="form-control"
                                                   placeholder="Nhập bình luận..."/>
                                            <input type="submit" id="rate-submit" value="Lưu">
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div><!-- detail-book-->

            </div><!-- /.col -->
            <div class="clearfix"></div>

            <!-- Start Rate and Comments-->
            <div class="card" id="rate-cmt-form">
                <div class="card-header" style="font-size: 25px"><strong>ĐÁNH GIÁ - BÌNH LUẬN SẢN PHẨM</strong></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">
                                <?php echo round($rateAvg[0], 1) ?>
                            </span> / 5</b>
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
                            <h3><span id="total_review">
                            <?php echo $rateAvg[1] ?>
                        </span> Đánh giá</h3>
                        </div>
                        <div class="col-sm-4">
                            <?php $star = [5, 4, 3, 2, 1] ?>
                            <?php for ($i = 0; $i < count($star); $i++): ?>
                                <?php $rateProducts = \common\models\base\Rate::find()->where(['id_products' => $products->id_products, 'rate' => $star[$i]])->all();
                                ?>

                                <p>
                                <div class="progress-label-left"><b>
                                        <?php echo $star[$i] ?>
                                    </b> <i class="fa fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span
                                            id="total_five_star_review"><?php echo count($rateProducts) ?></span>)
                                </div>
                                <div class="progress">
                                    <?php if ($rateAvg[1] == 0): ?>
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    <?php else: ?>
                                        <div class="progress-bar bg-warning" role="progressbar"
                                             style="width: <?php echo count($rateProducts) / $rateAvg[1] * 100 ?>%"
                                             aria-valuenow="<?php echo count($rateProducts) / $rateAvg[1] * 100 ?>"
                                             aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    <?php endif; ?>
                                </div>
                                </p>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php $cmt = \common\models\base\Rate::find()->where(['id_products' => $products->id_products])->all(); ?>
            <?php foreach ($cmt as $temp): ?>
                <?php $comment = $temp->comment; ?>
                <div id="comment-159" class="comment_container">
                    <?php $avatarProfile = \common\models\Profile::find()->where(['id_user' => $temp->id_user])->all(); ?>
                    <?php foreach ($avatarProfile as $item): ?>
                        <img alt="" src="<?php echo '../../image/avatars/' . $item->avatar ?>"
                             class="avatar avatar-60 photo" height="60" width="60">
                        <div class="comment-text">
                            <div class="star-rating-icons" data-placement="right" title=""
                                 data-original-title="4 out of 5">
                                <?php $starRate = $temp->rate; ?>
                                <?php for ($i = 0; $i < $starRate; $i++): ?>
                                    <i class="fa fa-star text-warning star-icon" style="font-size:14px"></i>
                                <?php endfor; ?>
                                <?php $empty = 5 - $starRate; ?>
                                <?php for ($st = 0; $st < $empty; $st++): ?>
                                    <i class="fa fa-star star-light mr-1 main_star star-icon"
                                       style="color:#bebebe;font-size:14px;margin-right: 1px!important;"></i>
                                <?php endfor; ?>

                            </div>
                            <p class="meta">
                            <p class="woocommerce-review__author"><?php echo $item->user->username ?></p>
                            <time class="woocommerce-review__published-date" datetime="2015-02-10T14:40:59+00:00">
                                <?php echo date('d-m-Y', $temp->time); ?>
                            </time>
                            </p>
                            <div class="description"><p><?php if ($comment !== ''): ?>
                                <div class="card-body-cmt">
                                    <?php echo $comment; ?>
                                </div>
                                <?php endif; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <?= \frontend\widgets\recommendedWidget::widget() ?>
            <div style="margin-top: 15px"></div>
        </div><!-- /.row -->

    </div>
    <?= \frontend\widgets\infoWidget::widget() ?>

</div><!-- /.row -->


<?php
$hasRate = false;
if (!Yii::$app->user->isGuest) {
    $findRate = \common\models\base\Rate::findOne(['id_products' => $products->id_products, 'id_user' => Yii::$app->user->identity->getId()]);
    if ($findRate !== null) {
        $hasRate = true;
    } else {
        $hasRate = false;
    }
}
?>
<script>

    $(document).ready(function () {

        $('#add_review').click(function () {
            var hasRated = <?php echo json_encode($hasRate) ?>;

            if (hasRated == true) {
                alert("Bạn đã đánh giá sản phẩm này rồi!")
            } else {
                $('#review_modal').toggleClass('show-form');
                $('#rate-cmt-form').addClass('show-content');
            }
        });


        $('#icon-close').click(function () {
            $('#review_modal').toggleClass('show-form');
        });

        // $('#rate-submit').click(function () {
        //     var commentInput = document.getElementById("comment");
        //
        //     if (commentInput.value.trim() === "") {
        //         alert("Bạn cần nhập bình luận!")
        //         event.preventDefault(); // Ngăn chặn gửi biểu mẫu
        //     }
        // })

    });


    document.getElementById("add_review").addEventListener("click", function () {
        if (!checkLoggedIn()) {
            alert("Bạn cần đăng nhập để thực hiện chức năng này!");
            event.preventDefault();
        }
    });

    function checkLoggedIn() {
        // Kiểm tra trạng thái đăng nhập ở đây
        console.log(<?php Yii::$app->user->isGuest ?>);
        <?php if (!Yii::$app->user->isGuest): ?>
        return true;
        <?php endif; ?>
        return false;
    }

</script><!-- End rate and comments-->


<script>
    function addWL(user, id) {
        if (addWis(user, id)) {
            alert("Ảnh này đã có trong Yêu thích!");
        } else {
            $.get('<?= Url::toRoute(['wishlist/add'])?>', {'id': id}, function (data) {
                if (data === '1') {
                    alert('Thêm ảnh vào Yêu thích thành công!');
                } else {
                    alert('Bạn cần đăng nhập để thực hiện chức năng này!');
                }
            });
        }

    }

    function addWis(id_user, id_products) {
        var isFavorite = false;
        $.ajax({
            url: '<?= Url::toRoute(['wishlist/view-wis']) ?>',
            type: 'GET',
            dataType: 'json',
            async: false,
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
                console.log(isFavorite);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
        return isFavorite;
    }
</script>
<script src="../view-products/js/popup.js"></script>


<script src="../../frontend/web/products/js/jquery-1.11.1.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-hover-dropdown.min.js"></script>
<script src="../../frontend/web/products/js/owl.carousel.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-slider.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-select.min.js"></script>
<script src="../../frontend/web/products/js/scripts.js"></script>
