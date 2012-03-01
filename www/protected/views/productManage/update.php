<?php
$this->breadcrumbs=array(
	'Product Manages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductManage','url'=>array('index')),
	array('label'=>'Create ProductManage','url'=>array('create')),
	array('label'=>'View ProductManage','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ProductManage','url'=>array('admin')),
);
?>

<h1>Update ProductManage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>