<?php
/* @var $this NovaposhtaWarehouseController */
/* @var $model NovaposhtaWarehouse */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'novaposhta-warehouse-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_ru'); ?>
		<?php echo $form->textField($model,'address_ru',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address_ru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address_ua'); ?>
		<?php echo $form->textField($model,'address_ua',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'address_ua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weekday_work_hours'); ?>
		<?php echo $form->textField($model,'weekday_work_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'weekday_work_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weekday_reseiving_hours'); ?>
		<?php echo $form->textField($model,'weekday_reseiving_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'weekday_reseiving_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weekday_delivery_hours'); ?>
		<?php echo $form->textField($model,'weekday_delivery_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'weekday_delivery_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saturday_work_hours'); ?>
		<?php echo $form->textField($model,'saturday_work_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'saturday_work_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saturday_reseiving_hours'); ?>
		<?php echo $form->textField($model,'saturday_reseiving_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'saturday_reseiving_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saturday_delivery_hours'); ?>
		<?php echo $form->textField($model,'saturday_delivery_hours',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'saturday_delivery_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_weight_allowed'); ?>
		<?php echo $form->textField($model,'max_weight_allowed'); ?>
		<?php echo $form->error($model,'max_weight_allowed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_in_city'); ?>
		<?php echo $form->textField($model,'number_in_city',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'number_in_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_at'); ?>
		<?php echo $form->textField($model,'updated_at'); ?>
		<?php echo $form->error($model,'updated_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->