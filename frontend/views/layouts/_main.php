<?php

use frontend\widgets\topMenu;
use frontend\widgets\searchArea;
use frontend\widgets\shoppingCart;
use frontend\widgets\navbar;
use frontend\widgets\topNavigation;
use frontend\widgets\hotDeals;
use frontend\widgets\specialOffer;
use frontend\widgets\productsTag;
use frontend\widgets\scrollTag;
use frontend\widgets\showProduct;
use frontend\widgets\bestSeller;
use frontend\widgets\footer;
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
<?= topNavigation::widget()?>
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
<?= hotDeals::widget()?>
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->
<?= specialOffer::widget()?>

                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
<?= productsTag::widget()?>
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->



            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                <!-- ============================================== SCROLL TABS ============================================== -->
<?= scrollTag::widget()?>
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->


                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
<?= showProduct::widget()?>
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive" src="template/assets/images/banners/home-banner.jpg" alt=""> </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BEST SELLER ============================================== -->

<?= bestSeller::widget()?>
                <!-- ============================================== BEST SELLER : END ============================================== -->


            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand1.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand2.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand3.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand4.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand5.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand6.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand2.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand4.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand1.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->

                    <div class="item"> <a href="#" class="image"> <img data-echo="template/assets/images/brands/brand5.png" src="template/assets/images/blank.gif" alt=""> </a> </div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
<?= footer::widget()?>
<!-- ============================================================= FOOTER : END============================================================= -->

