<?php
$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Card','url'=>array('index')),
	array('label'=>'Manage Card','url'=>array('admin')),
);
?>

<h1>Create Card</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>