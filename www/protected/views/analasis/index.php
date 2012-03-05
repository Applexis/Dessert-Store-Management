<?php
$this->breadcrumbs=array(
	'分析',
);?>
<h1>查看数据分析</h1>
<br>
<p>
	<?php 
		echo CHtml::link('会员卡情况分析',array('card'), array('class'=>'btn btn-primary'));
		echo ' ';
		echo CHtml::link('销售情况',array('/sale/admin'), array('class'=>'btn btn-primary'));
		echo ' ';
		echo CHtml::link('预约情况',array('/reservation/admin'), array('class'=>'btn btn-primary'));
		echo ' ';
		echo CHtml::link('热卖产品',array('popular'), array('class'=>'btn btn-primary'));
		echo ' ';
		echo CHtml::link('销售趋势',array('salepredict'), array('class'=>'btn btn-primary'));
		echo ' ';

	 ?>
</p>
