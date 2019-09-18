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
//        'css/site.css',
          '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
          '//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap',
        'css/normalize.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/main.css',
        'css/media.css',
    ];
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        '//cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js',
        'js/owl.carousel.min.js',
        '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
        'js/jquery.maskedinput.min.js',
        'js/wheelIndicator.js',
        'js/data.js',
        'js/catalog.js',
        'js/main.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
