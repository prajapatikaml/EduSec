<?php

/**
 * This is the model class for table "holidays".
 *
 * The followings are the available columns in table 'holidays':
 * @property integer $id
 * @property string $holiday_name
 * @property string $date
 * @property integer $created_by
 * @property string $creation_date
 */
class Holidays extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Holidays the static model class
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
		return 'holidays';
	}
	public function defaultScope() 
	{
       		return array(
           		'order' => 'holiday_name'
	        );
  	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('holiday_name, date, created_by, creation_date', 'required','message'=>''),
			array('created_by', 'numerical', 'integerOnly'=>true),
			array('holiday_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, holiday_name, date, created_by, creation_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'holiday_name' => 'Holiday Name',
			'date' => 'Date',
			'created_by' => 'Created By',
			'creation_date' => 'Creation Date',
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
		$criteria->compare('holiday_name',$this->holiday_name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('creation_date',$this->creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
