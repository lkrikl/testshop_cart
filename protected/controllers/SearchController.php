<?php

class SearchController extends Controller {
  public $layout = '//layouts/column2';

  public function actionIndex() {
    $models = Product::model()->findAllByAttributes(array('name' => $_POST[product_name]));
    $this->render('index', array('models' => $models));
  }

  public function actionView($id) {

    $product = Product::model()->findByPk($id);
    session_start();
    if (!isset($_SESSION['looking'])) {
      $_SESSION['looking'] = array();
    };
    $reviews = Reviews::model()->findAllByAttributes(array('product_id' => $id));
    if (isset($_POST['Reviews'])) {
      $new_reviews->attributes = $_POST['Reviews'];
      if ($new_reviews->save()) {
        Yii::app()->user->setFlash('contact', 'Спасибо. Ваш комментарий опубликован.');
      }

    }
    $this->render('view', array(
      'product' => $product,
      'reviews' => $reviews,
    ));
  }

  public function actionAutocomplete() {

    if (isset($_GET['q'])) {

      $criteria = new CDbCriteria;
      $criteria->condition = 'name LIKE :product_name';
      $criteria->params = array(':product_name' => $_GET['q'] . '%');

      if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
        $criteria->limit = $_GET['limit'];
      }

      $product = Product::model()->findAll($criteria);

      $resStr = '';
      foreach ($product as $one) {
        $resStr .= $one->name . "\n";
      }
      echo $resStr;
    }

    $this->render('autocomplete');
  }


}