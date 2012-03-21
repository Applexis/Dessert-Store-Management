<?php

/**
 * This is the model base class for the table "scard".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Scard".
 *
 * Columns in table "scard" available as properties of the model,
 * followed by relations of table "scard" available as properties of the model.
 *
 * @property integer $id
 * @property integer $student_id
 * @property string $other
 *
 * @property Student $student
 */
abstract class BaseScard extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'scard';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Scard|Scards', $n);
	}

	public static function representingColumn() {
		return 'other';
	}

	public function rules() {
		return array(
			array('student_id, other', 'required'),
			array('student_id', 'numerical', 'integerOnly'=>true),
			array('other', 'length', 'max'=>100),
			array('id, student_id, other', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'student_id' => null,
			'other' => Yii::t('app', 'Other'),
			'student' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('student_id', $this->student_id);
		$criteria->compare('other', $this->other, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}