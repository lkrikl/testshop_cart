<?php

class ReviewsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        public function actionAddcomment(){
           
            
            if (isset($_POST['product_id'])) {
                if(!empty($_POST['reviews_message'])){
                    $response = array('status' => FALSE, 'error' => 'Not product found');
                }
                else {
                    $response = array('status' => TRUE,);
                }
                
                
                
                if(!empty($_POST['reviews_message'])){
                    if(Yii::app()->user->isGuest){
                        
                        $reviews = new Reviews;
                        $reviews->product_id = $_POST['product_id'];
                        $reviews->user_name = 'Гость';
                        $reviews->message = $_POST['reviews_message'];
                        $reviews->save(false);
                    }
                    else {
                        
                        $reviews = new Reviews;
                        $reviews->product_id = $_POST['product_id'];
                        $reviews->user_name = Yii::app()->user->lastname.' '.Yii::app()->user->firstname;
                        $reviews->message = $_POST['reviews_message'];
                        $reviews->save(false);
                    }
                }
            }
           
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($response);
            Yii::app()->end();
            
            
            
            $this->render('addcomment');
        }
	
}