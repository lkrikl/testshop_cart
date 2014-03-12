<?php

class SearchController extends Controller
{
	public $layout='//layouts/column2';
        
        public function actionIndex()
	{
            $models = Product::model()->findAllByAttributes(array('name'=>$_POST[product_name]));
            $this->render('index',array('models'=>$models));
	}
        
        public function actionView($id)
	{
            
                $model = Product::model()->findByPk($id);
            
		$this->render('view', array('model'=>$model));
	}
        public function actionAutocomplete() {
            
            if (isset($_GET['q'])) {
         
                $criteria = new CDbCriteria;
                $criteria->condition = 'name LIKE :product_name';
                $criteria->params = array(':product_name'=>$_GET['q'].'%');

                if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
                    $criteria->limit = $_GET['limit'];
                }

                $product = Product::model()->findAll($criteria);

                $resStr = '';
                foreach ($product as $one) {
                    $resStr .= $one->name."\n";
                }
                echo $resStr;
            }
            
            $this->render('autocomplete');
        }

	
}