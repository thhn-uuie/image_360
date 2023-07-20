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

//        'category/css/bootstrap.min.css',
        'category/css/font-awesome.min.css',
        'category/css/prettyPhoto.css',
        'category/css/price-range.css',
        'category/css/animate.css',
        'category/css/main.css',
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
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
