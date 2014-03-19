<?php
/* @var $this SearchController */

$this->breadcrumbs=array(
	'Поиск',
);
?>
Сортировка: 
    <?php echo CHtml::submitButton(Картинками,array('name'=>'choose_view_block','id'=>'choose_view_block'));?>
    <?php echo CHtml::submitButton(Списком,array('name'=>'choose_view_list','id'=>'choose_view_list'));?>   
<div id="centerLayer">
    <?php foreach($models as $one): ?>
    <div class="product_block">
        <div class="image_product"><?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?></div>
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
<div id="product_block_list">           
     <?php foreach($models as $one): ?>
        <div id="product_list">
           <div class="image_product_list"><?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?></div>
           <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b><br />
           <b><?php echo $one->price; ?></b><br />
           <?php echo substr($one->description,0,250); ?><br /><br />
           <p class="add-product" data-id="<?php echo $one->id; ?>"></p>

       </div>
    <?php endforeach; ?>
    <?php if (!$models)    echo 'В данной категории товаров нет.'; ?>
       </div>          
