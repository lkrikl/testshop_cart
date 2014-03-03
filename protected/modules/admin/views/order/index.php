<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал заказов</h1>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>30),
                ),
		'user_id',
	//	'secret_key',
	//	'delivery_id',
	//	'delivery_price',
		'total_price',
		
		'status_id' => array(
                    'name' => 'status_id',
                    'value' => '($data->status_id==1)?"Новый":"Доставлен"',
                    'filter' => array(0=>"Доставлен",1=>"Новый"),
                ),
	//	'paid',
		'user_name',
		'user_email',
		'user_address',
		'user_phone',
		'user_comment',
	//	'ip_address',
		'created',
		'updated',
	//	'discount',
		'admin_comment',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
