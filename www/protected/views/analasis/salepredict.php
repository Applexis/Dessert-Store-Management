<?php
$this->breadcrumbs=array(
	'Analasis'=>array('/analasis'),
	'Salepredict',
);?>
<h1>销量预测</h1>


<h2>销量上升最快的商品：</h2>

<?php $this->widget('ext.bootstrap.widgets.BootAlert'); ?>

<?php 
if (isset($dataProvider)) {
		$this->widget('ext.bootstrap.widgets.BootListView',array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); 
} ?>