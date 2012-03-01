<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property string $intro
 * @property string $pic
 *
 * The followings are the available model relations:
 * @property ProductManage[] $productManages
 * @property Reservation[] $reservations
 * @property Sale[] $sales
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, intro', 'required'),
			array('name', 'length', 'max'=>100),
			array('intro', 'length', 'max'=>200),
			array('pic', 'file', 'types'=>'jpg,png,gif', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, intro', 'safe', 'on'=>'search'),
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
			'productManages' => array(self::HAS_MANY, 'ProductManage', 'product_id'),
			'reservations' => array(self::HAS_MANY, 'Reservation', 'product_id'),
			'sales' => array(self::HAS_MANY, 'Sale', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '产品名称',
			'intro' => '产品介绍',
			'pic' => '产品图片',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('intro',$this->intro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	protected function beforeSave() {
		$picture = CUploadedFile::getInstance($this, 'pic');
		if (is_object($picture) && get_class($picture)==='CUploadedFile') {
			$new_filename = md5(time().$picture->name) . '_rev.' . $picture->extensionName;
			Yii::log($new_filename);
			$this->pic = $new_filename;
			$this->save_image($picture, $new_filename);
		}
		return parent::beforeSave();
	}

	/**
	 * save_image
	 * @param  CUploadedFile $pic      picture_file
	 * @param  String        $filename [description]
	 * @return null
	 */
	private function save_image(CUploadedFile $pic, $filename) {
		$store_path = Yii::app()->basePath . '/../uploads/product_img/' . $filename;
		$pic->saveAs($store_path);
		$revise_image = Yii::app()->image->load($store_path);
		$revise_image->resize(200,200);
		$revise_image->save($store_path);
	}


}