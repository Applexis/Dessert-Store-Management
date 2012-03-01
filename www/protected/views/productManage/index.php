<?php
$this->breadcrumbs=array(
	'Product Manages',
);

$this->menu=array(
	array('label'=>'Create ProductManage','url'=>array('create')),
	array('label'=>'Manage ProductManage','url'=>array('admin')),
);
?>

<h1>今日产品</h1>
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