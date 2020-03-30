<?php

namespace jobsrey\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ListView;

class LeafletListViewWkt extends Widget
{
    public $dataProvider;

    public function run()
    {
        return ListView::widget([
            'dataProvider' => $this->dataProvider,
            'itemView' => '/../../../vendor/jobsrey/yii2-leaflet/_LeafletListViewWktPost.php',
        ]);
    }

    public function registerClient(){
        $view = $this->getView();
    }
}