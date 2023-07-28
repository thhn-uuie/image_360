<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;
use frontend\widgets\bannerWidget;
use frontend\widgets\contentHomeWidget;
use frontend\widgets\contactWidget;
use frontend\widgets\infoWidget;
use frontend\widgets\searchBarWidget;


$this->title = 'Trình diễn ảnh 360';
?>

<<<<<<< HEAD
=======

>>>>>>> 94caa2f6868f3c4de72e74f98e142c749688e6f2
<section class="slider_section">
    <?= bannerWidget::widget() ?>
</section>

<section class="shop_section layout_padding">
    <?= contentHomeWidget::widget() ?>
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
    <?= contactWidget::widget() ?>
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
    <?= infoWidget::widget()?>
</section>
