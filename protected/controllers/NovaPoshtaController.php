<?php

class NovaposhtaController extends Controller {
  public function actionIndex() {
    $this->render('index');
  }

  public function actionWarehouse() {
    if (isset($_POST['city_id'])) {
      $ware = NovaposhtaWarehouse::model()->findAllByAttributes(array('city_id' => $_POST['city_id']));
      $warehouses = CHtml::listData($ware, 'id', 'address_ru');
      echo $this->renderPartial('warehouse', array('warehouses' => $warehouses));
    }
  }

}