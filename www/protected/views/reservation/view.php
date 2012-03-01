<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reservation','url'=>array('index')),
	array('label'=>'Create Reservation','url'=>array('create')),
	array('label'=>'Update Reservation','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Reservation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reservation','url'=>array('admin')),
);
?>

<h1>View Reservation #<?php echo $model->id; ?></h1>

<?php $this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'product_id',
		'amount',
		'mk_reserve_time',
		'reserve_time',
	),
)); ?>
