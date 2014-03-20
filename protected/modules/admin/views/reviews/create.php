<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	'Добавить',
);

$this->menu=array(
	
	array('label'=>'Журнал комментариев', 'url'=>array('admin')),
);
?>

<h1>Добавить комментарий</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>