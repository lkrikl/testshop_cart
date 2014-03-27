<?php
/* @var $this DefaultController */


$this->breadcrumbs=array(
	$this->module->id,
);
?>
<div id="admin_table_block">
<table id="admin_table">
    <tr class="cap">       
        <td class="table_header">
             <b>Краткий обзор</b>
        </td>
        <td class="table_header">
           
        </td>
    </tr>
    <tr>
        <td>
            Всего продано на сумму:
        </td>
        <td class="table_header_right">
            <?php echo array_sum($total_sales_summ); ?>
        </td>
    </tr>
        <tr>
        <td>
            Всего продано в этом году на сумму:
        </td>
        <td class="table_header_right">
            <?php echo array_sum($total_sales_summ); ?>
        </td>
    </tr>
    <tr>
        <td>
            Всего заказов:
        </td>
        <td class="table_header_right">
            <?php echo $all_order; ?>
        </td>
    </tr>
    <tr>
        <td>
            Всего Покупателей:
        </td>
        <td class="table_header_right">
            <?php echo count($all_buyers_count) - 1; ?>
        </td>
    </tr>
    <tr>
        <td>
            Покупателей, ожидающих подтверждения:
        </td>
        <td class="table_header_right">
            <?php echo $buyers; ?>
        </td>
    </tr>
    <tr>
        <td>
            Отзывов, ожидающих подтверждения:
        </td>
        <td class="table_header_right">
            <?php echo $reviews; ?>
        </td>
    </tr>
    <tr>
        <td>
            Количество партнеров:
        </td>
        <td class="table_header_right">
            0
        </td>
    </tr>
    <tr>
        <td>
            Партнеров ожидающих подтверждения:
        </td>
        <td class="table_header_right">
            <?php 
    //            $date = '2014.03.25';
                $count = Order::model()->countByAttributes(array('created'=>$date));
            ?>
        </td>
    </tr>
</table>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
                    'name' => 'id',
                    'headerHtmlOptions' => array('width'=>30),
                ),
                'user_name',
                'status_id' => array(
                    'name' => 'status_id',
                    'value' => '($data->status_id==1)?"Новый":"Доставлен"',
                    'filter' => array(0=>"Доставлен",1=>"Новый"),
                    'headerHtmlOptions' => array('width'=>100),
                ),
                'created' => array(
                    'name' => 'created',
                    'filter' => false,           
                    'headerHtmlOptions' => array('width'=>100),
                ),
                'total_price'=>array(
                    'name' => 'total_price',
                    'headerHtmlOptions' => array('width'=>100),
                ),
		
		
	),
)); ?>
