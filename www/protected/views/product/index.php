<?php
$this->breadcrumbs=array(
	'产品',
);

$this->menu=array(
	array('label'=>'Create Product','url'=>array('create')),
	array('label'=>'Manage Product','url'=>array('admin')),
);
?>

<h1>产品</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
