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

    ];
    public $js = [
        'js/jquery-3.4.1.min.js',
        'js/bootstrap.min.js',
        'js/jquery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
