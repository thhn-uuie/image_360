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
</head>

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ============================================== HOT DEALS ============================================== -->
                <?= \frontend\widgets\popular::widget() ?>
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->
                <?= \frontend\widgets\topRateWidget::widget() ?>
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->


                <!--                <div class="home-banner"><img src="products/images/banners/LHS-banner.jpg" alt="Image"></div>-->
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->
                <!--                --><?php //= \frontend\widgets\sectionHero::widget() ?>

                <!-- ========================================= SECTION – HERO : END ========================================= -->


                <!-- ============================================== SCROLL TABS ============================================== -->
                <?= \frontend\widgets\showProducts::widget() ?>
                <!-- ============================================== SCROLL TABS : END ============================================== -->
            </div>
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <?= \frontend\widgets\infoWidget::widget()?>

</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->

<!-- ============================================================= FOOTER : END============================================================= -->

<script>
    function addWL(user, id) {
        if (addWis(user, id)) {
            alert("Ảnh này đã có trong Yêu thích!");
        } else {
            $.get('<?= Url::toRoute(['wishlist/add'])?>', {'id': id}, function (data) {
                if(data === '1') {
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
            async:false,
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

<script src="../../frontend/web/products/js/jquery-1.11.1.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-hover-dropdown.min.js"></script>
<script src="../../frontend/web/products/js/owl.carousel.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-slider.min.js"></script>
<script src="../../frontend/web/products/js/bootstrap-select.min.js"></script>
<script src="../../frontend/web/products/js/scripts.js"></script>


