<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Журнал заказов', 'url'=>array('index')),
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Просмотр заказа', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Редактировать заказ <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>