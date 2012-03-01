<li style="width:160px">
	<div class="thumbnail">
    <a href="<?php echo CHtml::normalizeUrl(array('productmanage/view', 'id'=>$data->id)); ?>"  data-original-title="<?php echo $data->product->name; ?>" data-content="<?php echo $data->product->getAttributeLabel('intro').': '.str_replace('\n', '<br>', $data->product->intro); ?>" rel="popover">
        <img src="<?php echo Yii::app()->baseUrl.'/uploads/product_img/'.$data->product->pic; ?>" alt="">
    </a>

<!--     
 -->	
 	<br><br>
	 <div style="text-align:center">
	 	<p>
		<b><?php echo CHtml::encode($data->product->getAttributeLabel('name')); ?>:</b>
		<?php echo CHtml::encode($data->product->name); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
		<?php echo CHtml::encode($data->price).' 元'; ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
		<?php echo CHtml::encode($data->amount); ?>
		<br />
	</p>
		<?php 
			echo CHtml::link('购买', array('sale/create', 'id'=>$data->id), array('class'=>'btn btn-primary'));
			echo ' ';
			echo CHtml::link('预订', array('reservation/create', 'id'=>$data->id), array('class'=>'btn btn-info'));
		 ?>
	</div>
	</div>

</li>