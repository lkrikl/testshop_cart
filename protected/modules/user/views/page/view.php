<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>View Page #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'created' => array(
                    'name' => 'created',
                    'value' => date("j.m.Y H:i", $data->created),
                    ),
		'status'=> array(
                    'name' => 'status',
                    'value' => ($data->status==1)?"Скрыто":"Доступно",
                    
                    
                ),
		'category_id'=> array(
                    'name' => 'category_id',
                    'value' => $data->category->title,
                    
                     ),
	),
)); ?>
