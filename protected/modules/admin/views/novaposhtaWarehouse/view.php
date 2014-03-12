<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $model NovaposhtaWarehouse */

$this->breadcrumbs=array(
	'Novaposhta Warehouses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NovaposhtaWarehouse', 'url'=>array('index')),
	array('label'=>'Create NovaposhtaWarehouse', 'url'=>array('create')),
	array('label'=>'Update NovaposhtaWarehouse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NovaposhtaWarehouse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NovaposhtaWarehouse', 'url'=>array('admin')),
);
?>

<h1>View NovaposhtaWarehouse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city_id',
		'address_ru',
		'address_ua',
		'phone',
		'weekday_work_hours',
		'weekday_reseiving_hours',
		'weekday_delivery_hours',
		'saturday_work_hours',
		'saturday_reseiving_hours',
		'saturday_delivery_hours',
		'max_weight_allowed',
		'longitude',
		'latitude',
		'number_in_city',
		'updated_at',
	),
)); ?>
