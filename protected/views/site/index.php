<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>





<?php
$position = Yii::app()->shoppingCart->isEmpty(1);
if ($position) {
    echo 'Корзина пустая<br>';
} else {
    echo 'В корзине есть товар в количестве<br>';
}
// Количество позиций в корзине
//echo Yii::app()->shoppingCart->getCount() . '<br>';

echo '<br>';



foreach (Yii::app()->shoppingCart as $one) {
    echo $one->name . ' - ';
    $price = $one->getQuantity();
    echo $price . ' - ';
    $price = $one->getSumPrice();
    echo $price . '<br>';


}
echo '<br>';

// Количество всех товаров
echo 'Всего товаров в корзине - '.Yii::app()->shoppingCart->getItemsCount() . '<br>';
//   echo $q.'<br>';
// Сумма всех товаров
echo 'Общая сумма - '.Yii::app()->shoppingCart->getCost(); //400
echo '<br>';

?>
