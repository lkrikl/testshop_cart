<?php

class CartController extends Controller
{
	public function actionIndex()
	{
            
            if ($_POST['newprice']) {
                Yii::app()->session->add("cart", $_POST['newprice']);
                Yii::app()->session->add("count", $_POST['count']);
                Yii::app()->session->add("products", $_POST['products']);
                $this->layout = false;
            
                $data = array('status' => TRUE);
                header('Content-type: application/json');
                //echo CJavaScript::jsonEncode($_POST['products']);
                echo CJavaScript::jsonEncode($data);
                Yii::app()->end(); 
            }
            //$session = new CHttpSession;
            //$session->open();
            //$session['data'] = 'qwe';
           // print_r($session);
                            //Yii::log('message', $level, $category);
            
            //$this->render('index');
                
                
	}

	
}