<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $model NovaposhtaWarehouse */

$this->breadcrumbs=array(
	'Novaposhta Warehouses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List NovaposhtaWarehouse', 'url'=>array('index')),
	array('label'=>'Create NovaposhtaWarehouse', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#novaposhta-warehouse-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Novaposhta Warehouses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'novaposhta-warehouse-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',     
                'city_id'=> array(
                    'name' => 'city_id',
                    'value' => '$data->NovaPoshtaCities->name_ru',
                    'filter' => NovaposhtaWarehouse::all(), 
                     ),
		'address_ru',
		'address_ua',
		'phone',
		'weekday_work_hours',
		/*
		'weekday_reseiving_hours',
		'weekday_delivery_hours',
		'saturday_work_hours',
		'saturday_reseiving_hours',
		'saturday_delivery_hours',
		'max_weight_allowed',
		'longitude',
		'latitude',
		'number_in_city',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
