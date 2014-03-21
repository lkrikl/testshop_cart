<?php $this->breadcrumbs = array('Оформление товара'); ?>
<div id="Container_order">
  <?php if (Yii::app()->user->hasFlash('contact')): ?>
    <div class="flash-success">
      <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>
    <div id="view_order"><?php echo Yii::t('app', 'View order № "{order_id}"', array('{order_id}' => $orderform->id)); ?></div>
    <div id="ordering_Information">
      <table>
        <tr>
          <td><b><?php echo Yii::t('app', 'Name'); ?></b></td>
          <td><b><?php echo Yii::t('app', 'Quantity'); ?></b></td>
          <td><b><?php echo Yii::t('app', 'Amount'); ?></b></td>
        </tr>
        <?php foreach ($ordered_product as $one): ?>
          <tr>
            <td><?php echo $one->name; ?></td>
            <td><?php echo $one->quantity; ?></td>
            <td><?php echo $one->price; ?>
            <td>
          </tr>
        <?php endforeach; ?>
      </table>
      <div><?php echo Yii::t('app', 'Total to pay:'); ?> <b><?php echo $total_price; ?> $</b></div>
      <div id="recipient_data">
        <h3><?php echo Yii::t('app', 'Recipient data'); ?></h3>
        <p><b><?php echo Yii::t('app', 'Name:'); ?> </b><?php echo $orderform->user_name ?></p>
        <p><b><?php echo Yii::t('app', 'E-mail:'); ?> </b><?php echo $orderform->user_email ?></p>
        <p><b><?php echo Yii::t('app', 'Address:'); ?> </b><?php echo $orderform->user_address ?></p>
        <p><b><?php echo Yii::t('app', 'Phone:'); ?> </b><?php echo $orderform->user_phone ?></p>
      </div>
    </div>

  <?php else: ?>
    <div id="registration_order">
      <h1><?php echo Yii::t('app', 'Checkout'); ?></h1>
      <?php if (!Yii::app()->shoppingCart->isEmpty(1)) : ?>
      <table>
        <tr>
          <td></td>
          <td><?php echo Yii::t('app', 'Image'); ?></td>
          <td><?php echo Yii::t('app', 'Product name'); ?></td>
          <td><?php echo Yii::t('app', 'Quantity'); ?></td>
          <td><?php echo Yii::t('app', 'Price'); ?></td>
        </tr>
        <?php foreach (Yii::app()->shoppingCart as $one): ?>
          <tr>
            <td>
              <div class="remove_position" data-id="<?php echo $one->id; ?>"></div>
            </td>
            <td><?php echo $one->image; ?></td>
            <td><?php echo $one->name; ?></td>
            <td>
              <?php echo CHtml::numberField('count_product_field', $one->getQuantity(), array(
                'class' => 'count_product',
                'data-id' => $one->id,
                'min' => 1,
                'max' => 100
              )) ?>
            </td>
            <td><?php echo $one->getSumPrice(); ?><br></td>
          </tr>
        <?php endforeach; ?>
      </table>
        <p align="right">
          <b><?php echo CHtml::submitButton('Пересчитать', array('id' => 'recalculate',)); ?>
          Всего товаров -
          <span id="count"><?php echo Yii::app()->shoppingCart->getItemsCount(); ?></span>
          <br>
          Общая сумма -
          <span id="total_price"><?php echo Yii::app()->shoppingCart->getCost(); ?></span>
          <?php endif; ?>
            </b>
        </p>
      <hr>
    </div>
    <?php if (Yii::app()->shoppingCart->isEmpty(1)) : ?>
      <h4><?php echo Yii::t('app', 'Your shopping card is empty'); ?></h4>
    <?php else: ?>
      <?php echo CHtml::checkBox('choice_of_delivery'); ?> Доставка Новой Почтой
      <div id="new_mail_delivery">
        <p>Населенный пункт</p>
        <?php echo CHtml::dropDownList('drop', '', $nova_cities, array('empty' => '')); ?>
        <div id="loader"><img src="/images/loading.gif"></div>
        <div id="warehouseContainer"></div>
      </div>
      <h3><?php echo Yii::t('app', 'Summary'); ?></h3>
      <p class="messagecart"></p>
      <?php  echo $this->renderPartial('orderform', array(
        'model' => $orderform,
        'nova_cities' => $nova_cities
      ));
      ?>
    <?php endif; ?>
  <?php endif; ?>
</div>
        
