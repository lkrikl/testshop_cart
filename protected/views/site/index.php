<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>






<div id="centerLayer">
    <?php foreach($product as $one): ?>
    <div class="product_block">
        <?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?>
        <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b>
        <br />
        <?php echo $one->price; ?><br />
        <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
    </div>
    <?php endforeach; ?>
    <?php if (!$product)    echo 'В данной категории товаров нет.'; ?>
</div>

               
             <p class="messagecart"></p>
             
             
             