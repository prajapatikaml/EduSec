<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "academic_term_period".
 * @package EduSec.models
 */

class AcademicTermPeriod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcademicTermPeriod the static model class
	 */

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return default scope to get data from table in order to "academic_term_period".
	 */
	public function defaultScope() 
	{
       		return array(
           		'order' => 'academic_term_period'
	        );
  	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academic_term_period';
	}

	/* * @return array validation rules for model attributes.

	 */
	public function rules()
	{

		return array(
			array('academic_term_period', 'required','message'=>''),
			array('academic_terms_period_organization_id, academic_terms_period_created_by', 'numerical', 'integerOnly'=>true),
			array('academic_terms_period_name', 'length', 'max'=>60),
			array('academic_term_period', 'unique','message'=>'Already Exist.'),

			array('academic_terms_period_id, academic_terms_period_name, academic_term_period, academic_terms_period_start_date, academic_terms_period_end_date, academic_terms_period_organization_id, academic_terms_period_created_by, academic_terms_period_creation_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_org'=>array(self::BELONGS_TO,'Organization','academic_terms_period_organization_id'),
			'Rel_user' => array(self::BELONGS_TO, 'User','academic_terms_period_created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'academic_terms_period_id' => 'Academic Terms Period',
			'academic_terms_period_name' => 'Period Name',
			'academic_term_period' => 'Academic Year',
			'academic_terms_period_start_date' => 'Period Start Date',
			'academic_terms_period_end_date' => 'Period End Date',
			'academic_terms_period_organization_id' => 'Period Organization',
			'academic_terms_period_created_by' => 'Created By',
			'academic_terms_period_creation_date' => 'Creation Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('academic_terms_period_id',$this->academic_terms_period_id);
		$criteria->compare('academic_terms_period_name',$this->academic_terms_period_name,true);
		$criteria->compare('academic_term_period',$this->academic_term_period,true);
		$criteria->compare('academic_terms_period_start_date',$this->academic_terms_period_start_date,true);
		$criteria->compare('academic_terms_period_end_date',$this->academic_terms_period_end_date,true);
		$criteria->compare('academic_terms_period_organization_id',$this->academic_terms_period_organization_id);
		$criteria->compare('academic_terms_period_created_by',$this->academic_terms_period_created_by);
		$criteria->compare('academic_terms_period_creation_date',$this->academic_terms_period_creation_date,true);

		$academic_term_period_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		 $_SESSION['academic_term_period_records']=$academic_term_period_data;
		return $academic_term_period_data;
	}
		
	/**
	 * @return array for create dropdown for academic term period.
	*/
	private static $_items=array();

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
	  	self::$_items[$model->academic_terms_period_id]=$model->academic_term_period;
    	}
	
}
