<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>



<hr>
<?php if(Yii::app()->user->hasFlash('test')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('test'); ?>
</div>

<?php else: ?>

<?php $this->renderPartial('_form', array('model'=>$address)); ?>
<?php endif; ?>







<div id="blockbody">
         
         <div id="block-cart">
             <p>Корзина (<span class="count">0</span>) 
             <div>
                 <p>Товаров: <span class="count">0</span></p>
                 <p>На сумму: <span price="0" id="price">0</span></p>
                 <a href="">Оформить</a>
                 
             </div>
         </div>
                 
         <div id="block-content">
               
             <p class="messagecart"></p>
             
             <ul id="listing">
                 
                 <li>
                     <div class="fixblock">
                         <center><img src="1.jpg" /></center>
                     </div>
                     <p class="price-tovar">2 500 руб</p>
                     <p price="2500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="2.jpg" /></center>
                     </div>
                     <p class="price-tovar">1 500 руб</p>
                     <p price="1500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="3.jpg" /></center>
                     </div>
                     <p class="price-tovar">3 500 руб</p>
                     <p price="3500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="4.jpg" /></center>
                     </div>
                     <p class="price-tovar">4 500 руб</p>
                     <p price="4500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="5.jpg" /></center>
                     </div>
                     <p class="price-tovar">5 500 руб</p>
                     <p price="5500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="6.jpg" /></center>
                     </div>
                     <p class="price-tovar">6 500 руб</p>
                     <p price="6500" rel="1" class="add-tovar"></p>
                 </li> 
                  <li>
                     <div class="fixblock">
                         <center><img src="7.jpg" /></center>
                     </div>
                     <p class="price-tovar">7 500 руб</p>
                     <p price="7500" rel="1" class="add-tovar"></p>
                 </li> 
                 
                 
             </ul>
             
         
         </div>
       
         
     </div>