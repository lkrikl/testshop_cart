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
echo Yii::app()->shoppingCart->getCount() . '<br>';

// Количество всех товаров
echo Yii::app()->shoppingCart->getItemsCount() . '<br>';
//   echo $q.'<br>';
// Сумма всех товаров
echo Yii::app()->shoppingCart->getCost(); //400
echo '<br>';


foreach (Yii::app()->shoppingCart as $one) {
    echo $one->name . ' - ';
    $price = $one->getQuantity();
    echo $price . ' - ';
    $price = $one->getSumPrice();
    echo $price . '<br>';


}



?>

<script type="text/javascript">
    var cart_products_count = <?php echo Yii::app()->shoppingCart->getItemsCount(); ?>
</script>
