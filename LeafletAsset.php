<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet/dist';

    public $js = [
        'leaflet.js',
        '//cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js', 
    ];

    public $css = [
        'leaflet.css',
        '//cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}