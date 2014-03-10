<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Создать заказ',
);

$this->menu=array(
	array('label'=>'Журнал заказов', 'url'=>array('index')),
	
);
?>

<h1>Create Order</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>