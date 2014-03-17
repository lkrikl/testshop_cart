<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Поиск',
);
?>
<div id="centerLayer">
    <?php foreach($models as $one): ?>
    <div class="product_block">
        <?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?>
        <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b>
        <br />
        <?php echo $one->price; ?><br />
        <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
		<div id="description"><?php echo substr($one->description,0,300); ?>...</div>
    </div>
    <?php endforeach; ?>
    <?php if (!$models)    echo "По запросу - <b>$_POST[q]</b> - ничего не найдено"; ?>
</div>
              
             <p class="messagecart"></p>
