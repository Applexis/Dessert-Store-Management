<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'card-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'well'),
	'type'=>'horizontal',
)); ?>
	

	<p class="help-block">带有<span class="required">*</span>符号的是必填项目</p>

	<label for="Card_money" class="required">充值金额： <span class="required">*</span></label>
	<input class="span5" name="Card[money]" id="Card_money" type="text" value="0">
	<br><br>
	<div class="actions">
		<?php echo CHtml::htmlButton($model->isNewRecord ? '<i class="icon-ok icon-white"></i> 充值' : '<i class="icon-ok icon-white"></i> 确认',array('class'=>'btn btn-primary', 'type'=>'submit')); ?>
		<?php echo CHtml::htmlButton('<i class="icon-ban-circle"></i> 重填', array('class'=>'btn', 'type'=>'reset')); ?>
	</div>

<?php $this->endWidget(); ?>
