<?php

class DynamiccitiesController extends Controller
{
	public function actionIndex()
	{
	
//            $data=RegionCity::model()->findAll('region_id=:region_id', 
//            array(':region_id'=>(int) $_POST['region_id']));
//
//            $data=CHtml::listData($data,'id','city_name');
//
//            echo "<option value=''>Select City</option>";
//            foreach($data as $value=>$city_name)
//            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($city_name),true);
            
            $response = array('status' => TRUE);
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($response);
            $this->render('index');
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