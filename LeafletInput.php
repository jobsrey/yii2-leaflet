<?php

namespace jobsrey\widgets;

use yii\helpers\Html;
use yii\helpers\Json;

class LeafletInput extends \yii\base\Widget
{

    public $clientOptions = [];

    public function run()
    {
        echo '<div id="mapid" style="height: 180px;"></div><br/><br/>';
        if ($this->hasModel()) {
            echo Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textInput($this->name, $this->value, $this->options);
        }
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
        $js[] = "var mymap = L.map('mapid').setView([51.505, -0.09], 13);";

        $view->registerJs(implode("\n", $js));
    }

}
