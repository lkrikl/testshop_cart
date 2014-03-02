 <?php
/* @var $this PageCategoryController */
/* @var $model PageCategory */



$this->menu=array(
	
	array('label'=>'Создать категорию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал категорий</h1>


<?php echo CHtml::link('Расширенный','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>20),
                ),
		'title',
		'position',
		array(
			'class'=>'CButtonColumn',
                        'viewButtonOptions' => array('style' => 'display:none'),
		),
	),
)); ?>
