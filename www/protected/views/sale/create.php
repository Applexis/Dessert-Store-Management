<?php
$this->breadcrumbs=array(
	'账单'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'我的账单','url'=>array('index')),
	array('label'=>'所有产品','url'=>array('/productmanage/index')),
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