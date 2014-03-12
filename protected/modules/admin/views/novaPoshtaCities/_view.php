<?php
/* @var $this NovaPoshtaCitiesController */
/* @var $data NovaPoshtaCities */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ru')); ?>:</b>
	<?php echo CHtml::encode($data->name_ru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ua')); ?>:</b>
	<?php echo CHtml::encode($data->name_ua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />


</div>