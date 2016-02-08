<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "academic_term".
 * @package EduSec.models
 */

class AcademicTerm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AcademicTerm the static model class
	 */
	public $academic_term_period;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'academic_term';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('academic_term_name,academic_term_period_id,academic_term_start_date, academic_term_end_date', 'required','message'=>''),
			array('academic_term_period_id,academic_term_organization_id', 'numerical', 'integerOnly'=>true),
			array('academic_term_name', 'length', 'max'=>30),
			array('academic_term_name','unique'),
			array('academic_term_end_date','comparedate','message'=>'Select Unique From Date and End Date'),
			array('academic_term_id, academic_term_name, academic_term_period_id,academic_term_period,academic_term_organization_id,academic_term_start_date,academic_term_end_date, current_sem,academic_term_end_date', 'safe', 'on'=>'search'),
		);
			
	}
	 
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'academicTermPeriod' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'academic_term_period_id'),
			'Rel_org'=>array(self::BELONGS_TO,'Organization','academic_term_organization_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'academic_term_id' => 'Academic Term id',
			'academic_term_name' => 'Semester',
			'academic_term_period_id' => 'Academic Year',
			'academic_term_start_date'=>'Start Date',
			'academic_term_end_date'=>'End Date',
			'current_sem' => 'Current Semester',
			'academic_term_organization_id' => 'Organization',
		);
	}

	/**
	 * 
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('academicTermPeriod'); 
		$criteria->compare('academicTermPeriod.academic_term_period',$this->academic_term_period,true);  
		$criteria->compare('academic_term_id',$this->academic_term_id);
		$criteria->compare('academic_term_name',$this->academic_term_name,true);
		$criteria->compare('current_sem',$this->current_sem,true);
		
				
		$criteria->compare('academic_term_period_id',$this->academic_term_period_id);
		$criteria->compare('academic_term_organization_id',$this->academic_term_organization_id);		
		$criteria->compare('academic_term_start_date', $this->dbDateSearch($this->academic_term_start_date), true);
		$criteria->compare('academic_term_end_date',$this->dbDateSearch($this->academic_term_end_date),true);

		
		
		$academic_term_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
				    'academic_term_period'=>array(
					'asc'=>'academicTermPeriod.academic_term_period',
					'desc'=>'academicTermPeriod.academic_term_period DESC',
				    ),
				 '*',
				   
				),
			    ),
		));
		 $_SESSION['academic_term_records']=$academic_term_data;
		return $academic_term_data;
	}

	/**
	 * @return formated value of date for date search in Gridview
	*/
	private function dbDateSearch($value)
        {
                if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
                return date("Y-m-d",strtotime($matches[0]));
            else
                return $value;
        }
 
	/**
	 * @return boolean depenent on start date must be less then end date before save.
	*/
	public function beforeSave()
	{
		if($this->academic_term_start_date<$this->academic_term_end_date)
		    return true;
		else
		{
		    $this->addError("academic_term_start_date","Start Date must be less than End Date");       
		    return false;
		}
	       
	}

	/**
	 * Check and generate an error if start date same as end date.
	*/
	public function comparedate($attribute,$params)
	{
		
		if($this->academic_term_start_date == $this->academic_term_end_date)
		{
				$this->addError('academic_term_end_date','Select Unique Start Date and End Date');
		}
	}

	/**
	 * @return array for create dropdown for academic term.
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
		self::$_items[$model->academic_term_id]=$model->academic_term_name;
    	}
}
