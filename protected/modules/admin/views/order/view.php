<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs=array(
	'Заказы'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Журнал заказов', 'url'=>array('index')),
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Редактировать заказ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить заказ', 'url'=>'#', 'linkOptions'=>array(
            'submit'=>array(
                'delete','id'=>$model->id
                ),
            'confirm'=>'Удалить?'
            )),
	
);
?>

<h1>Заказ №<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
//		'secret_key',
//		'delivery_id',
//		'delivery_price',
		'total_price',
//		'status_id' => array(
//                    'name' => 'status_id',
//                    'value' => ($data->status_id==1)?"Доставлен":"Новый",
//                    'filter' => array(0=>"Доставлен",1=>"Новый"),
//                ),
//		'paid',
		'user_name',
		'user_email',
		'user_address',
		'user_phone',
		'user_comment',
//		'ip_address',
		'created' => array(
                    'name' => 'created',
                    'value' => date("j.m.Y H:i", $data->created),
                    ),
		'updated' => array(
                    'name' => 'updated',
                    'value' => date("j.m.Y H:i", $data->created),
                    ),
//		'discount',
		'admin_comment',
	),
)); ?>
<?php 
    $result = Orderproduct::model()->findAllByAttributes(array(
                'order_id'=> $model->id
                ));
//            foreach ($result as $one) {
//                echo $one->product_id.'<br>';
//                echo $one->quantity.'<br>';
//                echo $one->price.'<br>';
//            }
?>


<b><p align="right">
            <?php
                
                    foreach ($result as $one) : ?>
                      Всего товаров  - <?php echo $one->total_product; ?><br>
                        
                        Общая сумма - <?php echo $one->total_price; ?><br>
                        
                    <?php endforeach; ?>    
                           
                   
            
        </p></b>
<hr>



<table>
    <tr>
        <td>
            ID товара
        </td>
        <td>
            Название
        </td>
        <td>
            Фото
        </td>
        <td>
            Количество
        </td>
        <td>
           Общая цена
        </td>
        
        
    </tr>
     <?php foreach ($result as $one): ?>
    <tr>
        <td>
            <?php echo $one->product_id; ?>
        </td>
        <td>
            <?php echo $one->name; ?>
        </td>
        <td>
            <?php echo $one->image; ?>
        </td>
        <td>
            <?php echo $one->quantity; ?>
        </td>
        <td>
            <?php echo $one->price; ?>
        </td>
       
       
    </tr>
    <?php endforeach; ?>
</table>