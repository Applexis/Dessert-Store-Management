<?php

/*Yii::import('application.models._base.BaseScard');

class Scard extends BaseScard
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}*/

class Scard extends RelActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'scard';
	}

	public static function label() {
		return 'SCard';
	}

	public static function getPresentAttribute() {
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