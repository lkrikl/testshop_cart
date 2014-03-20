<?php
/* @var $this MonitorController */

$this->breadcrumbs=array(
	'Монитор: '.$product->name,
);
?>
<?php
    echo $product->image;
    echo '<h4>'.$product->name.'</h4><br>';
    echo '<b>'.$product->price.'</b>';    
?>
    <hr>
    <p class="add-product" data-id="<?php ECHO $product->id; ?>"></p>
    <hr>
    <ul id="tabs">
        <li class="characteristics">Характеристики</li>
        <li class="photo_product">Фото</li>
        <li class="reviews">Отзывы(<?php echo count($reviews) ?>)</li>
    </ul>
<div id="characteristics">     
        <?php 
                echo $product->description;
        ?>
</div>
    <div id="photo_product">
        <?php 
                echo $product->image;
        ?>
    </div>
    <div id="reviews">
        
        <?php 
                foreach ($reviews as $one) : ?>
        <p><b><?php echo $one->user_name; ?>:</b></p>
                    <?php echo $one->message; ?>
               <?php endforeach; ?> <br>
       <?php if (Yii::app()->user->hasFlash('contact')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('contact'); ?>
            </div>
        <?php else : ?>
        <?php $this->renderpartial('new_reviews',array(
            'model'=>$new_reviews,
            'product'=>$product,
            )) ?>
        <?php endif; ?>
    </div>


    
   
    
