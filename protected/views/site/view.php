<?php
/* @var $this MonitorController */

$this->breadcrumbs=array(
	$model->name,
);
?>
<p class="messagecart"></p>

<?php
    echo $model->image;
    echo '<h4>'.$model->name.'</h4><br>';
    echo '<b>'.$model->price.'</b>';
    
    
?>
    <hr>
    <p class="add-product" data-id="<?php ECHO $model->id; ?>"></p>
    <hr>
    <b>Характеристики:</b><hr>

<?php 
        echo $model->description;
?>

