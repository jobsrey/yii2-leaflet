<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAssetDraw extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet-draw';

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