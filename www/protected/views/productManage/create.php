<?php
$this->breadcrumbs=array(
	'Product Manages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductManage','url'=>array('index')),
	array('label'=>'Manage ProductManage','url'=>array('admin')),
);
?>

<h1>新建销售计划</h1>

<?php 
$check = Product::model()->findByPk($pid);
if ($check != false){
	echo $this->renderPartial('_form', array('model'=>$model, 'pname'=>$check->name));
}
else{
	Yii::app()->user->setFlash('error', '<strong>Oops!</strong> 这个商品不存在噢:(');
	$this->widget('bootstrap.widgets.BootAlert');
}
 ?>