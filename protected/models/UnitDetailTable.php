<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "unit_detail_table".
 * @package EduSec.models
 */

class UnitDetailTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnitDetailTable the static model class
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
		return 'unit_detail_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('unit_detail_unit_master_id, unit_detail_course_id, unit_detail_title, unit_detail_desc, unit_detail_created_by, unit_lec_date, unit_detail_creation_date', 'required', 'message'=>''),
			array('unit_detail_unit_master_id, unit_detail_course_id, unit_detail_created_by', 'numerical', 'integerOnly'=>true),
			array('unit_detail_title', 'length', 'max'=>300),
			array('unit_detail_id, unit_detail_unit_master_id, unit_detail_course_id, unit_detail_title, unit_detail_desc, unit_detail_created_by, unit_detail_creation_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'unit_detail_id' => 'Unit Detail',
			'unit_detail_unit_master_id' => 'Unit Detail Unit Master',
			'unit_detail_course_id' => 'Unit Detail Course',
			'unit_detail_title' => 'Lesson Title',
			'unit_detail_desc' => 'Lesson Description',
			'unit_detail_created_by' => 'Created By',
			'unit_detail_creation_date' => 'Unit Detail Creation Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('unit_detail_id',$this->unit_detail_id);
		$criteria->compare('unit_detail_unit_master_id',$this->unit_detail_unit_master_id);
		$criteria->compare('unit_detail_course_id',$this->unit_detail_course_id);
		$criteria->compare('unit_detail_title',$this->unit_detail_title,true);
		$criteria->compare('unit_detail_desc',$this->unit_detail_desc,true);
		$criteria->compare('unit_detail_created_by',$this->unit_detail_created_by);
		$criteria->compare('unit_detail_creation_date',$this->unit_detail_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	* Return coursewise units 
	*/
	public function unitwisesearch()
	{

		$criteria=new CDbCriteria;
		$criteria->condition = 'unit_detail_course_id = :course_id';
	        $criteria->params = array(':course_id' => $_REQUEST['id']);

		$criteria->compare('unit_detail_id',$this->unit_detail_id);
		$criteria->compare('unit_detail_unit_master_id',$this->unit_detail_unit_master_id);
		$criteria->compare('unit_detail_course_id',$this->unit_detail_course_id);
		$criteria->compare('unit_detail_title',$this->unit_detail_title,true);
		$criteria->compare('unit_detail_desc',$this->unit_detail_desc,true);
		$criteria->compare('unit_detail_created_by',$this->unit_detail_created_by);
		$criteria->compare('unit_detail_creation_date',$this->unit_detail_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
