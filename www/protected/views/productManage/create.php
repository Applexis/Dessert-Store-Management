<?php
$this->breadcrumbs=array(
	'产品管理'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'列出产品计划','url'=>array('index')),
	array('label'=>'产品计划管理','url'=>array('admin')),
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