<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class VipAsset extends  AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'source/css/vip.css',
    ];

    public $js = [
        'source/js/vip-tabs.js',
    ];

    public $depends = [
    ];

    public $jsOptions = [
        'position' =>  View::POS_END,
    ];

}