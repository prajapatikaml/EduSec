<?php

/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "employee_experience".
 * @package EduSec.models
 */

class EmployeeExperience extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeExperience the static model class
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
		return 'employee_experience';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('employee_experience_organization_name,employee_experience_designation, employee_experience_from, employee_experience_to', 'required', 'message'=>''),
			array('employee_experience_organization_name', 'length', 'max'=>50),
			array('employee_experience_designation', 'length', 'max'=>25),
			array('employee_experience_organization_name, employee_experience_designation','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z.& ]+([-][a-zA-Z ]+)*$/','message'=>''), 
			 
			array('employee_experience_to','validdate','message'=>'To Date Must be Greater Than From Date'),
			array('employee_experience_from','checkdate_2','message'=>'From Date Must be Less Than Current Date'),
			array('employee_experience_to','checkdate_1','message'=>'To Date Must be Less Than Current Date'),
			array('employee_experience_to','comparedate','message'=>'Select Unique From Date and End Date'),
			array('employee_experience_id, employee_experience_organization_name, employee_experience_designation, employee_experience_from, employee_experience_to', 'safe', 'on'=>'search'),
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

	/*
	 * @return boolean value, To date must be less then current data.
	 */
	public function checkdate_1($attribute,$params)
	{
		$my_date = date("d-m-Y");
		$to_date = strtotime($this->employee_experience_to);
		
		
		if(strtotime($this->employee_experience_to) > strtotime($my_date))
		{
			$this->addError('employee_experience_to','To Date Must be Less Than Current Date'); 
			return false;
		}	
		else
			return true;
	}

	/*
	 * @return boolean value, From date must be less then to date.
	 */

	public function checkdate_2($attribute,$params)
	{
		$my_date = date("d-m-Y");
		$from_date = strtotime($this->employee_experience_from);
		
		if($from_date > strtotime($my_date))
		{
			$this->addError('employee_experience_from','From Date Must be Less Than Current Date');
			return false;
		}
		else
			return true;	
	}

	public function validdate($attribute,$params)
	{
		
		if( strtotime($this->employee_experience_to) < strtotime($this->employee_experience_from))
		{
				$this->addError('employee_experience_to','To Date Must be Greater Than From Date');
		}
	}

	/*
	 * Return an error if From and end date are same.
	 */

	public function comparedate($attribute,$params)
	{
		
		if(strtotime($this->employee_experience_to) == strtotime($this->employee_experience_from))
		{
				$this->addError('employee_experience_to','Select Unique From Date and End Date');
		}
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_experience_id' => 'Employee Experience',
			'employee_experience_organization_name' => 'Organization Name',
			'employee_experience_designation' => 'Designation',
			'employee_experience_from' => 'Date From',
			'employee_experience_to' => 'Date To',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('employee_experience_id',$this->employee_experience_id);
		$criteria->compare('employee_experience_organization_name',$this->employee_experience_organization_name,true);
		$criteria->compare('employee_experience_designation',$this->employee_experience_designation,true);
		$criteria->compare('employee_experience_from',$this->employee_experience_from,true);
		$criteria->compare('employee_experience_to',$this->employee_experience_to,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
