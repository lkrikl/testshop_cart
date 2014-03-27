<?php

class CartController extends Controller {
  public $layout = '//layouts/column2';

  public function actionIndex() {
    if (isset($_POST['product_id'])) {
      $product = Product::model()->findByPk($_POST['product_id']);
      if ($product) {
        Yii::app()->shoppingCart [] = $product;
        $response = array(
          'count' => Yii::app()->shoppingCart->getItemsCount(),
          'status' => TRUE,
          'total' => Yii::app()->shoppingCart->getCost()
        );
      }
      else {
        $response = array('status' => FALSE, 'error' => 'Not product found');
      }
      header('Content-type: application/json');
      echo CJavaScript::jsonEncode($response);
      Yii::app()->end();
    }
  }

  public function actionClear() {
    Yii::app()->shoppingCart->clear();
    Yii::app()->end();
  }

  public function actionRemoveposition() {
    $remove_position = Product::model()->findByPk($_POST['remove_id']);
    Yii::app()->shoppingCart->remove($remove_position->getId());
    Yii::app()->end();
  }

  public function actionRecalculate() {
    $product = Product::model()->findByPk($_POST['recalculate_id']);

    Yii::app()->shoppingCart->update($product, $_POST['recalculate_value']);

    if ($product) {
      $response = array(
        'count' => Yii::app()->shoppingCart->getItemsCount(),
        'status' => TRUE,
        'total' => Yii::app()->shoppingCart->getCost()
      );
    }
    else {
      $response = array('status' => FALSE, 'error' => 'Not product found');
    }
    header('Content-type: application/json');
    echo CJavaScript::jsonEncode($response);
    Yii::app()->end();
  }
  public function actionLike(){
     
      if (isset($_POST['product_id'])){
          $like_product = new LikeProduct;
          $like_product->user_id = Yii::app()->user->id;
          $like_product->product_id = $_POST['product_id'];
          $like_product->save(false);
          Yii::app()->end();
        }
  }
  public function actionLikeclear(){
      if (isset($_POST['clear'])){
          $clear = LikeProduct::model()->deleteAll('user_id = :user_id', array(':user_id'=>  Yii::app()->user->id));
      }
  }
}