<?php
use yii\helpers\Url;
?>

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <h2 class="title text-center">Tất cả hình ảnh</h2>
        <div class="heading_container heading_center">
                <div class="row">
                    <?php foreach ($products as $item) :
                        ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">

                                            <img src="<?php echo '../../image/products/' . $item->image ?>" alt=""/>

                                            <p style="margin-top: 20px; color:black"><?php echo $item->name_products; ?></p>
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
</div>