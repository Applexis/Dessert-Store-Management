<div class="view">
	<?php 
	$this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$data,
	'attributes'=>array(
		'id',
		'name',
		'intro',
		array(
			'name'  =>'pic',
			'type'  => 'image',
			'value' =>Yii::app()->baseUrl.'/uploads/product_img/'.$data->pic, $data->name,
		),
	),
	)); 

	echo CHtml::link('创建计划', array('productmanage/create', 'product_id'=>$data->id), array('class'=>'btn btn-primary'));
	?>


</div>