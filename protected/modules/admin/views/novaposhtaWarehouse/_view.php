<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $data NovaposhtaWarehouse */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_ru')); ?>:</b>
	<?php echo CHtml::encode($data->address_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_ua')); ?>:</b>
	<?php echo CHtml::encode($data->address_ua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weekday_work_hours')); ?>:</b>
	<?php echo CHtml::encode($data->weekday_work_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weekday_reseiving_hours')); ?>:</b>
	<?php echo CHtml::encode($data->weekday_reseiving_hours); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('weekday_delivery_hours')); ?>:</b>
	<?php echo CHtml::encode($data->weekday_delivery_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday_work_hours')); ?>:</b>
	<?php echo CHtml::encode($data->saturday_work_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday_reseiving_hours')); ?>:</b>
	<?php echo CHtml::encode($data->saturday_reseiving_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saturday_delivery_hours')); ?>:</b>
	<?php echo CHtml::encode($data->saturday_delivery_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_weight_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->max_weight_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_in_city')); ?>:</b>
	<?php echo CHtml::encode($data->number_in_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	*/ ?>

</div>