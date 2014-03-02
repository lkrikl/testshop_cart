<?php
/* @var $this CommentController */
/* @var $model Comment */


$this->menu=array(
	array('label'=>'Журнал комментариев', 'url'=>array('index')),
	
	
	array('label'=>'Удалить комментарий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Удалить данный комментарий?')),
	
);
?>

<h1>Просмотр комментариев #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'page_id' => array(
                    'name' => 'page_id',
                    'value' => $data->page->title,
                   
                ),
		'created' => array(
                    'name' => 'created',
                    'value' => date("j.m.Y H:i", $data->created),
                    
                ),
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => $data->user->username,
                   
                ),
		'quest',
		'status',
	),
)); ?>
