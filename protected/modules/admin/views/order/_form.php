<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'secret_key'); ?>
		<?php// echo $form->textField($model,'secret_key',array('size'=>10,'maxlength'=>10)); ?>
		<?php// echo $form->error($model,'secret_key'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'delivery_id'); ?>
		<?php// echo $form->textField($model,'delivery_id'); ?>
		<?php// echo $form->error($model,'delivery_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'delivery_price'); ?>
		<?php// echo $form->textField($model,'delivery_price'); ?>
		<?php// echo $form->error($model,'delivery_price'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'total_price'); ?>
		<?php //echo $form->textField($model,'total_price'); ?>
		<?php //echo $form->error($model,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->dropDownList($model,'status_id', array(1=>"Новый",0=>"Доставлен")); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'paid'); ?>
		<?php// echo $form->textField($model,'paid'); ?>
		<?php// echo $form->error($model,'paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_email'); ?>
		<?php echo $form->textField($model,'user_email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'user_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_address'); ?>
		<?php echo $form->textField($model,'user_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'user_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_phone'); ?>
		<?php echo $form->textField($model,'user_phone',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'user_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_comment'); ?>
		<?php echo $form->textField($model,'user_comment',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'user_comment'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'ip_address'); ?>
		<?php// echo $form->textField($model,'ip_address',array('size'=>50,'maxlength'=>50)); ?>
		<?php// echo $form->error($model,'ip_address'); ?>
	</div>

	

	<div class="row">
		<?php// echo $form->labelEx($model,'discount'); ?>
		<?php// echo $form->textField($model,'discount',array('size'=>60,'maxlength'=>255)); ?>
		<?php// echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_comment'); ?>
		<?php echo $form->textArea($model,'admin_comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'admin_comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->