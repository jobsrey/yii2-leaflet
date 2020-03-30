
<?php

use jobsrey\widgets\LeafletMap;

?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <?= LeafletMap::widget([
            'name' => 'dataPetaLokasAlat'.$model->id,
        ]);?>
    </div>
    
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h2>Data Peralatan</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p>
        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
        </p>
    </div>
    
    
</div>
