<?php

class OrderController extends Controller
{
    public function actionIndex()
    {
        $orderform = new Order;
        //        $models = NovaPoshtaCities::model()->findAll();
        if (isset($_POST['Order'])) {
            $orderform->attributes = $_POST['Order'];
            if ($orderform->save()) {
           
                Yii::app()->user->setFlash('contact', 'Спасибо. Ваш заказ принят.');
                
                $total_price = Yii::app()->shoppingCart->getCost();
                
                $product = new Orderproduct;
                $product->total_product = Yii::app()->shoppingCart->getItemsCount();
                $product->total_price = Yii::app()->shoppingCart->getCost();
                $product->order_id = $orderform->id;
                $product->save(false);

                foreach (Yii::app()->shoppingCart->getPositions() as $one) {
                    $product = new Orderproduct;
                    $product->product_id = $one->id;
                    $product->order_id = $orderform->id;
                    $product->name = $one->name;
                    $product->image = $one->image;
                    $product->quantity = $one->getQuantity();
                    $product->price = $one->getSumPrice();
                    $product->save(false);
                }

                Yii::app()->shoppingCart->clear();
                
           }
        }
        
        $ordered_product = Orderproduct::model()->findAllByAttributes(array(
                'order_id'=> $orderform->id
                ));

      $nova = NovaPoshtaCities::model()->findAll(array('order' => 'name_ru'));
        $nova_cities = CHtml::listData($nova, 'id', 'name_ru');
        $this->render('index', array(
            'orderform' => $orderform, 
            'nova_cities' => $nova_cities, 
            'ordered_product' => $ordered_product,
            'total_price' => $total_price,
            ));
    }


}