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
            
                $model = Product::model()->findByPk($id);
            
		$this->render('view', array('model'=>$model));
	}
            
	
} 