<?php

namespace jobsrey\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class LeafletInput extends InputWidget
{

    public $clientOptions = [];

    public function run()
    {
        $input = '';
        if ($this->hasModel()) {
            $input =  Html::activeHiddenInput($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::hiddenInput($this->name, $this->value, $this->options);
        }




        echo '<div class="row">
                    <div class="col-md-12">
                        <div id="mapid" style="height: 300px;"></div>
                        ' . $input . '
                    </div>
                    
                </div>';

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



        $options = Json::encode($this->clientOptions);

        // $js[] = "tinymce.remove('#$id');tinymce.init($options);";
        $js[] = "
            var mymap = L.map('mapid',{
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
            }).addTo(mymap);

        ";
        
        //controll
        $js[] = "
            var drawnItems = new L.FeatureGroup();
            mymap.addLayer(drawnItems);
            var drawControl = new L.Control.Draw({
                draw : {
                    polygon: false,
                    marker: true,
                    polyline: false, 
                    rectangle: false, 
                    circle: false,
                    circlemarker: false
                },
                edit: {
                    featureGroup: drawnItems,
                    remove: false
                }
            });
            mymap.addControl(drawControl);
        ";

        if($this->model->isNewRecord){
           
            $js[] = "
                var titik_awal = null;
                mymap.on('draw:created', function (e) {
                    var type = e.layerType;
                    var layer = e.layer;

                    if(titik_awal !== null) {
                        drawnItems.removeLayer(titik_awal);
                        titik_awal = layer;

                    } else {
                        titik_awal = layer;
                    }

                    var wkt = toWKTSingle(layer);
                    $('#$id').val(wkt);
                    drawnItems.addLayer(layer);

                });

                mymap.on('draw:edited', function (e) {
                    var layers = e.layers;
                    layers.eachLayer(function (layer) {
                        var wkt = toWKTSingle(layer);
                        $('#$id').val(wkt);
                    });
                });
            ";
        } else {
            $dataWkt = $this->model->{$this->attribute};

            $js[] = "
                var wkt_geom = '$dataWkt';
                var wicket = new Wkt.Wkt();
                wicket.read(wkt_geom);
                var titik_awal = wicket.toObject();
                drawnItems.addLayer(titik_awal);

                mymap.fitBounds(drawnItems.getBounds());

                mymap.setZoom(14);

                mymap.on('draw:created', function (e) {
                    var type = e.layerType;
                    var layer = e.layer;

                    if(titik_awal !== null) {
                        drawnItems.removeLayer(titik_awal);
                        titik_awal = layer;
                    } else {
                        titik_awal = layer;
                    }

                    var wkt = toWKTSingle(layer);
                    $('#$id').val(wkt);
                    drawnItems.addLayer(layer);

                });

                mymap.on('draw:edited', function (e) {
                    var layers = e.layers;
                    layers.eachLayer(function (layer) {
                        var wkt = toWKTSingle(layer);
                        $('#$id').val(wkt);
                    });
                });

            ";

        }

        $view->registerJs(implode("\n", $js));
    }
}
