<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Журнал товаров', 'url'=>array('index')),
	array('label'=>'Добавить товар', 'url'=>array('create')),
	array('label'=>'Редактировать товар', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить товар', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Удалить?')),
	
);
?>

<h1>Просмотр товара #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'price',
		'image'=>array(
                    'name' => 'image',
                    'value' => '$data->image',
                    'type' => 'html',
                ),
		'created',
		'category_id',
		'description',
	),
)); ?>

<?php echo $model->image;?>
<p><?php echo $model->name;?></p>
<p><?php echo $model->price;?></p>
