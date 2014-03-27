<?php

class PageController extends Controller
{
        public $layout='//layouts/column1';
        
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
        
        public function actionNews()
	{
             $news = News::model()->findAllByAttributes(array('status'=>0));
             krsort($news);
             $this->render('news', array('news'=>$news));
        }
	
        public function actionPayment_and_delivery ()
	{
            $result = Page::model()->findByPk(1);
                
            $this->render('payment_and_delivery', array('result'=>$result));
	}
        
        public function actionCooperation()
	{
            $result = Page::model()->findByPk(2);    
            
            $this->render('cooperation', array('result'=>$result));
        }
        public function actionCompany() 
        {
            $result = Page::model()->findByPk(3);
            
            $this->render('company', array('result'=>$result));
        }
        public function actionContact_us() 
        {
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
                $this->render('contact_us', array('model' => $model));
        }
} 