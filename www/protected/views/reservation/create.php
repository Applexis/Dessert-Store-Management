<?php
$this->breadcrumbs=array(
	'预订'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'浏览我的预订','url'=>array('index')),
	array('label'=>'返回主页','url'=>array('/index.php')),
);
?>

<h1>预订产品</h1>

<?php $check = ProductManage::model()->with('product')->findByPk($pmid);
if ($check != false){
	echo $this->renderPartial('_form', array('model'=>$model, 'product'=>$check));
}
else{
	Yii::app()->user->setFlash('error', '<strong>Oops!</strong> 这个商品不存在噢:(');
	$this->widget('bootstrap.widgets.BootAlert');
}
