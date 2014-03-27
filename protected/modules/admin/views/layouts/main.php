<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8" >

        <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/morris.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/protected/modules/admin/css/main.css">
        <?php //echo Yii::app()->bootstrap->register(); ?> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/morris.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<body>
    <pre><?php // print_r( Yii::app()->session->get("products")); ?></pre>

<div class="container" id="page">

	<div id="header">
		
	</div><!-- header -->
        <div id="nadfooter">
            <!--img src="/images/logo_axioma.png"-->
               
        </div>
        <!-- mainmenu -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			 'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Заказы', 'url'=>array('/admin/order', 'view'=>'about')),
                                array('label'=>'Категории', 'url'=>array('/admin/category', 'view'=>'about')),
                                array('label'=>'Товары', 'url'=>array('/admin/product', 'view'=>'about')),
                                array('label'=>'Производители', 'url'=>array('/admin/manufacturer', 'view'=>'about')),
                                array('label'=>'Комментарии', 'url'=>array('/admin/reviews', 'view'=>'about')),
                                array('label'=>'Новости', 'url'=>array('/admin/news', 'view'=>'about')),
                                array('label'=>'Страницы', 'url'=>array('/admin/page', 'view'=>'about')),
                                array('label'=>'SEO', 'url'=>array('/admin/seo', 'view'=>'about')),
                                array('label'=>'FAQ', 'url'=>array('/admin/faq', 'view'=>'about')),
                                array('label'=>'Настройки', 'url'=>array('/admin/settings', 'view'=>'about')),
                                array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
             
        </div>
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
        <div id="nadfooter"></div>
	<div id="footer">
		
		<?php echo Yii::powered(); ?>&copy; <?php echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->
    <script type="text/javascript">
        var cart_products_count = <?php echo Yii::app()->shoppingCart->getItemsCount(); ?>
    </script>
</body>
</html>
