<?php

/*Yii::import('application.models._base.BaseStudent');

class Student extends BaseStudent
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}*/

class Student extends RelActiveRecord {
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'student';
	}

	public static function getPresentAttribute() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, age', 'required'),
			array('age', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('id, name, age', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'scards' => array(self::HAS_ONE, 'Scard', 'student_id'),
		);
	}

	public function attributeLabels() {
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'age' => 'Age',
			'scards' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('age', $this->age);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

}