<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "employee_docs_trans".
 * @package EduSec.models
 */

class EmployeeDocsTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeDocsTrans the static model class
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
		return 'employee_docs_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'required','message'=>''),
			array('employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'numerical', 'integerOnly'=>true),
			array('employee_docs_trans_id, employee_docs_trans_user_id, employee_docs_trans_emp_docs_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_Emp_doc' => array(self::BELONGS_TO, 'EmployeeDocs', 'employee_docs_trans_emp_docs_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_docs_trans_id' => 'Employee Docs Trans',
			'employee_docs_trans_user_id' => 'Employee Docs Trans User',
			'employee_docs_trans_emp_docs_id' => 'Employee Documents',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('employee_docs_trans_id',$this->employee_docs_trans_id);
		$criteria->compare('employee_docs_trans_user_id',$this->employee_docs_trans_user_id);
		$criteria->compare('employee_docs_trans_emp_docs_id',$this->employee_docs_trans_emp_docs_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Return particular user login user document details.
	 */
	public function mysearch()
	{
		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('emp_id') && !Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
		{
		$criteria->condition = 'employee_docs_trans_user_id = :employee_user_id';
	        $criteria->params = array(':employee_user_id' =>Yii::app()->user->getState('emp_id'));
		}
		else if(Yii::app()->user->getState('emp_id') && Yii::app()->user->checkAccess('EmployeeTransaction.UpdateEmployeeData'))
		{
		$criteria->condition = 'employee_docs_trans_user_id = :employee_user_id';
	        $criteria->params = array(':employee_user_id' => $_REQUEST['id']);
		}
		else
		{
		$criteria->condition = 'employee_docs_trans_user_id = :employee_user_id';
	        $criteria->params = array(':employee_user_id' => $_REQUEST['id']);
		}
		$criteria->compare('employee_docs_trans_id',$this->employee_docs_trans_id);
		$criteria->compare('employee_docs_trans_user_id',$this->employee_docs_trans_user_id);
		$criteria->compare('employee_docs_trans_emp_docs_id',$this->employee_docs_trans_emp_docs_id);

			$data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['emp_docs']=$data;
		return $data;
	}
}
