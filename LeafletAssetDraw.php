<?php

namespace jobsrey\widgets;

use yii\web\AssetBundle;

class LeafletAssetDraw extends AssetBundle
{
    public $sourcePath = '@vendor/npm/leaflet-draw/dist';

    // public $js = [
    //     'src/Leaflet.draw.js', 
    //     'src/Leaflet.Draw.Event.js', 

    //     'src/Toolbar.js', 
    //     'src/Tooltip.js', 
        
    //     'src/ext/GeometryUtil.js', 
    //     'src/ext/LatLngUtil.js"', 
    //     'src/ext/LineUtil.Intersect.js', 
    //     'src/ext/Polygon.Intersect.js', 
    //     'src/ext/Polyline.Intersect.js', 
    //     'src/ext/TouchEvents.js', 

    //     'src/draw/DrawToolbar.js',
    //     'src/draw/handler/Draw.Feature.js',
    //     'src/draw/handler/Draw.SimpleShape.js',
    //     'src/draw/handler/Draw.Polyline.js',
    //     'src/draw/handler/Draw.Marker.js',
    //     'src/draw/handler/Draw.Circle.js',
    //     'src/draw/handler/Draw.CircleMarker.js',
    //     'src/draw/handler/Draw.Polygon.js',
    //     'src/draw/handler/Draw.Rectangle.js',

    //     'src/edit/EditToolbar.js',
    //     'src/edit/handler/EditToolbar.Edit.js',
    //     'src/edit/handler/EditToolbar.Delete.js',

    //     'src/Control.Draw.js',

    //     'src/edit/handler/Edit.Poly.js',
    //     'src/edit/handler/Edit.SimpleShape.js',
    //     'src/edit/handler/Edit.Rectangle.js',
    //     'src/edit/handler/Edit.Marker.js',
    //     'src/edit/handler/Edit.CircleMarker.js',
    //     'src/edit/handler/Edit.Circle.js',
    // ];

    // public $css = [
    //     'src/leaflet.draw.css',
    // ];


    public $js = [
        // 'LeafletAssetDraw.js'
    ];

    public $css = [
        // 'leaflet.draw.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'jobsrey\widgets\LeafletAsset',
    ];
}