<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'secret_key'); ?>
		<?php// echo $form->textField($model,'secret_key',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'delivery_id'); ?>
		<?php// echo $form->textField($model,'delivery_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'delivery_price'); ?>
		<?php// echo $form->textField($model,'delivery_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_price'); ?>
		<?php echo $form->textField($model,'total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'paid'); ?>
		<?php// echo $form->textField($model,'paid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_name'); ?>
		<?php echo $form->textField($model,'user_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_email'); ?>
		<?php echo $form->textField($model,'user_email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_address'); ?>
		<?php echo $form->textField($model,'user_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_phone'); ?>
		<?php echo $form->textField($model,'user_phone',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_comment'); ?>
		<?php echo $form->textField($model,'user_comment',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'ip_address'); ?>
		<?php// echo $form->textField($model,'ip_address',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated'); ?>
		<?php echo $form->textField($model,'updated'); ?>
	</div>

	<div class="row">
		<?php// echo $form->label($model,'discount'); ?>
		<?php// echo $form->textField($model,'discount',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_comment'); ?>
		<?php echo $form->textArea($model,'admin_comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->