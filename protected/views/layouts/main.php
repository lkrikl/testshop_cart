<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" >

        <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/clear.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/orderproduct.js"></script>
      
        
	<?php //echo Yii::app()->bootstrap->register(); ?> 

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <pre><?php // print_r( Yii::app()->session->get("products")); ?></pre>

<div class="container" id="page">

	<div id="header">
		
	</div><!-- header -->
        <div id="nadfooter">
            <!--img src="/images/logo_axioma.png"-->
                <class id="headinfo">
                    <a href="">Оплата и доставка </a>
                    <a href="">Сотрудничество </a>
                    <a href="">О компании </a>
                    <a href="">Связаться с нами </a>
                    
                </class>   
               
            
                             <div id="block-cart">
                                <p>Корзина (<span class="count"><?php echo Yii::app()->shoppingCart->getItemsCount();?></span>)
                                    
                                    <div id="update_scart">
                                        
                                        <p>Товаров: <span class="count"> <?php echo Yii::app()->shoppingCart->getItemsCount();?></span></p>
                                        <p>На сумму: <span data-price="0" id="price">
                                            <?php echo Yii::app()->shoppingCart->getCost();?>
                                            </span>
                                        </p><a href="#" class="clear_cart"/>Очистить</a>
                                        <a href="http://yii.ww/order">Оформить</a>

                                    </div>
                             </div>
            
        </div>
        <!-- mainmenu -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			 'items'=>  Category::menu('top'),
		)); ?>
             
        </div>
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
        <div id="nadfooter">EMAIL ТЕЛЕФОН АДРЕС</div>
	<div id="footer">
		
		<?php echo Yii::powered(); ?>&copy; <?php echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->
    <script type="text/javascript">
        var cart_products_count = <?php echo Yii::app()->shoppingCart->getItemsCount(); ?>
    </script>
    
</body>
</html>
