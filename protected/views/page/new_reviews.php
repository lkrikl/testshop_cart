<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reviews-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
    
        <?php if(Yii::app()->user->isGuest) : ?>
    
	<div class="row">
		<?php// echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->hiddenField($model,'product_id',array(
                    'value'=>$product->id 
                    )); 
                ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->hiddenField($model,'user_name',array(
                    'size'=>25,
                    'maxlength'=>25,
                    'value'=>Гость,
                    )); 
                ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array(
                    'rows'=>6, 
                    'cols'=>50)); 
                ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Добавить'); ?>
	</div>
    
        <?php else : ?>
    
        <div class="row">
		<?php// echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->hiddenField($model,'product_id',array(
                    'value'=>$product->id 
                    )); 
                ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php// echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->hiddenField($model,'user_name',array(
                    'size'=>25,
                    'maxlength'=>25,
                    'value'=>Yii::app()->user->lastname.' '.Yii::app()->user->firstname,
                    )); 
                ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array(
                    'rows'=>6, 
                    'cols'=>50)); 
                ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Добавить'); ?>
	</div>
        
        <?php endif; ?>
        
<?php $this->endWidget(); ?>

</div><!-- form -->

