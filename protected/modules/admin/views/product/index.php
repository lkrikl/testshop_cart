<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Manage',
);

$this->menu=array(
	
	array('label'=>'Создать товар', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал товаров</h1>



<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>20),
                ),
//                'manufacturer_id'=> array(
//                    'name' => 'manufacturer_id',
//                    'value' => '$data->manufacturer->url',
//                    'filter' => Manufacturer::all(), 
//                    ),
		'name',
                'image'=>array(
                    'name' => 'image',
                    'value' => '$data->image',
                    'type' => 'html',
                ),
		'price' => array(
                    'name' => 'price',
                    'headerHtmlOptions' => array('width'=>70),
                ),
		
		'created' => array(
                    'name' => 'created',
                    'value' => 'date("j.m.Y H:i", $data->created)',
                    'filter' => false,           
                    'headerHtmlOptions' => array('width'=>70),
                ),
		'category_id'=> array(
                    'name' => 'category_id',
                    'value' => '$data->category->title',
                    'filter' => Category::all(), 
                     ),
		
		'description',
                'meta_keywords',
		'meta_descriptions',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
