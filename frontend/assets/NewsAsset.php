<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class NewsAsset extends  AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'source/css/news.css',
    ];

    public $js = [

    ];

    public $depends = [

    ];

    public $jsOptions = [
        'position' =>  View::POS_END,
    ];

}