<?php

namespace jobsrey\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class LeafletMap extends InputWidget
{

    public $clientOptions = [];

    public function run()
    {
        echo '<div id="'.$this->options['id'].'" style="height: 300px;"></div>';

        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        LeafletAsset::register($view);
        LeafletAssetFullscreen::register($view);
        LeafletAssetDraw::register($view);
        LeafletAssetInput::register($view);

        $id = $this->options['id'];
        $this->clientOptions['selector'] = "#$id";

        $js[] = "
            var mymap$id = L.map('$id',{
                fullscreenControl: true,
                fullscreenControlOptions: {
                    position: 'topleft'
                },
                // drawControl: true
            }).setView([1.0655987,97.5592101], 8);
        ";

        $js[] = "

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors, <a href=\"https://creativecommons.org/licenses/by-sa/2.0/\">CC-BY-SA</a>, Imagery © <a href=\"https://www.mapbox.com/\">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1Ijoia2lyZW5pdXNkZW5hIiwiYSI6ImNpbDNyaThnbjNyeWd2b20zc2Z2eGMyb2EifQ.oguh5bpPZ_IomW6YJ1YQdQ'
            }).addTo(mymap$id);

            var drawnItems$id = new L.FeatureGroup();
        ";

        $dataWkt = $this->value;

        $js[] = "
            var wkt_geom$id = '$dataWkt';
            var wicket$id = new Wkt.Wkt();
            wicket$id.read(wkt_geom$id);
            var titik_awal$id = wicket$id.toObject();
            drawnItems$id.addLayer(titik_awal$id);
            mymap$id.addLayer(titik_awal$id);

            mymap$id.fitBounds(drawnItems$id.getBounds());

            mymap$id.setZoom(14);
        ";


        $view->registerJs(implode("\n", $js));
    }
}
