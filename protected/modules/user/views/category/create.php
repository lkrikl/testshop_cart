<?php
/* @var $this PageCategoryController */
/* @var $model PageCategory */

$this->menu=array(
	array('label'=>'Журнал категорий', 'url'=>array('index')),
	
);
?>

<h1>Создать категорию</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>