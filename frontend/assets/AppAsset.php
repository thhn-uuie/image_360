<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        'css/bootstrap.css',
        'css/style.css',
        'css/responsive.css',

        'category/css/font-awesome.min.css',
        'category/css/prettyPhoto.css',
        'category/css/price-range.css',
        'category/css/animate.css',
        'category/css/main.css',

       //'temp/css/bootstrap.min.css',

//        'temp/css/main.css',
//        'temp/css/blue.css',
//        'temp/css/owl.carousel.css',
//        'temp/css/owl.transitions.css',
//        'temp/css/animate.min.css',
//        'temp/css/rateit.css',
//        'temp/css/bootstrap-select.min.css',
//
//        'temp/css/font-awesome.css',
//
//        'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
//        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800',
//        'https://fonts.googleapis.com/css?family=Montserrat:400,700',

    ];
    public $js = [
        'js/jquery-3.4.1.min.js',
        'js/bootstrap.js',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',

        'js/custom.js',

        'category/js/jquery.js',
        'category/js/bootstrap.min.js',
        'category/js/jquery.scrollUp.min.js',
        'category/js/price-range.js',
        'category/js/jquery.prettyPhoto.js',
        'category/js/main.js',

//        'temp/js/jquery-1.11.1.min.js',
//        'temp/js/bootstrap.min.js',
//        'temp/js/bootstrap-hover-dropdown.min.js',
//        'temp/js/owl.carousel.min.js',
//        'temp/js/echo.min.js',
//        'temp/js/jquery.easing-1.3.min.js',
//        'temp/js/bootstrap-slider.min.js',
//        'temp/js/jquery.rateit.min.js',
//        'temp/js/lightbox.min.js',
//        'temp/js/bootstrap-select.min.js',
//        'temp/js/wow.min.js',
//        'temp/js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
