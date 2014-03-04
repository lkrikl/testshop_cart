<?php

class CartController extends Controller
{
    public function actionIndex()
    {
        $product = Product::model()->findByPk($_POST['tovarid']);
        Yii::app()->shoppingCart [] = $product;
        $count = Yii::app()->shoppingCart->getItemsCount();
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode(array('count' => $count, 'status' => TRUE));
    }

    public function actionClear() {
        Yii::app()->shoppingCart->clear();
        
        $this->render('Clear');
    }
}