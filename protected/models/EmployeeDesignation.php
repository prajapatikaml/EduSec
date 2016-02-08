<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "employee_designation".
 * @package EduSec.models
 */

class EmployeeDesignation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeDesignation the static model class
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
		return 'employee_designation';
	}

	/**
	 * @return default scope to get data from table in order to "employee_designation_name".
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'employee_designation_name'
	        );
  	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('employee_designation_name, employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'required','message'=>''),
			array('employee_designation_organization_id, employee_designation_level, employee_designation_created_by', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('employee_designation_name', 'length', 'max'=>60),
			array('employee_designation_name', 'unique'),
			array('employee_designation_name','CRegularExpressionValidator','pattern'=>'/^[a-zA-Z&. ]+([ -][a-zA-Z. ]+)*$/','message'=>''),
			array('employee_designation_level','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			array('employee_designation_id, employee_designation_name, employee_designation_organization_id, employee_designation_created_by, employee_designation_created_date,employee_designation_level', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_org' => array(self::BELONGS_TO, 'Organization','employee_designation_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','employee_designation_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_designation_id' => 'Employee Designation',
			'employee_designation_name' => 'Designation',
			'employee_designation_organization_id' => 'Employee Designation Organization',
			'employee_designation_created_by' => 'Created By',
			'employee_designation_created_date' => 'Creation Date',
			'employee_designation_level' => 'Designation Level',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('employee_designation_id',$this->employee_designation_id);
		$criteria->compare('employee_designation_name',$this->employee_designation_name,true);
		$criteria->compare('employee_designation_organization_id',$this->employee_designation_organization_id);
		$criteria->compare('employee_designation_level',$this->employee_designation_level,true);
		$criteria->compare('employee_designation_created_by',$this->employee_designation_created_by);
		$criteria->compare('employee_designation_created_date',$this->employee_designation_created_date,true);

		$designation_data = new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'employee_designation_id DESC',
				),
		));
		$_SESSION['designation_records']=$designation_data;
		return $designation_data;
	}

	/**
	 * @return array for create dropdown for Designation.
	*/
        public static function items()
        {
            if(isset(self::$_items))
                self::loadItems();
            return self::$_items;
        }

        public static function item($code)
        {
          if(!isset(self::$_items))
            self::loadItems();
            return isset(self::$_items[$code]) ? self::$_items[$code] : false;
        }

        private static function loadItems()
        {  
          self::$_items=array();
          $models=self::model()->findAll();
          foreach($models as $model)
             self::$_items[$model->employee_designation_id]=$model->employee_designation_name;
        }
}
