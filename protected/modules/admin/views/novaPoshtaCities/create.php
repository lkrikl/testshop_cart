<?php
/* @var $this NovaPoshtaCitiesController */
/* @var $model NovaPoshtaCities */

$this->breadcrumbs=array(
	'Nova Poshta Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NovaPoshtaCities', 'url'=>array('index')),
	array('label'=>'Manage NovaPoshtaCities', 'url'=>array('admin')),
);
?>

<h1>Create NovaPoshtaCities</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>