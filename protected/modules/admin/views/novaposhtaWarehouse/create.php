<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $model NovaposhtaWarehouse */

$this->breadcrumbs=array(
	'Novaposhta Warehouses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NovaposhtaWarehouse', 'url'=>array('index')),
	array('label'=>'Manage NovaposhtaWarehouse', 'url'=>array('admin')),
);
?>

<h1>Create NovaposhtaWarehouse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>