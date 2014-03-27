<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$key = $seo->meta_keywords;
$description = $seo->meta_descriptions;
if(!empty($key))
Yii::app()->params['keywords']= $seo->meta_keywords;
if(!empty($description))
Yii::app()->params['description']= $seo->meta_descriptions;
?>
<?php 
      session_start();
          if(!isset($_SESSION['looking'])){
               $_SESSION['looking'] = array(1);
          };
?>
    <p class="messagecart"></p>
    Сортировка: 
    <?php echo CHtml::submitButton(Картинками,array('name'=>'choose_view_block','id'=>'choose_view_block'));?>
    <?php echo CHtml::submitButton(Списком,array('name'=>'choose_view_list','id'=>'choose_view_list'));?>
<div id="centerLayer">
    <?php foreach($product as $one): ?>
    <div class="product_block">
        <div class="image_product"><?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?></div>
        <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b>
        <br />
        <?php echo $one->price; ?><br />
        <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
        <?php if(!Yii::app()->user->isGuest) : ?>
        <img class="user-like-product" src="/images/heart-reflection.png" data-id="<?php echo $one->id; ?>">
        <?php endif; ?>
         <div id="description"><?php echo substr($one->description,0,300); ?>...</div>
    </div>
    
    <?php endforeach; ?>
    
</div>
       <div id="product_block_list">           
     <?php foreach($product as $one): ?>
        <div id="product_list">
           <div class="image_product_list"><?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?></div>
           <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b><br />
           <b><?php echo $one->price; ?></b><br />
           <?php echo substr($one->description,0,250); ?><br /><br />
           <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
           <?php if(!Yii::app()->user->isGuest) : ?>
           <img class="user-like-product" src="/images/heart-reflection.png" data-id="<?php echo $one->id; ?>">
           <?php endif; ?>
       
       </div>
    <?php endforeach; ?>
    <?php if (!$product)    echo 'В данной категории товаров нет.'; ?>
       </div>          
