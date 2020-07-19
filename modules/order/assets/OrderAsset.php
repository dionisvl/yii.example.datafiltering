<?php

namespace app\modules\order\assets;

use app\assets\AppAsset;
use yii\web\AssetBundle;

class OrderAsset extends AssetBundle
{
    public $sourcePath = __DIR__;

    public $css = [
        'css/custom.css',
        //'css/bootstrap.min.css',
    ];

    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
        'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'
    ];

    public $depends = [
        AppAsset::class
    ];
}