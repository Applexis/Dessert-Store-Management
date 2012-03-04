<?php
$this->breadcrumbs=array(
	'产品查看',
);

if (Yii::app()->user->name == 'admin')
	$this->menu=array(
		array('label'=>'Create ProductManage','url'=>array('create')),
		array('label'=>'Manage ProductManage','url'=>array('admin')),
	);
else 
	$this->menu = array(
		array('label'=>'我的购买', 'url'=>array('sale/index')),
		array('label'=>'我的预订', 'url'=>array('reservation/index')),
	)
?>

<h1><?php if (isset($title)) echo $title;
else echo "今日产品" ?></h1>
<div class="well">
<?php

	$this->widget('bootstrap.widgets.BootThumbs', array(
	    'dataProvider'=>$dataProvider,
	    'template'=>"{items}\n{pager}",
	    'itemView'=>'_thumb',
	    // Remove the existing tooltips and rebind the plugin after each ajax-call.
	    'afterAjaxUpdate'=>"js:function() {
	        jQuery('.tooltip').remove();
	        jQuery('a[rel=tooltip]').tooltip();
	    }",
	));

?>

</div>