<?php

class PageController extends Controller
{
         public $layout='//layouts/column2';
        
	public function actionIndex($id)
	{
                //$cart = NULL;
		$models = Product::model()->findAllByAttributes(array('category_id'=>$id));
                $category = Category::model()->findByPk(array($id));
                //$cart = Yii::app()->session->get("cart");
                //print();
                
                array(
                    '12' => array('price' => 166, 'count' => 2),
                    '14' => array('price' => 166, 'count' => 2),
                    '14' => array('price' => 166, 'count' => 2),
                    '14' => array('price' => 166, 'count' => 2),
                );
                
                
                krsort($models);
                $this->render('index',array('models'=>$models,'category'=>$category));
	}
        
        public function actionView($id)
	{
            
                $model = Product::model()->findByPk($id);
            
		$this->render('view', array('model'=>$model));
	}
            
	
} 