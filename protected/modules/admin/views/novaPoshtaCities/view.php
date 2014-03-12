<?php
/* @var $this NovaPoshtaCitiesController */
/* @var $model NovaPoshtaCities */

$this->breadcrumbs=array(
	'Nova Poshta Cities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NovaPoshtaCities', 'url'=>array('index')),
	array('label'=>'Create NovaPoshtaCities', 'url'=>array('create')),
	array('label'=>'Update NovaPoshtaCities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NovaPoshtaCities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NovaPoshtaCities', 'url'=>array('admin')),
);
?>

<h1>View NovaPoshtaCities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name_ru',
		'name_ua',
		'updated_at',
	),
)); ?>
