<?php

class CartController extends Controller
{
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


}