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

   

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php// echo $form->labelEx($model,'settlement_delivery'); ?>
        <?php echo $form->textField($model,'settlement_delivery',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'settlement_delivery'); ?>
    </div>

    <div class="row">
        <?php// echo $form->labelEx($model,'delivery_address'); ?>
        <?php echo $form->textField($model,'delivery_address', array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'delivery_address'); ?>
    </div>
    
    <div class="row">
        <?php// echo $form->labelEx($model,'type_of_delivery'); ?>
        <?php echo $form->textField($model,'type_of_delivery',array('size'=>25,'maxlength'=>25)); ?>
        <?php echo $form->error($model,'type_of_delivery'); ?>
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
        <?php echo $form->labelEx($model,'user_phone'); ?>
        <?php echo $form->textField($model,'user_phone',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'user_phone'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'user_address'); ?>
        <?php echo $form->textField($model,'user_address',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'user_address'); ?>
    </div>

    
    <div class="row">
        <?php echo $form->labelEx($model,'user_comment'); ?>
        <?php echo $form->textArea($model,'user_comment',array('rows'=>6, 'cols'=>46)); ?>
        <?php echo $form->error($model,'user_comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Оформить', array(
            
            'class' => 'add',
            'id' => 'addd'
            )); 
        ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->