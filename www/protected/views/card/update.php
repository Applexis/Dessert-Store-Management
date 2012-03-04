<?php
$this->breadcrumbs=array(
	'会员卡'=>array('index'),
	'充值',
);

$this->menu=array(
	array('label'=>'会员卡信息','url'=>array('index')),
);
?>

<h1><?php echo isset($isActivate) ? '会员卡激活' : '会员卡充值'; ?></h1>
<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>