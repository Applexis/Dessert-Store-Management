<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'product-manage-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<label class="control-label">产品名称 </label>
		<div class="controls"><span class="uneditable-input"><?php echo $pname; ?></span>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label required" for="ProductManage_date">起始日期 <span class="required">*</span></label>
		<div class="controls">	
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'name'=>'start_date',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				        //'showAnim'=>'fold',
				        'dateFormat'=>'yy-mm-dd',
				    ),
				    'htmlOptions'=>array(
				        'class'=>'span5',
				    ),
			        'value'=>date('Y-m-d'),
				));
			?>
		</div>
	</div>

		<div class="control-group">
		<label class="control-label required" for="ProductManage_date">结束日期 <span class="required">*</span></label>
		<div class="controls">	
			<?php 
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				    'name'=>'end_date',
				    // additional javascript options for the date picker plugin
				    'options'=>array(
				        //'showAnim'=>'fold',
				        'dateFormat'=>'yy-mm-dd',
				    ),
				    'htmlOptions'=>array(
				        'class'=>'span5',
				    ),
			        'value'=>date('Y-m-d'),
				));
			?>
		</div>
	</div>


	<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<div class="actions offset2">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
