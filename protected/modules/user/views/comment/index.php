<?php
/* @var $this CommentController */
/* @var $model Comment */
$this->menu=array(
	
	array('label'=>'Создать комментарий', 'url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал комментариев</h1>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>30),
                ),
                'status' => array(
                    'name' => 'status',
                    'value' => '($data->status==1)?"Скрыто":"Доступно"',
                    'filter' => array(0=>"Доступно",1=>"Скрыто"),
                ),
		'content',
		'page_id' => array(
                    'name' => 'page_id',
                    'value' => '$data->page->title',
                    'filter' => Page::all(),
                ),
		'created' => array(
                    'name' => 'created',
                    'value' => 'date("j.m.Y H:i", $data->created)',
                    'filter' => false,
                ),
		'user_id' => array(
                    'name' => 'user_id',
                    'value' => '$data->user->username',
                    'filter' => User::all(),
                ),
		'quest',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
                      //  'updateButtonOptions' => array('style' => 'display:none'),
                     //'viewButtonOptions' => array('style' => 'display:none')
                        //'deleteButtonOptions' => array('style' => 'display:none')
	),
	),
)); ?>
