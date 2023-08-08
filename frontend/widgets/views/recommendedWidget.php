<?php

use yii\helpers\Url;

?>

<head>
    <style type="text/css">
        .slick-prev:before,
        .slick-next:before {
            font-family: fontawesome;
            font-size: 30px;
            color: #007bff;
        }

        .slick-prev:before {
            content: '\f100';
        }

        .slick-next:before {
            content: '\f101';
        }
    </style>
</head>

<body>
<h2 style="font-size: 25px; font-weight:bold"> SẢN PHẨM LIÊN QUAN </h2>
    <div class="container">
        <div id="wapper">
            <div class="row filtering">
                <?php foreach ($products as $item): ?>
                    <div class="p-2 pb-3">
                        <a href="<?= Url::to(['product/view', 'id_products' => $item->id_products]) ?>">
                            <div class="product-wap card rounded-0">
                                <div class="card rounded-0">
<a
                                            href="<?= Url::toRoute(['products/detail', 'id_products' => $item->id_products]) ?>">
                                            <img class="img-fluid" src="<?php echo '../../image/products/' . $item->image ?>">

                                            <!-- <img src=<?php echo '../../image/products/' . $item->image ?> alt="" /> -->
                                            <!-- <p style="margin-top: 20px; color:black">
                                                <?php echo $item->name_products; ?>
                                            </p> -->
                                        </a>
                                    <!-- <div
                                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <h3 class="text-decoration-none">
                                        <?= $item->name_products ?>
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"
        integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $('.filtering').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4
        });
    </script>

</body>


<style>
    h3,
    .h3 {
        font-size: 150%;
        margin-left: auto;
    }

    .img-fluid {
        max-width: 100%;
        height: 240px;
        align-items: center;
    }

</style>