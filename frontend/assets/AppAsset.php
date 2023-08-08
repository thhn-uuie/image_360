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
        'css/bootstrap.css',
        'css/style.css',
        'css/responsive.css',

        'category/css/font-awesome.min.css',
        'category/css/animate.css',
        'category/css/main.css',

        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css',

    ];
    public $js = [
        'js/jquery-3.4.1.min.js',
        'https://code.jquery.com/jquery-3.4.1.js',

        'js/bootstrap.min.js',
        'js/jquery.js',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js',


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',

        // JuiAsset::class, // Đăng ký tài nguyên JUI
    ];

   
}
