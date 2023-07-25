<?php
use frontend\widgets\categoryWidget;
use yii\helpers\Url;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>

                    <!-- Start show categories -->
                        <?= categoryWidget::widget()?>
                    <!-- End show categories-->
                </div>
            </div>

            <!-- Start show all products with category-->
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Hình ảnh</h2>
                    <div class="heading_container heading_center">
                        <div class="grid-container">
                            <?php foreach ($products_cate as $item):?>
                                <div class="col">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                                                <img src=<?php echo '../../image/products/' . $item->image ?> alt=""/>
                                                <p style="margin-top: 20px; color:black"><?php echo $item->name_products; ?></p>
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
            <!-- End show all products with category-->
        </div>
    </div>
</section>


