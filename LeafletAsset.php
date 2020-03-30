<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAsset extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet/dist';

    public $js = [
        'leaflet.js',
        '//cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.7/leaflet.draw.js', 
        '//cdnjs.cloudflare.com/ajax/libs/wicket/1.3.5/wicket.js',
        '//cdnjs.cloudflare.com/ajax/libs/wicket/1.3.5/wicket-leaflet.js',
    ];

    public $css = [
        'leaflet.css',
        '//cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.7/leaflet.draw.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}