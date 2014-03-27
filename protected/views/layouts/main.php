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
	<?php //echo Yii::app()->bootstrap->register(); ?> 
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <?php echo CHtml::metaTag(is_array(Yii::app()->params['keywords'])?implode(Yii::app()->params['keywords'],','):Yii::app()->params['keywords'],'keywords');
        echo CHtml::metaTag(Yii::app()->params['description'],'description'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container" id="page">
	<div id="header">
            <a href="/"> <img src="/images/Home_page.png"></a>
    </div><!-- header -->
        <div id="nadfooter"><b>
        </b>
                <class id="headinfo">
                    <a href="/faq">FAQ </a>
                    <a href="/page/news">Новости </a>
                    <a href="/page/payment_and_delivery">Оплата и доставка </a>
                    <a href="/page/cooperation">Сотрудничество </a>
                    <a href="/page/company">О компании </a>
                    <a href="/page/contact_us">Связаться с нами </a>
                </class>  
                             <div id="block-cart">
                                 <p>Корзина (<span class="count"><?php echo Yii::app()->shoppingCart->getItemsCount();?></span>)<img src="/images/cart.png">
                                    <div id="update_scart">
                                        <p>Товаров: <span class="count"> <?php echo Yii::app()->shoppingCart->getItemsCount();?></span></p>
                                        <p>На сумму: <span data-price="0" id="price">
                                            <?php echo Yii::app()->shoppingCart->getCost();?>
                                            </span>
                                        </p><a href="#" class="clear_cart"/>Очистить</a>
                                        <a href="/order">Оформить</a>
                                    </div>
                             </div>
            
            <form class="form_search" method="post" action="/search" target="_blank">
            <?php 
                $this->widget('CAutoComplete',
                array(
                    'model'=>'product',
                    'name'=>'product_name',
                    'url'=>array('/search/autocomplete'),
                    'minChars'=>2,
               )
            );
            ?>
            </form>
        </div>
        <!-- mainmenu -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			 'items'=>  Category::menu('top'),
		)); ?>
       <div id="usermainmenu">
            <?php $this->widget('zii.widgets.CMenu',array(
                                        'items'=>array(
                                                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array( 'class' => 'userclass' )),
                                                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array( 'class' => 'userclass' )),
                                                array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest, 'itemOptions' => array( 'class' => 'userclass' )),
                                                array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest, 'itemOptions' => array( 'class' => 'userclass' )),
                                   ),
                                            )); 
                             ?>
        </div>
            	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
        <?php if(count($_SESSION['looking']) > 0): ?>
        <div id="view_item">
            <?php  
                session_start();
                $looking = Product::model()->findAllByPk($_SESSION['looking']);
            ?>
            <p class="view_product"><img src="/images/looking.png">Просмотренные товары</p>
            <div id="centerLayer">
                <?php foreach($looking as $one): ?>
                    <?php //if($one->id !== $product->id) : ?>
                    <div class="product_block">
                        <div class="image_product"><?php echo CHtml::link($one->image,array('view','id'=>$one->id)); ?></div>
                        <b><?php echo CHtml::link($one->name,array('view','id'=>$one->id)); ?></b>
                        <br />
                        <?php echo $one->price; ?><br />
                        <p class="add-product" data-id="<?php echo $one->id; ?>"></p>
                        <div id="description"><?php echo substr($one->description,0,300); ?></div>
                    </div>
                    <?php //endif; ?>
                <?php endforeach; ?>    
            </div>
        </div><div class="clear"></div>
        <?php endif; ?>
        <div id="nadfooter">EMAIL ТЕЛЕФОН АДРЕС </div>
	<div id="footer">
		<?php echo Yii::powered(); ?>&copy; <?php echo date('Y'); ?>
	</div><!-- footer -->
</div><!-- page -->
<div id="message_cart"><p>Товар добавлен в корзину</p></div>
    <script type="text/javascript">
        var cart_products_count = <?php echo Yii::app()->shoppingCart->getItemsCount(); ?>
    </script>
    
</body>
</html>
