<div class="view">
	<?php 
	$this->widget('ext.bootstrap.widgets.BootDetailView',array(
	'data'=>$data,
	'attributes'=>array(
		array(
			'label' => '排名',
			'value' => $index + 1,
		),
		'name',
		'intro',
		array(
			'name'  =>'pic',
			'type'  => 'image',
			'value' =>Yii::app()->baseUrl.'/uploads/product_img/'.$data->pic, $data->name,
		),
	),
	)); 
	?>


</div>