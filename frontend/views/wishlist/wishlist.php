<?php
use yii\helpers\Url;
?>
<head>
    <link rel="stylesheet" href="products/css/main.css">
</head>
<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="4" class="heading-title">Hình ảnh yêu thích</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($wis as $item): ?>
                                <tr>
                                    <td class="col-md-2"><img src="<?= '../../image/products/' . $item->image ?>" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name">
                                            <a href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_category]) ?>">
                                                <?= $item->name_products ?>
                                            </a>
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a href="#" class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->


        <script src="products/js/jquery-1.11.1.min.js"></script>
        <script src="products/js/bootstrap.min.js"></script>
        <script src="products/js/scripts.js"></script>

