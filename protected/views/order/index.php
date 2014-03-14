<?php
/* @var $this OrderController */

$this->breadcrumbs = array(
    'Оформление товара',
);
?>
<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
    <div id="view_order">Просмотр заказа № <?php echo $orderform->id;?></div>
    <div id="ordering_Information">
        <table>
            <tr>
                <td>
                    <b>Название</b>
                </td>
                <td>
                    <b>Количество</b>
                </td>
                <td>
                    <b>Сумма</b>
                </td>
            </tr>
            <?php foreach($ordered_product as $one): ?> 
            <tr>
                <td>
                    <?php echo $one->name; ?>
                </td>
                <td>
                    <?php echo $one->quantity; ?>
                </td>
                <td>
                    <?php echo $one->price; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div>
            Всего к оплате: <b><?php echo $total_price; ?> $</b>
        </div>
        <div id="recipient_data">
            <h3>Данные получателя</h3>
            <p><b>Ф.И.О.: </b><?php echo $orderform->user_name ?></p>
            <p><b>E-mail: </b><?php echo $orderform->user_email ?></p>
            <p><b>Адрес: </b><?php echo $orderform->user_address ?></p>
            <p><b>Телефон: </b><?php echo $orderform->user_phone?></p>
        </div>
    </div>

<?php else: ?>

    <h1>Оформление товара</h1>

    <table>
        <tr>
            <td>
                
            </td>
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
        <?php foreach (Yii::app()->shoppingCart as $one): ?>
            <tr>
                <td>
                    <div id="remove_position"data-id="<?php echo $one->id; ?>"></div>
                </td>
                <td>
                    <?php echo $one->image; ?>
                </td>
                <td>
                    <?php echo $one->name; ?>
                </td>
                <td>
                    <?php $price = $one->getQuantity();
                    echo $price . '  '; ?>
                </td>
                <td>
                    <?php $price = $one->getSumPrice();
                    echo $price . '<br>'; ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </table>
    <b><p align="right">
            <?php
            echo 'Всего товаров  - ' . Yii::app()->shoppingCart->getItemsCount() . '<br>';
            //   echo $q.'<br>';
            // Сумма всех товаров
            echo 'Общая сумма - ' . Yii::app()->shoppingCart->getCost(); //400
            echo '<br>';
            ?>
        </p></b>
    <hr>
    <?php if (Yii::app()->shoppingCart->isEmpty(1)) : ?>

        <h4>Товаров для заказа нет</h4>

    <?php else: ?>
        <?php echo CHtml::checkBox(choice_of_delivery); ?> Доставка Новой Почтой
        <div id="new_mail_delivery">
        <p>Населенный пункт</p>
        <?php echo CHtml::dropDownList('drop', '', $nova_cities, array('empty'=>'')); ?>
        <div id="loader"><img src="/images/loading.gif"></div>
        <div id="warehouseContainer"></div>
        </div>
        <h3>Основная информация</h3>
        <p class="messagecart"></p>
        <?php  echo $this->renderPartial('orderform', array(
            'model' => $orderform,
            'nova_cities'=>$nova_cities
            ));  
        ?>
           
    <?php endif; ?>
<?php endif; ?>

        
        
