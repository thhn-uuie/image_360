<?php
use yii\helpers\Url;
?>
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

    @media (max-width: 780px) {
        .product-slider .col-md-3 {
            flex-basis: 60%;
            max-width: 50%;
        }

    }
</style>
<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left"> Ảnh 360</h3>
<!--        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">-->
<!--            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Tất cả</a></li>-->
<!--        </ul>-->
        <!-- /.nav-tabs -->
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider">
                <div class="row">
                    <?php foreach ($products as $item): ?>
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

        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.scroll-tabs -->