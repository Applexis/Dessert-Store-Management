<div class="view">

	<?php $this->widget('ext.bootstrap.widgets.BootDetailView',array(
		'data'=>$data,
		'attributes'=>array(
			'id',
			array(
				'name'  =>'activated',
				'value' => $data->activated == 1 ? '已激活': '未激活',
			),
			array(
				'name'  =>'activate_data',
				'label' =>'激活日期',
				'value' => $data->activated == 1 ? $data->activate_date: '请激活',
			),
			array(
				'name' =>'money',
				'value'=>$data->money.' 元',
			),
		),
	));
	?>


</div>