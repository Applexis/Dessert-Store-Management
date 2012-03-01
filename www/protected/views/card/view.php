<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Card','url'=>array('index')),
	array('label'=>'Create Card','url'=>array('create')),
	array('label'=>'Update Card','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Card','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Card','url'=>array('admin')),
);
?>

<h1>View Card #<?php echo $model->id; ?></h1>

<?php $this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'activated',
		'activate_date',
		'money',
	),
)); ?>
