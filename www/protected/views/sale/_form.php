<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'sale-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<label class="control-label" for="Sale_amount">产品名称</label>
		<div class="controls"><h4><?php echo $product->product->name; ?></h4></div>
	</div>

	<div class="control-group">
		<label class="control-label required" for="Sale_amount">单价</label>
		<div class="controls"><h4><?php echo $product->price.' 元'; ?></h4></div>
	</div>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary offset2')); ?>
	</div>

<?php $this->endWidget(); ?>
