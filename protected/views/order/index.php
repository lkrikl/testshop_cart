<?php
/* @var $this OrderController */

$this->breadcrumbs=array(
	'Оформление товара',
);
?>
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

    <?php endif; ?>