<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "course_unit_table".
 * @package EduSec.models
 */

class CourseUnitTable extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseUnitTable the static model class
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
		return 'course_unit_table';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('course_unit_master_id, course_unit_name, course_unit_hours, course_unit_created_by, course_unit_creation_date', 'required', 'message'=>''),
			array('course_unit_master_id, course_unit_level, course_unit_credit, course_unit_hours, course_unit_created_by', 'numerical', 'integerOnly'=>true),
			array('course_unit_ref_code', 'length', 'max'=>100),
			array('course_unit_name', 'length', 'max'=>200),
			array('course_unit_id, course_unit_master_id, course_unit_ref_code, course_unit_name, course_unit_level, course_unit_credit, course_unit_hours, course_unit_created_by, course_unit_creation_date', 'safe', 'on'=>'search'),
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
		  'relCourse'=>array(self::BELONGS_TO, 'CourseMaster', 'course_unit_master_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_unit_id' => 'Course Unit',
			'course_unit_master_id' => 'Course Unit Master',
			'course_unit_ref_code' => 'Unit Ref Code',
			'course_unit_name' => 'Unit Name',
			'course_unit_level' => 'Unit Level',
			'course_unit_credit' => 'Unit Credit',
			'course_unit_hours' => 'Unit Hours',
			'course_unit_created_by' => 'Course Unit Created By',
			'course_unit_creation_date' => 'Course Unit Creation Date',
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

		$criteria->compare('course_unit_id',$this->course_unit_id);
		$criteria->compare('course_unit_master_id',$this->course_unit_master_id);
		$criteria->compare('course_unit_ref_code',$this->course_unit_ref_code,true);
		$criteria->compare('course_unit_name',$this->course_unit_name,true);
		$criteria->compare('course_unit_level',$this->course_unit_level);
		$criteria->compare('course_unit_credit',$this->course_unit_credit);
		$criteria->compare('course_unit_hours',$this->course_unit_hours);
		$criteria->compare('course_unit_created_by',$this->course_unit_created_by);
		$criteria->compare('course_unit_creation_date',$this->course_unit_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CActiveDataProvider data based on course.
	 */
	public function coursewisesearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'course_unit_master_id = :course_id';
	        $criteria->params = array(':course_id' => $_REQUEST['id']);


		$criteria->compare('course_unit_id',$this->course_unit_id);
		$criteria->compare('course_unit_master_id',$this->course_unit_master_id);
		$criteria->compare('course_unit_ref_code',$this->course_unit_ref_code,true);
		$criteria->compare('course_unit_name',$this->course_unit_name,true);
		$criteria->compare('course_unit_level',$this->course_unit_level);
		$criteria->compare('course_unit_credit',$this->course_unit_credit);
		$criteria->compare('course_unit_hours',$this->course_unit_hours);
		$criteria->compare('course_unit_created_by',$this->course_unit_created_by);
		$criteria->compare('course_unit_creation_date',$this->course_unit_creation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
