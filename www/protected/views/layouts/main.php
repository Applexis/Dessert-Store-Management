<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div id="header">
		<?php 
		$this->widget('bootstrap.widgets.BootNavbar', array(
		    'fixed'=>true,
		    'brand'=>'甜品屋管理系统',
		    'brandUrl'=>Yii::app()->baseUrl.'/index.php',
		    'collapse'=>true, // requires bootstrap-responsive.css
		    'items'=>array(
		        array(
		            'class'=>'bootstrap.widgets.BootMenu',
		            'items'=>array(
						array('label'=>'主页', 'url'=>array('/site/index')),
						array('label'=>'关于我们', 'url'=>array('/site/page', 'view'=>'about')),
						//array('label'=>'订购流程', 'url'=>array('/site/page', 'view'=>'route')),

						array('label'=>'今日产品', 'url'=>'#', 'items'=>array(
		                    array('label'=>'产品分类', 'itemOptions'=>array('class'=>'nav-header')),
		                    array('label'=>'蛋糕', 'url'=>'#'),
		                    array('label'=>'果冻', 'url'=>'#'),
		                    array('label'=>'饮品', 'url'=>'#'),
		                    array('label'=>'干点', 'url'=>'#'),
		                    '---',
		                    array('label'=>'所有产品', 'url'=>array('/productmanage/index')),
		                )),

						array('label'=>'产品管理', 'url'=>array('/product/index'), 'visible'=>Yii::app()->user->name=='admin'),
		            ),
		        ),
		        '<form class="navbar-search pull-left" action='.Yii::app()->baseUrl.'/productmanage/search'.'><input type="text" class="search-query span2" placeholder="搜索产品" name="key"></form>',
		        array(
		            'class'=>'bootstrap.widgets.BootMenu',
		            'htmlOptions'=>array('class'=>'pull-right'),
		            'items'=>array(
		            	array('url'=>array('/analasis/index'), 'label'=>'统计分析', 'visible'=>Yii::app()->getModule('user')->isAdmin()),
		            	array('url'=>'#', 'label'=>'我的甜品屋', 'items'=>array(
			            	array('url'=>array('/sale/index'), 'label'=>'购买记录', 'visible'=>!Yii::app()->user->isGuest),
			            	array('url'=>array('/reservation/index'), 'label'=>'预订记录', 'visible'=>!Yii::app()->user->isGuest),
			            	array('url'=>array('/card/index'), 'label'=>'会员卡', 'visible'=>!Yii::app()->user->isGuest),
		            	)),
						array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
		            	array('url'=>'#', 'label'=>'我的账户'.' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
							array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
		            		array('url'=>array('/card/index'), 'label'=>'我的会员卡', 'visible'=>!Yii::app()->getModule('user')->isAdmin()),
							array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout"), 'visible'=>!Yii::app()->user->isGuest),
		            	)),
		            ),
		        ),
		    ),
		)); ?>
	</div><!-- header -->




	<!-- <div id="mainmenu_m">
		<?php $this->widget('ext.bootstrap.widgets.BootMenu',array(
			'type'=>'tabs',
			'items'=>array(
				array('label'=>'主页', 'url'=>array('/site/index')),
				array('label'=>'会员卡', 'url'=>array('/card/index'), 'visible'=>!(Yii::app()->user->name=='admin')),
				array('label'=>'产品管理', 'url'=>array('/product/index'), 'visible'=>Yii::app()->user->name=='admin'),
				array('label'=>'今日产品', 'url'=>array('/productmanage/index')),
				array('label'=>'我的账单', 'url'=>array('/sale/index'), 'visible'=>!(Yii::app()->user->name=='admin')),
				array('label'=>'关于我们', 'url'=>array('/site/page', 'view'=>'about')),
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),

			),
		)); ?>
	</div> --><!-- mainmenu -->
	<div id="mainmenu_m" class="container">
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('ext.bootstrap.widgets.BootCrumb', array(
			'links'=>$this->breadcrumbs,
		)); ?>
	<?php endif?>
	</div>

	<div id="page_m" class="container">
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Applex(Company :D).<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
