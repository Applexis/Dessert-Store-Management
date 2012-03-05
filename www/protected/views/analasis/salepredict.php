<?php
$this->breadcrumbs=array(
	'Analasis'=>array('/analasis'),
	'Salepredict',
);?>
<h1>销量预测</h1>


<h2>销量上升最快的商品：</h2>

<?php $this->widget('ext.bootstrap.widgets.BootAlert'); ?>

<?php if (isset($model)) {
	$this->widget('ext.bootstrap.widgets.BootDetailView',array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'name',
			'intro',
			array(
				'name'  =>'pic',
				'type'  => 'image',
				'value' =>Yii::app()->baseUrl.'/uploads/product_img/'.$model->pic, $model->name,
			),
		),
	)); 
} ?>