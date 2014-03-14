<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	'Журнал заказов',
);

$this->menu=array(
	
	array('label'=>'Создать заказ', 'url'=>array('create')),
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
                'type_of_delivery',
                'settlement_delivery'=>array(
                    'name' => 'settlement_delivery',
                    'value' => '$data->novaposhtacities->name_ru'
                ),
                'delivery_address'=>array(
                    'name' => 'delivery_address',
                    'value' => '$data->novaposhtawarehouse->address_ru'
                ),
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
		'created' => array(
                    'name' => 'created',
                    'value' => 'date("j.m.Y H:i", $data->created)',
                    'filter' => false,           
                    'headerHtmlOptions' => array('width'=>70),
                ),
		'updated' => array(
                    'name' => 'updated',
                    'value' => 'date("j.m.Y H:i", $data->created)',
                    'filter' => false,           
                    'headerHtmlOptions' => array('width'=>70),
                ),
	//	'discount',
		'admin_comment',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
