<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

class CatalogAsset extends  AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'source/css/catalog.css',
    ];

    public $js = [
    ];

    public $depends = [
    ];

    public $jsOptions = [
        'position' =>  View::POS_END,
    ];
}