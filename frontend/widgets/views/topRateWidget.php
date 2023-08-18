<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Top 10 ảnh có đánh giá cao nhất</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            <?php foreach ($top10Rate as $item): ?>

                <div class="item">
                    <div class="products special-product">
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col-xs-7 col-md-8">
                                        <div class="product-image">
                                            <div class="image"><a href="<?= \yii\helpers\Url::toRoute(['products/detail', 'id_products'=>$item['id_products']])?>"> <img
                                                            src="<?php echo '../../image/products/' . $item['image'] ?>"
                                                            alt=""> </a></div>
                                            <!-- /.image -->

                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="<?= \yii\helpers\Url::toRoute(['products/detail', 'id_products'=>$item['id_products']])?>"><?= $item['name_products']?></a></h3>
                                            <div class="product-price">
                                                <span class="price">
                                                    <?= $item['average_rating']?><i class="fa fa-star text-warning" style="margin-left:5px"></i>
                                                </span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                            </div>
                            <!-- /.product-micro -->

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->