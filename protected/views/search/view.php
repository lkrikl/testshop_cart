<?php
/* @var $this MonitorController */

$this->breadcrumbs=array(
	'Монитор: '.$model->name,
);
?>

<?php
    echo $model->image;
    echo '<h4>'.$model->name.'</h4><br>';
    echo '<b>'.$model->price.'</b>';
    
    
?>
<p class="messagecart"></p>
    <hr>
    <p class="add-product" data-id="<?php ECHO $model->id; ?>"></p>
    <hr>
    <b>Характеристики:</b><hr>

<?php 
        echo $model->description;
?>


