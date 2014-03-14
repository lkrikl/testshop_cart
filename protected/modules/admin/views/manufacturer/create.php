<?php
/* @var $this ManufacturerController */
/* @var $model Manufacturer */

$this->breadcrumbs=array(
	'Manufacturers'=>array('index'),
	'Добавить производителя',
);

$this->menu=array(
	array('label'=>'Список производителей', 'url'=>array('index')),
	
);
?>

<h1>Добавить производителя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>