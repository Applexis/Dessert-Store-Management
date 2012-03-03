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
