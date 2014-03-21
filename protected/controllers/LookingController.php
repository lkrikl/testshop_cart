<?php

class LookingController extends Controller {
  public $layout = '//layouts/column2';

  public function actionIndex() {
    session_start();
    $looking = Product::model()->findAllByPk($_SESSION['looking']);
    $this->render('index', array('looking' => $looking));
  }

  public function actionView($id) {
    $product = Product::model()->findByPk($id);
    session_start();
    if (!isset($_SESSION['looking'])) {
      $_SESSION['looking'] = array();
    };
    $new_reviews = new Reviews;
    $reviews = Reviews::model()->findAllByAttributes(array('product_id' => $id));
    if (isset($_POST['Reviews'])) {
      $new_reviews->attributes = $_POST['Reviews'];
      if ($new_reviews->save()) {
        Yii::app()->user->setFlash('contact', 'Спасибо. Ваш комментарий опубликован.');
      }

    }
    $this->render('view', array(
      'product' => $product,
      'new_reviews' => $new_reviews,
      'reviews' => $reviews,
    ));
  }

  public function actionClear() {
    session_start();
    session_destroy();
  }
}