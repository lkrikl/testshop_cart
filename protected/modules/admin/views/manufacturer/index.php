<?php
/* @var $this ManufacturerController */
/* @var $model Manufacturer */

$this->breadcrumbs=array(
	'Manufacturers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Добавить производителя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#manufacturer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Список производителей</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'manufacturer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>50),
                ),
		'url',
                'meta_keywords',
		'meta_descriptions',
//		'layout',
//		'view',
		array(
			'class'=>'CButtonColumn',
                        'viewButtonOptions' => array('style' => 'display:none')
		),
	),
)); ?>
