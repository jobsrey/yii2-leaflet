<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAssetInput extends AssetBundle
{
    public $sourcePath = '@vendor/jobsrey/yii2-leaflet/assets';

    public $js = [
        'leafletInput.js' 
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'jobsrey\widgets\LeafletAsset',
    ];
}