<?php
/* @var $this LookingController */

$this->breadcrumbs = array('Viewed items');?>

<p class="messagecart"></p>
<?php
if ($looking) : ?>
  <?php echo Yii::t('app', 'Sort:'); ?>
  <?php echo CHtml::submitButton('Grid', array('name' => 'choose_view_block', 'id' => 'choose_view_block')); ?>
  <?php echo CHtml::submitButton('List', array('name' => 'choose_view_list', 'id' => 'choose_view_list')); ?>
  <?php echo CHtml::link('Очистить историю', array('id' => 'clear_looking')); ?>
<?php endif; ?>
<div id="centerLayer">
  <?php foreach ($looking as $one): ?>
    <div class="product_block">
      <div class="image_product"><?php echo CHtml::link($one->image, array('view', 'id' => $one->id)); ?></div>
      <b><?php echo CHtml::link($one->name, array('view', 'id' => $one->id)); ?></b>
      <br/>
      <?php echo $one->price; ?><br/>
      <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
      <div id="description"><?php echo substr($one->description, 0, 300); ?></div>
    </div>
  <?php endforeach; ?>
</div>

<div id="product_block_list">
  <?php foreach ($looking as $one): ?>
    <div id="product_list">
      <div class="image_product_list"><?php echo CHtml::link($one->image, array('view', 'id' => $one->id)); ?></div>
      <b><?php echo CHtml::link($one->name, array('view', 'id' => $one->id)); ?></b><br/>
      <b><?php echo $one->price; ?></b><br/>
      <?php echo substr($one->description, 0, 250); ?><br/><br/>
      <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
    </div>
  <?php endforeach; ?>
</div>
<?php if (!$looking) echo Yii::t('app', 'You have not viewed any product.'); ?>
    