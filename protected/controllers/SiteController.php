<?php

class SiteController extends Controller {

  public $layout = '//layouts/column1';

  /**
   * Declares class-based actions.
   */
  public function actions() {
    return array(
      // captcha action renders the CAPTCHA image displayed on the contact page
      'captcha' => array(
        'class' => 'CCaptchaAction',
        'backColor' => 0xFFFFFF,
      ),
      // page action renders "static" pages stored under 'protected/views/site/pages'
      // They can be accessed via: index.php?r=site/page&view=FileName
      'page' => array(
        'class' => 'CViewAction',
      ),
    );
  }

  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionIndex() {
    $product = Product::model()->findAll();
    krsort($product);
    $seo = Site::model()->findByPk(1);
    session_start();
    if (!isset($_SESSION['looking'])) {
      $_SESSION['looking'] = array();
    };

    // renders the view file 'protected/views/site/index.php'
    // using the default layout 'protected/views/layouts/main.php'
    $this->render('index', array(
        'product' => $product,
        'seo'=>$seo,
        ));
  }

  public function actionView($id) {

    $product = Product::model()->findByPk($id);
    $reviews = Reviews::model()->findAllByAttributes(array('product_id' => $id, 'status' => 0));
    if (isset($_POST['Reviews'])) {
      $new_reviews->attributes = $_POST['Reviews'];
      if ($new_reviews->save()) {
        Yii::app()->user->setFlash('contact', 'Спасибо. Ваш комментарий опубликован.');
      }
    }
    krsort($reviews);
    $this->render('view', array(
      'product' => $product,
      'reviews' => $reviews,
    ));
  }

  /**
   * This is the action to handle external exceptions.
   */
  public function actionError() {
    if ($error = Yii::app()->errorHandler->error) {
      if (Yii::app()->request->isAjaxRequest) {
        echo $error['message'];
      }
      else {
        $this->render('error', $error);
      }
    }
  }

  /**
   * Displays the contact page
   */
  public function actionContact() {
    $model = new ContactForm;
    if (isset($_POST['ContactForm'])) {
      $model->attributes = $_POST['ContactForm'];
      if ($model->validate()) {
        $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
        $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
        $headers = "From: $name <{$model->email}>\r\n" .
          "Reply-To: {$model->email}\r\n" .
          "MIME-Version: 1.0\r\n" .
          "Content-Type: text/plain; charset=UTF-8";

        mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
        Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
        $this->refresh();
      }
    }
    $this->render('contact', array('model' => $model));
  }

  /**
   * Displays the login page
   */
  

  /**
   * Logs out the current user and redirect to homepage.
   */
  public function actionLogout() {
    Yii::app()->user->logout();
    $this->redirect(Yii::app()->homeUrl);
  }
  public function actionNews(){
      $news = News::model()->findAll();
      $this->render('news', array('news' => $news));
  }
  
}