<?php
$this->breadcrumbs=array(
	'Analasis'=>array('/analasis'),
	'Popular',
);?>
<h1>热卖产品</h1>

<?php $form=$this->beginWidget('ext.bootstrap.widgets.BootActiveForm',array(
	'id'=>'popular-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="control-group">
		<div class="controls">
			<select name="TestForm[dropdown]" id="TestForm_dropdown">
				<option value="0">本月热卖产品</option>
				<option value="1">本周热卖产品</option>
				<option value="2">今日热卖</option>
			</select>
		</div>
	</div>

	<div class="actions">
		<?php echo CHtml::submitButton('查看', array('class'=>'btn primary')); ?>
	</div>

<?php $this->endWidget(); ?>
<br>

<?php 
	$this->widget('ext.bootstrap.widgets.BootAlert');
	if (isset($model)) {
 
		$this->widget('ext.bootstrap.widgets.BootDetailView',array(
			'data'=>$model,
			'attributes'=>array(
				'id',
				'name',
				'intro',
				array(
					'name'  =>'pic',
					'type'  => 'image',
					'value' =>Yii::app()->baseUrl.'/uploads/product_img/'.$model->pic, $model->name,
				),
			),
		)); 
	}
 ?>
