<?php

class LookingController extends Controller
{
    public $layout='//layouts/column2';
	public function actionIndex()
	{
           session_start();
           $looking = Product::model()->findAllByPk($_SESSION['looking']);
		$this->render('index', array('looking'=>$looking));
	}
        public function actionView($id)
	{
                $model = Product::model()->findByPk($id);
                    
		$this->render('view', array('model'=>$model));
	}
        public function actionClear() {
            session_start();
            session_destroy();
        }
}