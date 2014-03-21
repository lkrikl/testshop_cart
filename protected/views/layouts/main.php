<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
        media="screen, projection"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
        media="print"/>
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
        media="screen, projection"/>
  <![endif]-->
  <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/js/script.js"></script>
  <script src="<?php echo Yii::app()->baseUrl; ?>/js/clear.js"></script>
  <?php //echo Yii::app()->bootstrap->register(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container" id="page">
  <header id="header">
    <a href="/"> <img src="/images/Home_page.png"></a>
    <a href="/looking" id="looking"><img src="/images/looking.jpg"></a>
  </header>
  <!-- header -->
  <div id="nadfooter">
      <?php if (isset($looking)):?>
      <?php $looking = Product::model()->findAllByPk($_SESSION['looking']); ?>
      <b><?php echo count($looking); ?></b>
    <?php endif; ?>

    <span id="headinfo">
      <a href="javascript:;"><?php echo Yii::t('app', 'Payment and delivery'); ?> </a>
      <a href="javascript:;"><?php echo Yii::t('app', 'Cooperation'); ?> </a>
      <a href="javascript:;"><?php echo Yii::t('app', 'About company'); ?> </a>
      <a href="javascript:;"><?php echo Yii::t('app', 'Contacts'); ?> </a>
    </span>
    <div id="block-cart">
      <p><?php echo Yii::t('app', 'Shopping cart'); ?>(<span class="count"><?php echo Yii::app()->shoppingCart->getItemsCount(); ?></span>)
      <div id="update_scart">
        <p>Товаров: <span class="count"> <?php echo Yii::app()->shoppingCart->getItemsCount(); ?></span></p>
        <p>На сумму: <span data-price="0" id="price">
          <?php echo Yii::app()->shoppingCart->getCost(); ?>
        </span>
        </p><a href="#" class="clear_cart"><?php echo Yii::t('app', 'Clear'); ?></a>
        <a href="/order"><?php echo Yii::t('app', 'Checkout'); ?></a>
      </div>
    </div>

    <form class="form_search" method="post" action="/search" target="_blank">
      <?php
      $this->widget('CAutoComplete',
        array(
          'model' => 'product',
          'name' => 'product_name',
          'url' => array('/search/autocomplete'),
          'minChars' => 2,
        )
      );
      ?>
    </form>
  </div>
  <!-- mainmenu -->
  <div id="mainmenu">
    <?php $this->widget('zii.widgets.CMenu', array(
      'items' => Category::menu('top'),
    )); ?>
    <div id="usermainmenu">
      <?php $this->widget('zii.widgets.CMenu', array(
        'items' => array(
          array(
            'url' => Yii::app()->getModule('user')->loginUrl,
            'label' => Yii::app()->getModule('user')->t("Login"),
            'visible' => Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'userclass')
          ),
          array(
            'url' => Yii::app()->getModule('user')->registrationUrl,
            'label' => Yii::app()->getModule('user')->t("Register"),
            'visible' => Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'userclass')
          ),
          array(
            'url' => Yii::app()->getModule('user')->profileUrl,
            'label' => Yii::app()->getModule('user')->t("Profile"),
            'visible' => !Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'userclass')
          ),
          array(
            'url' => Yii::app()->getModule('user')->logoutUrl,
            'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')',
            'visible' => !Yii::app()->user->isGuest,
            'itemOptions' => array('class' => 'userclass')
          ),
        ),
      ));
      ?>
    </div>

    <?php if (isset($this->breadcrumbs)): ?>
      <?php $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
      )); ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>
    <?php if (count($_SESSION['looking']) > 0): ?>
      <div id="view_item">
        <?php
        session_start();
        $looking = Product::model()->findAllByPk($_SESSION['looking']);
        ?>
        <p class="view_product"><img src="/images/looking.png">Просмотренные товары</p>

        <div id="centerLayer">
          <?php foreach ($looking as $one): ?>
            <?php //if($one->id !== $product->id) : ?>
            <div class="product_block">
              <div class="image_product"><?php echo CHtml::link($one->image, array('view', 'id' => $one->id)); ?></div>
              <b><?php echo CHtml::link($one->name, array('view', 'id' => $one->id)); ?></b>
              <br/>
              <?php echo $one->price; ?><br/>

              <p class="add-product" data-id="<?php echo $one->id; ?>"></p>

              <div id="description"><?php echo substr($one->description, 0, 300); ?></div>
            </div>
            <?php //endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="clear"></div>
    <?php endif; ?>
    <div id="nadfooter">EMAIL ТЕЛЕФОН АДРЕС</div>
    <div id="footer">
      <?php echo Yii::powered(); ?>&copy; <?php echo date('Y'); ?>
    </div>
    <!-- footer -->
  </div>
  <!-- page -->
  <div id="message_cart"><p><?php echo Yii::t('app', 'Product added to cart'); ?></p></div>
  <script type="text/javascript">
    var cart_products_count =
    <?php echo Yii::app()->shoppingCart->getItemsCount(); ?>
  </script>

</body>
</html>
