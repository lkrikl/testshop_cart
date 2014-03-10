<?php

class OrderController extends Controller
{
	public function actionIndex()
	{
                $orderform = new Order;
                if(isset($_POST['Order']))
                {
                    $orderform->attributes=$_POST['Order'];
                    if($orderform->save()){
                        
                       
                   
                        
                        
                        
                        
                        
                    
                     $product = new Orderproduct;
                        $product->total_product = Yii::app()->shoppingCart->getItemsCount();
                        $product->total_price = Yii::app()->shoppingCart->getCost();
                        $order_id = Order::model()->count();
                        $product->order_id = $order_id;
                        $product->save(false);


                            foreach(Yii::app()->shoppingCart->getPositions() as $one) {

                                $product = new Orderproduct;
                                $product->product_id = $one->id.'<br>';
                                $order_id = Order::model()->count();
                                $product->order_id = $order_id;
                                $product->name = $one->name;
                                $product->image = $one->image;
                                $product->quantity = $one->getQuantity();
                                $product->price = $one->getSumPrice();
                                $product->save(false);
                             }

                        Yii::app()->shoppingCart->clear();
                        $this->redirect(array('view','id'=>$model->id));
                        
                    } 
                }
                
                
//                    if($orderform->save()){
//                        Yii::app()->user->setFlash('order','Ваши данные для оформления отправлены');
//                        
//                    } 
                    
                    
                     
		$this->render('index',array('orderform' => $orderform));
	}

	
}