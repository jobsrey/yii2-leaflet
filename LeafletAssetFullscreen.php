<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAssetFullscreen extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet.fullscreen';

    public $js = [
        'Control.FullScreen.js' 
    ];

    public $css = [
        'Control.FullScreen.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'jobsrey\widgets\LeafletAsset',
    ];
}