<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $model NovaposhtaWarehouse */

$this->breadcrumbs=array(
	'Novaposhta Warehouses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NovaposhtaWarehouse', 'url'=>array('index')),
	array('label'=>'Create NovaposhtaWarehouse', 'url'=>array('create')),
	array('label'=>'View NovaposhtaWarehouse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NovaposhtaWarehouse', 'url'=>array('admin')),
);
?>

<h1>Update NovaposhtaWarehouse <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>