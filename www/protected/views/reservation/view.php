<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'今日产品','url'=>array('/productmanage/index')),
	array('label'=>'返回主页','url'=>array('/index.php')),
);
$this->widget('ext.bootstrap.widgets.BootAlert');

?>

<h1>查看预订订单</h1>

<?php 
$product_manage = ProductManage::model()->with('product')->findByPk($model->product_id);
$this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'  =>'user_id',
			'value' =>User::model()->findByPk($model->user_id)->username,
			'label' =>'用户',
		),
		array(
			'name'  =>'product_id',
			'label' =>'产品名称',
			'value' =>$product_manage->product->name,
		),
		array(
			'label' =>'单价',
			'value' =>$product_manage->price.' 元',
		),
		array(
			'label' =>'购买数量',
			'value' =>$model->amount,
		),
		array(
			'label' =>'总价格',
			'value' =>$product_manage->price * $model->amount.' 元',
		),
		'reserve_time',
		'mk_reserve_time',
	),
)); ?>
