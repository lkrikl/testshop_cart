<?php
/* @var $this OrderController */

$this->breadcrumbs=array(
	'Оформление товара',
);
?>
<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<h1>Оформление товара</h1>

<table>
    <tr>
        <td>
            Фото
        </td>
        <td>
            Наименование товара
        </td>
        <td>
            Количество
        </td>
        <td>
            Цена
        </td>
        
    </tr>
     <?php foreach(Yii::app()->shoppingCart as $one): ?>
    <tr>
        <td>
            <?php echo $one->image; ?>
        </td>
        <td>
            <?php echo $one->name; ?>
        </td>
        <td>
            <?php $price = $one->getQuantity(); echo $price . '  '; ?>
        </td>
        <td>
            <?php $price = $one->getSumPrice(); echo $price . '<br>'; ?>
        </td>
       
    </tr>
    <?php endforeach; ?>
</table>
        <b><p align="right">
            <?php
                echo 'Всего товаров  - '.Yii::app()->shoppingCart->getItemsCount() . '<br>';
                //   echo $q.'<br>';
                // Сумма всех товаров
                echo 'Общая сумма - '.Yii::app()->shoppingCart->getCost(); //400
                echo '<br>';
            ?>
        </p></b>
<hr>
    <?php if(Yii::app()->shoppingCart->isEmpty(1)) :   ?>

        <h4>Товаров для заказа нет</h4>

    <?php else: ?>

        <p>Основная информация</p>
        <p class="messagecart"></p>    

            <?php
                echo $this->renderPartial('orderform',array('model' => $orderform));
            ?>
         
         <form class="nova" method="post" action="/order" target="_blank">
         <pre>
                <?php 
             
             
             $nova = NovaPoshtaCities::model()->findAll(array('order'=>'name_ru'));  
//             print_r($nova);
             $a = CHtml::listData($nova, 'id', 'name_ru');
             echo '<br>';
             echo 'Укажите город доставки ';
             echo CHtml::dropDownList('drop', '', $a,array(
              'prompt'=>'',
              'ajax' => array(
              'type'=>'POST', 
              'url'=>'/dynamiccities', 
              'update'=>'#address', 
            'data'=>array('drop'=>'js:this.value'),
            ))); 
             
             echo '<br>';
              
             $ware = NovaposhtaWarehouse::model()->findAllByAttributes(array('city_id'=>$_POST[drop]));   
             $q = CHtml::listData($ware, 'id', 'address_ru'); 
             echo 'Укажите отделение доставки ';
             echo CHtml::dropDownList('address', '', $q); 
             
             echo '<br>';
//             print_r($q);
//             print_r(array_keys($q));
             echo '<br>';
             echo CHtml::submitButton('Проба');
           //  print_r($a);
             ?></pre>
        </form>
       




        <?php                                   
//            echo CHtml::dropDownList('region_id','', 
//            array(2=>'New England',1=>'Middle Atlantic',3=>'East North Central'),
//
//            array(
//              'prompt'=>'Select Region',
//              'ajax' => array(
//              'type'=>'POST', 
//              'url'=>'/dynamiccities', 
//              'update'=>'#city_name', 
//            'data'=>array('region_id'=>'js:this.value'),
//                  
//            ))); 
//
//
//
//            echo CHtml::dropDownList('city_name','', array(), array('prompt'=>'Select City'));
         ?>
       
            
           
        
<?php endif; ?>
<?php endif; ?>

        
        
   