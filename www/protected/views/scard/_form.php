<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'scard-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'student_id'); ?>
		<?php echo $form->dropDownList($model, 'student_id', GxHtml::listDataEx(Student::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'student_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'other'); ?>
		<?php echo $form->textField($model, 'other', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'other'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->