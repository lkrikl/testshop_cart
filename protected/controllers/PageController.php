<?php

class PageController extends Controller
{
        public $layout='//layouts/column2';
        
	public function actionIndex($id)
	{
                
		$models = Product::model()->findAllByAttributes(array('category_id'=>$id));
                $category = Category::model()->findByPk(array($id));
                                 
                
                krsort($models);
                $this->render('index',array('models'=>$models,'category'=>$category));
	}
        
        public function actionView($id)
	{
            
                $product = Product::model()->findByPk($id);
                session_start();
                        if(!isset($_SESSION['looking'])){
                            $_SESSION['looking'] = array();
                        };
                $reviews = Reviews::model()->findAllByAttributes(array('product_id'=>$id));
                if(isset($_POST['Reviews']))
                {
                    $new_reviews->attributes=$_POST['Reviews'];
                    if($new_reviews->save()){
                        Yii::app()->user->setFlash('contact', 'Спасибо. Ваш комментарий опубликован.');
                    }
                        
                }        
               $this->render('view', array(
                    'product'=>$product,
                    'reviews'=>$reviews,
                    ));
	}
            
	
} 