<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'product_id',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'date',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span3')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span3')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
