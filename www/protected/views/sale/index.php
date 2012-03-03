<?php
$this->breadcrumbs=array(
	'Sales',
);

$this->menu=array(
	array('label'=>'Create Sale','url'=>array('create')),
	array('label'=>'Manage Sale','url'=>array('admin')),
);
?>

<h1>我的账单</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
