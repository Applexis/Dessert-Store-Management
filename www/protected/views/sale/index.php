<?php
$this->breadcrumbs=array(
	'账单',
);

$this->menu=array(
	array('label'=>'今日产品','url'=>array('/productmanage/index')),
	array('label'=>'返回主页','url'=>array('/index.php')),
);
?>

<h1>我的账单</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
