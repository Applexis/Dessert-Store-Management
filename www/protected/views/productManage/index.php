<?php
$this->breadcrumbs=array(
	'Product Manages',
);

$this->menu=array(
	array('label'=>'Create ProductManage','url'=>array('create')),
	array('label'=>'Manage ProductManage','url'=>array('admin')),
);
?>

<h1>Product Manages</h1>

<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
