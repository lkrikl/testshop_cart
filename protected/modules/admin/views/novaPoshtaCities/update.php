<?php
/* @var $this NovaPoshtaCitiesController */
/* @var $model NovaPoshtaCities */

$this->breadcrumbs=array(
	'Nova Poshta Cities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NovaPoshtaCities', 'url'=>array('index')),
	array('label'=>'Create NovaPoshtaCities', 'url'=>array('create')),
	array('label'=>'View NovaPoshtaCities', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NovaPoshtaCities', 'url'=>array('admin')),
);
?>

<h1>Update NovaPoshtaCities <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>