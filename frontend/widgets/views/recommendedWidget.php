<?php

use yii\helpers\Url;

?>

<head>
    <link rel="stylesheet" href="../web/view-products/css/recommended.css" type="text/css">
</head>

<div class="card">
    <div class="card-header">
        <h2> SẢN PHẨM CÙNG DANH MỤC </h2>
    </div>
    <div class="container">
        <div id="wrapper">
            <div class="row filtering">
                <?php foreach ($sameCate as $item): ?>
                    <div class="p-2 pb-3" id="img-prd">
                        <a
                                href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                            <div class="product-wap card rounded-0" id="prd-box">
                                <div class="card rounded-0">

                                    <img class="img-fluid" src="<?php echo '../../image/products/' . $item->image ?>">
                                </div>
                                <div class="card-body">
                                    <h3 class="text-decoration-none" style="font-size:18px">
                                        <?= $item->name_products ?>
                                    </h3>
                                    <?php for ($i = 0; $i < count($averageRatings); $i++): ?>
                                        <?php if ($item->id_products == $averageRatings[$i]['id_products']): ?>
                                            <?php $fullStar = floor($averageRatings[$i]['average_rating']); ?>
                                            <?php for ($iStar = 0; $iStar < $fullStar; $iStar++): ?>
                                                <i class="fa fa-star text-warning"></i>
                                            <?php endfor; ?>

                                            <?php if (($averageRatings[$i]['average_rating'] - $fullStar) != 0): ?>
                                                <?php $halfStar = 1; ?>
                                                <i class="fa fa-star-half-o text-warning"></i>
                                            <?php else: ?>
                                                <?php $halfStar = 0;
                                            endif; ?>

                                            <?php $emptyStar = 5 - ($fullStar + $halfStar); ?>
                                            <?php for ($st = 0; $st < $emptyStar; $st++): ?>
                                                <i class="fa fa-star text-secondary"></i>
                                            <?php endfor; ?>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $('.filtering').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
    });
</script>

