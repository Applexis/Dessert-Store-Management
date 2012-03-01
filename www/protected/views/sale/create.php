<?php
$this->breadcrumbs=array(
	'Sales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sale','url'=>array('index')),
	array('label'=>'Manage Sale','url'=>array('admin')),
);
?>

<h1>购买产品</h1>

<?php $check = ProductManage::model()->with('product')->findByPk($pmid);
if ($check != false){
	echo $this->renderPartial('_form', array('model'=>$model, 'product'=>$check));
}
else{
	Yii::app()->user->setFlash('error', '<strong>Oops!</strong> 这个商品不存在噢:(');
	$this->widget('bootstrap.widgets.BootAlert');
}
?>