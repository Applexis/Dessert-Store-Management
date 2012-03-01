<?php
$this->breadcrumbs=array(
	'会员卡',
);

// Yii::log(print_r($dataProvider->data[0]->activated,true));
if ($dataProvider->totalItemCount == 0)
	$this->menu[] = array('label'=>'创建会员卡','url'=>array('create'));
else if ($dataProvider->data[0]->activated == 0)
	$this->menu[] = array('label'=>'激活会员卡','url'=>array('activate'));
else 
	$this->menu[] = array('label'=>'充值', 'url'=>array('update'));

?>

<h1>会员卡</h1>
<?php 
	$this->widget('ext.bootstrap.widgets.BootAlert');
 ?>
<?php $this->widget('ext.bootstrap.widgets.BootListView',array(
	'dataProvider' =>$dataProvider,
	'itemView'     =>'_view',
	'emptyText'    =>'您还没有会员卡，请先创建一张',
	'summaryText'  =>'',
)); ?>
