<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал товаров', 'url'=>array('index')),
	
);
?>

<h1>Create Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>