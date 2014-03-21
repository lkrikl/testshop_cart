<?php
/* @var $this MonitorController */

$this->breadcrumbs=array(
	'Монитор: '.$product->name,
);
?>
<?php 
       session_start();
            if(!isset($_SESSION['looking']))
                 $_SESSION['looking'] = array(0);
            array_push($_SESSION['looking'], $product->id);                          
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
    <div id="add_reviews_about_product">  
        <h2>Оставьте комментарий</h2>
        <p>Комментарий:</p>
        <?php echo CHtml::hiddenField('reviews_product_id',"$product->id");  ?><br>
        <?php echo CHtml::textArea('reviews_user_message','',array('rows'=>6,'cols'=>50));  ?><br>
        <?php echo CHtml::submitButton('Добавить комментарий',array('id'=>'send_reviews_message')) ?>

    </div>
    <div id="reviews">
        <?php 
                foreach ($reviews as $one) : ?>
        <p><b><?php echo $one->user_name; ?>:</b></p>
                    <?php echo $one->message; ?>
               <?php endforeach; ?> <br>
    </div>

    
   
    
