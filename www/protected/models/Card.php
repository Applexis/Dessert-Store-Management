<?php

/**
 * This is the model class for table "card".
 *
 * The followings are the available columns in table 'card':
 * @property integer $id
 * @property integer $activated
 * @property string $activate_date
 * @property integer $money
 * @property integer $user_id
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property TblUsers $user
 */
class Card extends CActiveRecord
{


	public $levelTxt = array(
		0 => '普通会员',
		1 => '银卡会员',
		2 => '金卡会员',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Card the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'card';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activated, activate_date, money, user_id', 'required'),
			array('activated, money, user_id, level', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, activated, activate_date, money, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'relUser' => array(self::BELONGS_TO, 'User', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'activated' => '是否激活',
			'activate_date' => '激活日期',
			'money' => '余额',
			'user_id' => '用户名',
			'level' => '级别',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('activated',$this->activated);
		$criteria->compare('activate_date',$this->activate_date,true);
		$criteria->compare('money',$this->money);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function scopes() {
		return array(
			'mycard' => array(
				'condition' => 'user_id='.Yii::app()->user->id,
			),
		);
	}
}