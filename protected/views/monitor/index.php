    <?php
/* @var $this MonitorController */

$this->breadcrumbs=array(
	'Monitor',
);
?>
<div id="centerLayer">
<?php
    foreach ($models as $one){
        echo '<div class="product_block">';
        echo CHtml::link('<center>'.$one->image.'</center>',array('view','id'=>$one->id));
        echo CHtml::link('<b><center>'.$one->name.'</center></b><br>',array('view','id'=>$one->id));
        echo '<center>'.$one->price.'</center><br>';
        
        echo '</div>';
    }
?>
</div>
