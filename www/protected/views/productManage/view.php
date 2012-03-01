<?php
$this->breadcrumbs=array(
	'Product Manages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductManage','url'=>array('index')),
	array('label'=>'Create ProductManage','url'=>array('create')),
	array('label'=>'Update ProductManage','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ProductManage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductManage','url'=>array('admin')),
);
?>

<h1>View ProductManage #<?php echo $model->id; ?></h1>

<?php $this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'date',
		'amount',
		'price',
	),
)); ?>
