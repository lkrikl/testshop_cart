<?php
/* @var $this OrderController */

$this->breadcrumbs=array(
	'Оформление товара',
);
?>
<h1>Оформление товара</h1>

<?php
//$position = Yii::app()->shoppingCart->isEmpty(1);
//if ($position) {
//    echo 'Корзина пустая<br>';
//} else {
//    echo 'В корзине есть товар в количестве<br>';
//}
//// Количество позиций в корзине
////echo Yii::app()->shoppingCart->getCount() . '<br>';
//
//echo '<br>';
//
//
//
//foreach (Yii::app()->shoppingCart as $one) {
//    echo $one->image;
//    echo $one->name . ' - ';
//    $price = $one->getQuantity();
//    echo $price . ' - ';
//    $price = $one->getSumPrice();
//    echo $price . '<br>';
//
//
//}
//echo '<br>';
//
//// Количество всех товаров
//echo 'Всего товаров в корзине - '.Yii::app()->shoppingCart->getItemsCount() . '<br>';
////   echo $q.'<br>';
//// Сумма всех товаров
//echo 'Общая сумма - '.Yii::app()->shoppingCart->getCost(); //400
//echo '<br>';
//
//?>

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
            <?php $price = $one->getQuantity(); echo $price . ' - '; ?>
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
<p>Основная информация</p>
<?php if(Yii::app()->user->hasFlash('order')): ?>

    <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('order'); ?>
    </div>

<?php else: ?>

<?php
    echo $this->renderPartial('orderform',array('model' => $orderform));
?>
<?php endif;?>