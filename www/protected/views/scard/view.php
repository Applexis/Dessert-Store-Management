<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	RLHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . RLHtml::encode($model->label()) . ' ' . RLHtml::encode(RLHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		array(
			'name' => 'student',
			'type' => 'raw',
			'value' => $model->student !== null ? RLHtml::link(RLHtml::encode(RLHtml::valueEx($model->student)), array('student/view', 'id' => RelActiveRecord::getPkValue($model->student))) : null,
		),
		'other',
	),
)); ?>

