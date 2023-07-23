<?php

use common\models\base\Categories;
use common\models\Products;
use yii\helpers\Url;


?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>

                    <!-- Start show categories -->
                    <div class="panel-group category-products" id="accordian">
                        <?php $cate = Categories::find()->all(); ?>
                        <?php foreach ($cate as $item) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="<?= Url::toRoute(['products/products-category', 'id_products' => $item->id_category]) ?>">
                                            <?php echo $item->name_category ?>
                                        </a>
                                    </h4>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- End show categories-->
                </div>
            </div>

            <!-- Start show all products-->
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Hình ảnh</h2>
                    <div class="heading_container heading_center">
                            <div class="row">
                                <?php foreach ($res as $item):
                                    ?>
<!--                                    --><?php
//                                    $products = Products::find()
//                                        ->innerJoin('categories', 'products.id_category = categories.id_category')
//                                        ->where(['or', ['categories.name_category' => $result->name_category], ['categories.id_category' => Categories::find()->select('id_category')->where(['name_category' => $category->name_category])]])
//                                        ->all();
//                                    ?>
<!--                                    --><?php //foreach ($products as $item): ?>
                                        <div class="">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src=<?php echo '../../image/products/' . $item->image ?> alt=""/>
                                                        <p style="margin-top: 20px; color:black"><?php echo $item->name_products; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
<!--                                --><?php //endforeach; ?>
                            </div>
                    </div>
                </div>
            </div>
            <!-- End show all products-->
        </div>
    </div>
</section>


