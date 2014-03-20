<?php
/* @var $this ReviewsController */
/* @var $model Reviews */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Журнал комментариев', 'url'=>array('index')),
	array('label'=>'Добавить комментарий', 'url'=>array('create')),
	array('label'=>'Просмотр комментария', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Редактировать комментарий<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>