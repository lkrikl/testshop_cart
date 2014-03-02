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
      
        
	<?php //echo Yii::app()->bootstrap->register(); ?> 

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <pre><?php  print_r( Yii::app()->session->get("products")); ?></pre>

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
                <class id="logreg">
                    <a href="">Войти </a> или
                    <a href="">Зарегистрироваться </a>
                </class>  
            
             <div id="block-cart">
                <p>Корзина (<span class="count"> <?php echo Yii::app()->session->get("count");?></span>) 
                    <div>
                        <p>Товаров: <span class="count"> <?php echo Yii::app()->session->get("count");?></span></p>
                        <p>На сумму: <span data-price="0" id="price">
                            <?php echo Yii::app()->session->get("cart");?>
                            </span>
                        </p>
                        <a href="">Оформить</a>

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
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
