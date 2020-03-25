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
            $input =  Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::textInput($this->name, $this->value, $this->options);
        }

        echo '<div class="row">
                    <div class="col-md-12">
                        <div id="mapid" style="height: 300px;"></div><br/><br/>
                        '.$input.'
                    </div>
                    
                    
                </div><br/><br/>';

        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        LeafletAsset::register($view);

        $id = $this->options['id'];

        $this->clientOptions['selector'] = "#$id";

        $options = Json::encode($this->clientOptions);

        // $js[] = "tinymce.remove('#$id');tinymce.init($options);";
        $js[] = "var mymap = L.map('mapid').setView([1.0655987,97.5592101], 8);";

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

        $view->registerJs(implode("\n", $js));
    }

}
