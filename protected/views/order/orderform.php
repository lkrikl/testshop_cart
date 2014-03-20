<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

  <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'order-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => FALSE,
  )); ?>



  <?php echo $form->errorSummary($model); ?>

  <div class="row">
    <?php // echo $form->labelEx($model,'settlement_delivery'); ?>
    <?php echo $form->hiddenField($model, 'settlement_delivery', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'settlement_delivery'); ?>
  </div>

  <div class="row">
    <?php // echo $form->labelEx($model,'delivery_address'); ?>
    <?php echo $form->hiddenField($model, 'delivery_address', array('size' => 60, 'maxlength' => 100)); ?>
    <?php echo $form->error($model, 'delivery_address'); ?>
  </div>

  <div class="row">
    <?php // echo $form->labelEx($model,'type_of_delivery'); ?>
    <?php echo $form->hiddenField($model, 'type_of_delivery', array('size' => 25, 'maxlength' => 25)); ?>
    <?php echo $form->error($model, 'type_of_delivery'); ?>
  </div>

  <div class="row">
    <?php // echo $form->labelEx($model,'total_price'); ?>
    <?php echo $form->hiddenField($model, 'total_price', array('value' => Yii::app()->shoppingCart->getCost())); ?>
    <?php echo $form->error($model, 'total_price'); ?>
  </div>

  <?php if (!Yii::app()->user->isGuest) : ?>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_name'); ?>
      <?php echo $form->textField($model, 'user_name', array(
        'size' => 60,
        'maxlength' => 100,
        'value' => Yii::app()->user->lastname . ' ' . Yii::app()->user->firstname
      ));
      ?>
      <?php echo $form->error($model, 'user_name'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_email'); ?>
      <?php echo $form->textField($model, 'user_email', array(
        'size' => 60,
        'maxlength' => 100,
        'value' => Yii::app()->user->email,
      ));
      ?>
      <?php echo $form->error($model, 'user_email'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_phone'); ?>
      <?php echo $form->textField($model, 'user_phone', array('size' => 30, 'maxlength' => 30)); ?>
      <?php echo $form->error($model, 'user_phone'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_address'); ?>
      <?php echo $form->textField($model, 'user_address', array('size' => 60, 'maxlength' => 255)); ?>
      <?php echo $form->error($model, 'user_address'); ?>
    </div>


    <div class="row">
      <?php echo $form->labelEx($model, 'user_comment'); ?>
      <?php echo $form->textArea($model, 'user_comment', array('rows' => 6, 'cols' => 46)); ?>
      <?php echo $form->error($model, 'user_comment'); ?>
    </div>

    <div class="row buttons">
      <?php echo CHtml::submitButton('Оформить', array(

        'class' => 'add',
        'id' => 'addd'
      ));
      ?>
    </div>

  <?php else : ?>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_name'); ?>
      <?php echo $form->textField($model, 'user_name', array(
        'size' => 60,
        'maxlength' => 100,
      ));
      ?>
      <?php echo $form->error($model, 'user_name'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_email'); ?>
      <?php echo $form->textField($model, 'user_email', array('size' => 60, 'maxlength' => 100)); ?>
      <?php echo $form->error($model, 'user_email'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_phone'); ?>
      <?php echo $form->textField($model, 'user_phone', array('size' => 30, 'maxlength' => 30)); ?>
      <?php echo $form->error($model, 'user_phone'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'user_address'); ?>
      <?php echo $form->textField($model, 'user_address', array('size' => 60, 'maxlength' => 255)); ?>
      <?php echo $form->error($model, 'user_address'); ?>
    </div>


    <div class="row">
      <?php echo $form->labelEx($model, 'user_comment'); ?>
      <?php echo $form->textArea($model, 'user_comment', array('rows' => 6, 'cols' => 46)); ?>
      <?php echo $form->error($model, 'user_comment'); ?>
    </div>

    <div class="row buttons">
      <?php echo CHtml::submitButton('Оформить', array(

        'class' => 'add',
        'id' => 'addd'
      ));
      ?>
    </div>
  <?php endif; ?>
  <?php $this->endWidget(); ?>

</div><!-- form -->