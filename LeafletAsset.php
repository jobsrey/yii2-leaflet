<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet/dist';

    public $js = [
        'leaflet.js' 
    ];

    public $css = [
        'leaflet.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}