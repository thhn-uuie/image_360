<?php
use common\models\Products;

/** @var yii\web\View $this */
use yii\bootstrap5\Html;


$this->title = 'My Yii Application';
?>

<section class="slider_section">
    <div class="slider_container">
        <div class="row">
            <div class="col-md-3">
                <div class="detail-box">
                    <hf style="line-height: 1.5cm; font-size: 23px"> Khám phá thế giới xung quanh một cách toàn diện qua những hình ảnh 360 độ sống động.</hf>
                    <br>
                    <a href="">
                        Liên hệ
                    </a>
                </div>
            </div>
            <div class="col-md-9 ">
                <style>
                    #panorama {
                        width: 100%;
                        height: 393px;
                    }
                </style>
                <div id="panorama">
                </div>
                <script>
                    pannellum.viewer('panorama', {
                        "type": "equirectangular",
                        "panorama": "https://pannellum.org/images/cerro-toco-0.jpg",
                        "autoRotate": -5,
                        "autoLoad": true
                    });
                </script>
            </div>
        </div>
    </div>
</section>
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Hình ảnh mới nhất
            </h2>
        </div>

        <?php $products = Products::find()->all(); ?>
        <?php $limitShowProducts = array_slice($products,0, 8);
        if ($limitShowProducts): ?>
            <div class="row">
                <?php for ($item = 0; $item < count($limitShowProducts); $item++): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="">
                                <div class="img-box">
                                    <img src="<?php echo '../../image/products/' . $limitShowProducts[$item]->image; ?>" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6 style="margin: auto">
                                        <?php echo $limitShowProducts[$item]->name_products; ?>
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="btn-box">
            <?php echo Html::a('Xem tất cả ảnh', ['/site/categories'], ['class' => 'btn-box']) ?>

        </div>
    </div>
</section>

<!-- end shop section -->

<!-- saving section -->

<!--<section class="saving_section ">-->
<!--    <div class="box">-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="img-box">-->
<!--                        <img src="images/saving-img.png" alt="">-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    <div class="detail-box">-->
<!--                        <div class="heading_container">-->
<!--                            <h2>-->
<!--                                Best Savings on <br>-->
<!--                                new arrivals-->
<!--                            </h2>-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            Qui ex dolore at repellat, quia neque doloribus omnis adipisci, ipsum eos odio fugit ut-->
<!--                            eveniet blanditiis praesentium totam non nostrum dignissimos nihil eius facere et eaque.-->
<!--                            Qui, animi obcaecati.-->
<!--                        </p>-->
<!--                        <div class="btn-box">-->
<!--                            <a href="#" class="btn1">-->
<!--                                Buy Now-->
<!--                            </a>-->
<!--                            <a href="#" class="btn2">-->
<!--                                See More-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!-- end saving section -->






<!-- contact section -->

<section class="contact_section ">
    <div class="container px-0">
        <div class="heading_container ">
            <h2 class="">
                Contact Us
            </h2>
        </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-lg-7 col-md-6 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 px-0">
                <form action="#">
                    <div>
                        <input type="text" placeholder="Name"/>
                    </div>
                    <div>
                        <input type="email" placeholder="Email"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Phone"/>
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message"/>
                    </div>
                    <div class="d-flex ">
                        <button>
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->

<!-- client section -->
<!--<section class="client_section layout_padding">-->
<!--    <div class="container">-->
<!--        <div class="heading_container heading_center">-->
<!--            <h2>-->
<!--                Testimonial-->
<!--            </h2>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="container px-0">-->
<!--        <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">-->
<!--            <div class="carousel-inner">-->
<!--                <div class="carousel-item active">-->
<!--                    <div class="box">-->
<!--                        <div class="client_info">-->
<!--                            <div class="client_name">-->
<!--                                <h5>-->
<!--                                    Morijorch-->
<!--                                </h5>-->
<!--                                <h6>-->
<!--                                    Default model text-->
<!--                                </h6>-->
<!--                            </div>-->
<!--                            <i class="fa fa-quote-left" aria-hidden="true"></i>-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'-->
<!--                            will uncover many web sites still in their infancy. Variouseditors now use Lorem Ipsum-->
<!--                            as their default model text, and a search for 'lorem ipsum' will uncover many web sites-->
<!--                            still in their infancy. Variouseditors now use Lorem Ipsum as their default model text,-->
<!--                            and a search for 'lorem ipsum' will uncover many web sites still in their infancy.-->
<!--                            Various-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="carousel-item">-->
<!--                    <div class="box">-->
<!--                        <div class="client_info">-->
<!--                            <div class="client_name">-->
<!--                                <h5>-->
<!--                                    Rochak-->
<!--                                </h5>-->
<!--                                <h6>-->
<!--                                    Default model text-->
<!--                                </h6>-->
<!--                            </div>-->
<!--                            <i class="fa fa-quote-left" aria-hidden="true"></i>-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem-->
<!--                            ipsum' will uncover many web sites still in their infancy. Variouseditors now use Lorem-->
<!--                            Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web-->
<!--                            sites still in their infancy. editors now use Lorem Ipsum as their default model text,-->
<!--                            and a search for 'lorem ipsum' will uncover many web sites still in their infancy.-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="carousel-item">-->
<!--                    <div class="box">-->
<!--                        <div class="client_info">-->
<!--                            <div class="client_name">-->
<!--                                <h5>-->
<!--                                    Brad Johns-->
<!--                                </h5>-->
<!--                                <h6>-->
<!--                                    Default model text-->
<!--                                </h6>-->
<!--                            </div>-->
<!--                            <i class="fa fa-quote-left" aria-hidden="true"></i>-->
<!--                        </div>-->
<!--                        <p>-->
<!--                            Variouseditors now use Lorem Ipsum as their default model text, and a search for 'lorem-->
<!--                            ipsum' will uncover many web sites still in their infancy, editors now use Lorem Ipsum-->
<!--                            as their default model text, and a search for 'lorem ipsum' will uncover many web sites-->
<!--                            still in their infancy. Variouseditors now use Lorem Ipsum as their default model text,-->
<!--                            and a search for 'lorem ipsum' will uncover many web sites still in their infancy.-->
<!--                            Various-->
<!--                        </p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="carousel_btn-box">-->
<!--                <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">-->
<!--                    <i class="fa fa-angle-left" aria-hidden="true"></i>-->
<!--                    <span class="sr-only">Previous</span>-->
<!--                </a>-->
<!--                <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">-->
<!--                    <i class="fa fa-angle-right" aria-hidden="true"></i>-->
<!--                    <span class="sr-only">Next</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- end client section -->

<!-- info section -->

<section class="info_section  layout_padding2-top">
    <div class="social_container">
        <div class="social_box">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <div class="info_container ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <h6>
                        ABOUT US
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info_form ">
                        <h5>
                            Newsletter
                        </h5>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        NEED HELP
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6>
                        CONTACT US
                    </h6>
                    <div class="info_link-box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span> Gb road 123 london Uk </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>+01 12345678901</span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> demo@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
