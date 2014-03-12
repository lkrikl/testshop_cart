<?php

class CartController extends Controller
{
    public $layout='//layouts/column2';
    public function actionIndex()
    {
        if (isset($_POST['product_id'])) {
            $product = Product::model()->findByPk($_POST['product_id']);
            if ($product) {
                Yii::app()->shoppingCart [] = $product;
                $response = array(
                    'count' => Yii::app()->shoppingCart->getItemsCount(),
                    'status' => TRUE,
                    'total' => Yii::app()->shoppingCart->getCost()
                );
            }
            else {
                $response = array('status' => FALSE, 'error' => 'Not product found');
            }
            header('Content-type: application/json');
            echo CJavaScript::jsonEncode($response);
            Yii::app()->end();
        }
    }

    public function actionClear() {
        Yii::app()->shoppingCart->clear();
        Yii::app()->end();
    }
    public function actionAdd() {
        
//        $product = new Orderproduct;
//        $product->total_product = Yii::app()->shoppingCart->getItemsCount();
//        $product->total_price = Yii::app()->shoppingCart->getCost();
//        $order_id = Order::model()->count();
//        $product->order_id = $order_id;
//        $product->save(false);
//        
//        
//            foreach(Yii::app()->shoppingCart->getPositions() as $one) {
//
//                $product = new Orderproduct;
//                $product->product_id = $one->id.'<br>';
//                $order_id = Order::model()->count();
//                $product->order_id = $order_id;
//                $product->name = $one->name;
//                $product->image = $one->image;
//                $product->quantity = $one->getQuantity();
//                $product->price = $one->getSumPrice();
//                $product->save(false);
//             }
//             
//        Yii::app()->shoppingCart->clear();
//        Yii::app()->end();
         
    }
}