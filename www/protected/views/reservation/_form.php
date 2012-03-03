<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'reservation-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),

)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<label class="control-label" for="Reservation_amount">产品名称</label>
		<div class="controls"><h4><?php echo $product->product->name; ?></h4></div>
	</div>

	<div class="control-group">
		<label class="control-label required" for="Reservation_amount">单价</label>
		<div class="controls"><h4><?php echo $product->price.' 元'; ?></h4></div>
	</div>

	<div class="control-group">
		<label class="control-label required" for="Reservation_reserve_time">预定时间 <span class="required">*</span></label>
		<div class="controls">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'name'=>'Reservation[reserve_time]',
			    // additional javascript options for the date picker plugin
			    'options'=>array(
			        //'showAnim'=>'fold',
			    	'minDate' => 'new Date()',
			    	'dateFormat'=>'yy-mm-dd',
			    ),
			    'htmlOptions'=>array(
			        'class'=>'span3'
			    ),
			)); ?>
		</div>
	</div>

	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span3')); ?>

	<div class="actions">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary offset2')); ?>
	</div>
<?php $this->endWidget(); ?>
