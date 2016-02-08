<?php

/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "employee_experience_trans".
 * @package EduSec.models
 */

class EmployeeExperienceTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeExperienceTrans the static model class
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
		return 'employee_experience_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('employee_experience_trans_user_id, employee_experience_trans_emp_experience_id', 'required'),
			array('employee_experience_trans_user_id,employee_experience_trans_organization_id, employee_experience_trans_emp_experience_id', 'numerical', 'integerOnly'=>true),
			array('employee_experience_trans_id,employee_experience_trans_organization_id, employee_experience_trans_user_id, employee_experience_trans_emp_experience_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_Emp_exp' => array(self::BELONGS_TO, 'EmployeeExperience', 'employee_experience_trans_emp_experience_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_experience_trans_id' => 'Employee Experience Trans',
			'employee_experience_trans_user_id' => 'Employee Experience Trans User',
			'employee_experience_trans_emp_experience_id' => 'Employee Experience Trans Emp Experience',
			'employee_experience_trans_organization_id' => 'organization',
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
		$criteria->compare('employee_experience_trans_id',$this->employee_experience_trans_id);
		$criteria->compare('employee_experience_trans_user_id',$this->employee_experience_trans_user_id);
		$criteria->compare('employee_experience_trans_emp_experience_id',$this->employee_experience_trans_emp_experience_id);
		$criteria->compare('employee_experience_trans_organization_id',$this->employee_experience_trans_organization_id);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Return selected user experience details.
	 */
	public function mysearch()
	{
	// Warning: Please modify the following code to remove attributes that
	// should not be searched.

	$criteria=new CDbCriteria;
	if(Yii::app()->user->getState('emp_id') && !Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
	{
	$criteria->condition = 'employee_experience_trans_user_id = :employee_user_id';
	$criteria->params = array(':employee_user_id' =>Yii::app()->user->getState('emp_id'));
	}
	else if(Yii::app()->user->getState('emp_id') && Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
	{
	$criteria->condition = 'employee_experience_trans_user_id = :employee_user_id';
	$criteria->params = array(':employee_user_id' => $_REQUEST['id']);
	}
	else
	{
	$criteria->condition = 'employee_experience_trans_user_id = :employee_user_id';
	$criteria->params = array(':employee_user_id' => $_REQUEST['id']);
	}
	$criteria->compare('employee_experience_trans_id',$this->employee_experience_trans_id);
	$criteria->compare('employee_experience_trans_user_id',$this->employee_experience_trans_user_id);
	$criteria->compare('employee_experience_trans_emp_experience_id',$this->employee_experience_trans_emp_experience_id);

	$data = new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
	));
	$_SESSION['emp_exp']=$data;
	return $data;
	}
}
