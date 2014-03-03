<?php

class OrderController extends Controller
{
	public function actionIndex()
	{
                $orderform = new Order;
                if(isset($_POST['Order']))
                {
                    $orderform->attributes=$_POST['Order'];
                    if($orderform->save())
                        $this->redirect(array('view','id'=>$model->id));
                }
                
                
                    if($orderform->save()){
                        Yii::app()->user->setFlash('order','Ваши данные для оформления отправлены');
                    }
                    
                     
		$this->render('index',array('orderform' => $orderform));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}