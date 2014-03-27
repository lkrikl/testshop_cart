<?php

define(ACTIVE, 0);

class DefaultController extends Controller
{
        public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
        
        public function accessRules()
	{
		return array(
                        
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('nikolay'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('nikolay'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin, nikolay'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        public function actionIndex()
	{
            $total_sales = Order::model()->findAll();
            $total_sales_summ = array();
            foreach ($total_sales as $one){
               array_push($total_sales_summ, $one->total_price);
            }
            $all_order = Order::model()->count();
            
            $total_summ = Order::model()->findAll();
            $all_buyers = array();
            foreach ($total_summ as $one){
               array_push($all_buyers, $one->user_id);
            }
            $all_buyers_count = array_unique($all_buyers);
            
            $buyers = Order::model()->countByAttributes(array('status_id'=>ACTIVE));    
            
            $reviews = Reviews::model()->countByAttributes(array('status'=>ACTIVE));    
            
            $model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];
            
       
            $this->render('index', array(
                    'total_sales_summ'=>$total_sales_summ,
                    'all_order'=>$all_order,
                    'all_buyers_count'=>$all_buyers_count,
                    'buyers'=>$buyers,
                    'reviews'=>$reviews,
                    'model'=>$model,
                    ));
	}
}