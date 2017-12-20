<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends  AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'source/css/bootstrap.min.css',
        'source/css/owl.carousel.css',
        'source/css/owl.theme.default.css',
        'source/css/main.css',
        /*'source/fonts/futura-normal.ttf',
        'source/fonts/OpenSans-Bold.ttf',
        'source/fonts/OpenSans-Italic.ttf',
        'source/fonts/OpenSans-Regular.ttf',
        'source/fonts/OpenSans-Semibold.ttf',*/
    ];

    public $js = [
        'source/js/owl.carousel.min.js',
        'source/js/main.js',
        'source/js/accordion.js',
        'source/js/stars.js',
        //'source/js/vip-tabs.js',
        'source/js/menu.js',
    ];

    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery.js
    ];

    public $jsOptions = [
        'position' =>  View::POS_END,
    ];
}