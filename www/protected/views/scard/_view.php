<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('student_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->student)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('other')); ?>:
	<?php echo GxHtml::encode($data->other); ?>
	<br />

</div>