<div class="view">

<?php 
	$product_manage = ProductManage::model()->with('product')->findByPk($data->product_id);
	$this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$data,
	'attributes'=>array(
		array(
			'name'  =>'user_id',
			'value' =>User::model()->findByPk($data->user_id)->username,
			'label' =>'用户',
		),
		array(
			'name'=>'product_id',
			'label'=>'产品名称',
			'value'=>$product_manage->product->name,
		),
		array(
			'label'=>'单价',
			'value'=>$product_manage->price.' 元',
		),
		array(
			'label'=>'购买数量',
			'value'=>$data->amount,
		),
		array(
			'label'=>'总价格',
			'value'=>$product_manage->price * $data->amount.' 元',
		),
		'buy_time',
	),
)); 
 ?>

</div>