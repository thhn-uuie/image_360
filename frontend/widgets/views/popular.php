<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hình ảnh phổ biến</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        <?php foreach ($products as $item):?>
        <div class="item">
            <div class="products">
                <div class="hot-deal-wrapper">

                    <div class="image">
                        <a href="<?= \yii\helpers\Url::toRoute(['products/detail', 'id_products'=>$item['id_products']])?>">
                        <img src="<?php echo '../../image/products/' . $item['image']?>" style="cursor: pointer" alt="">
                        </a>
                    </div>

<!--                    <div class="sale-offer-tag"><span>49%<br>-->
<!--                    off</span></div>-->
<!--                    <div class="timing-wrapper">-->
<!--                        <div class="box-wrapper">-->
<!--                            <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>-->
<!--                        </div>-->
<!--                        <div class="box-wrapper">-->
<!--                            <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>-->
<!--                        </div>-->
<!--                        <div class="box-wrapper">-->
<!--                            <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>-->
<!--                        </div>-->
<!--                        <div class="box-wrapper hidden-md">-->
<!--                            <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <!-- /.hot-deal-wrapper -->

                <div class="product-info text-left m-t-20">
                    <h3 class="name" style="cursor: pointer"><a href="<?= \yii\helpers\Url::toRoute(['products/detail', 'id_products'=>$item['id_products']])?>"><?= $item['name_products']?></a></h3>
                    <h3 style="font-size: 15px; color: #09436d">Lượt xem:  <?= $item['view_count']?><i class="fa fa-eye" style="margin-left: 5px"></i></h3>

                </div>
                <!-- /.product-info -->


            </div>
        </div>
        <?php endforeach;?>
    </div>
    <!-- /.sidebar-widget -->
</div>