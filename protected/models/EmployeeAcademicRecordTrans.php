<?php

/**
 * This is the model class for table "employee_academic_record_trans".
 *
 * The followings are the available columns in table 'employee_academic_record_trans':
 * @property integer $employee_academic_record_trans_id
 * @property integer $employee_academic_record_trans_user_id
 * @property integer $employee_academic_record_trans_qualification_id
 * @property integer $employee_academic_record_trans_eduboard_id
 * @property integer $employee_academic_record_trans_year_id
 * @property integer $theory_mark_obtained
 * @property integer $theory_mark_max
 * @property double $theory_percentage
 * @property integer $practical_mark_obtained
 * @property integer $practical_mark_max
 * @property double $practical_percentage
 * @property integer $employee_academic_record_trans_oraganization_id
 */
class EmployeeAcademicRecordTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmployeeAcademicRecordTrans the static model class
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
		return 'employee_academic_record_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_academic_record_trans_user_id, employee_academic_record_trans_qualification_id, employee_academic_record_trans_eduboard_id, employee_academic_record_trans_year_id, theory_mark_obtained, theory_mark_max, theory_percentage', 'required','message'=>""),
			array('employee_academic_record_trans_user_id, employee_academic_record_trans_qualification_id, employee_academic_record_trans_eduboard_id, employee_academic_record_trans_year_id, theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max,	employee_academic_record_trans_oraganization_id', 'numerical', 'integerOnly'=>true,'message'=>""),
			array('theory_percentage, practical_percentage', 'numerical'),
			array('theory_mark_obtained','compare','compareAttribute'=>'theory_mark_max','operator'=>'>','message'=>'Theory Marks Obtained must be less than max marks'),
			array('practical_mark_obtained','compare','compareAttribute'=>'practical_mark_max','operator'=>'>','message'=>'Practical Marks Obtained must be less than max marks'),
			//array('theory_mark_max','checkMarks','message'=>'Obtained Marks Can Not Be Greater Than Max Marks'),
			array('theory_percentage','checkpercentage','message'=>'Percentage Always Less Than 100'),
			array('theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),

			//array('theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max','length','max'=>4),

			array('theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max','numerical',
   			 'integerOnly'=>true,
    			  'min'=>1,
   			 'max'=>3000,
   			 'tooSmall'=>'You must Enter at least 1.',
   			 'tooBig'=>'You cannot Enter more than 3000.'),

			array('practical_mark_obtained, practical_mark_max, practical_percentage','safe'),
			/*array('employee_academic_record_trans_qualification_id','unique',
				'criteria'=>array(
				'condition'=>'employee_academic_record_trans_user_id=:employee_academic_record_trans_user_id',
		'params'=>array(':employee_academic_record_trans_user_id'=>$_REQUEST['id']),
				),'message'=>'unique',
			),*/
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_academic_record_trans_id, employee_academic_record_trans_user_id, employee_academic_record_trans_qualification_id, employee_academic_record_trans_eduboard_id, employee_academic_record_trans_year_id, theory_mark_obtained, theory_mark_max,	employee_academic_record_trans_oraganization_id,theory_percentage, practical_mark_obtained, practical_mark_max, practical_percentage', 'safe', 'on'=>'search'),
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

		'Rel_employee_qualification' => array(self::BELONGS_TO, 'Qualification', 'employee_academic_record_trans_qualification_id'),
		'Rel_employee_eduboard' => array(self::BELONGS_TO, 'Eduboard', 'employee_academic_record_trans_eduboard_id'),
		'Rel_employee_year' => array(self::BELONGS_TO, 'Year', 'employee_academic_record_trans_year_id'),


		);
	}
	/*public function checkMarks($attribute,$params)
	{
	    	if(($this->theory_mark_obtained > $this->theory_mark_max) || ($this->practical_mark_obtained > $this->practical_mark_max))
		{
			if(($this->theory_mark_obtained > $this->theory_mark_max) && ($this->practical_mark_obtained > $this->practical_mark_max)) 
			{
				$this->addError('theory_mark_obtained','Obtained Marks Always Less Than Max Mark');
				$this->addError('practical_mark_obtained','Obtained Marks Always Less Than Max Mark');
			}
			else if($this->theory_mark_obtained > $this->theory_mark_max)
				$this->addError('theory_mark_obtained','Obtained Marks Always Less Than Max Mark');
			else
				$this->addError('practical_mark_obtained','Obtained Marks Always Less Than Max Mark');
		}	
	}*/
/*	public function checkpercentage($attribute,$params)
	{
		if(($this->theory_percentage > 100) || ($this->practical_percentage > 100))
		{
			if(($this->theory_percentage > 100) && ($this->practical_percentage > 100)) 
			{
				$this->addError('theory_percentage','Percentage Always Less Than 100');
				$this->addError('practical_percentage','Percentage Always Less Than 100');
			}
			else if($this->theory_percentage > 100)
				$this->addError('theory_percentage','Percentage Always Less Than 100');
			else
				$this->addError('practical_percentage','Percentage Always Less Than 100');
		}	
	}*/

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_academic_record_trans_id' => 'Employee Academic Record Trans',
			'employee_academic_record_trans_user_id' => 'Employee Academic Record Trans User',
			'employee_academic_record_trans_qualification_id' => 'Course',
			'employee_academic_record_trans_eduboard_id' => 'Eduboard',
			'employee_academic_record_trans_year_id' => 'Year',
			'theory_mark_obtained' => 'Theory Mark Obtained',
			'theory_mark_max' => 'Theory Mark Max',
			'theory_percentage' => 'Theory Percentage',
			'practical_mark_obtained' => 'Practical Mark Obtained',
			'practical_mark_max' => 'Practical Mark Max',
			'practical_percentage' => 'Practical Percentage',
			'employee_academic_record_trans_oraganization_id'=>'Organization',
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

		$criteria->compare('employee_academic_record_trans_id',$this->employee_academic_record_trans_id);
		$criteria->compare('employee_academic_record_trans_user_id',$this->employee_academic_record_trans_user_id);
		$criteria->compare('employee_academic_record_trans_qualification_id',$this->employee_academic_record_trans_qualification_id);
		$criteria->compare('employee_academic_record_trans_eduboard_id',$this->employee_academic_record_trans_eduboard_id);
		$criteria->compare('employee_academic_record_trans_year_id',$this->employee_academic_record_trans_year_id);
		$criteria->compare('theory_mark_obtained',$this->theory_mark_obtained);
		$criteria->compare('theory_mark_max',$this->theory_mark_max);
		$criteria->compare('theory_percentage',$this->theory_percentage);
		$criteria->compare('practical_mark_obtained',$this->practical_mark_obtained);
		$criteria->compare('practical_mark_max',$this->practical_mark_max);
		$criteria->compare('practical_percentage',$this->practical_percentage);

		$criteria->compare('employee_academic_record_trans_oraganization_id',$this->employee_academic_record_trans_oraganization_id);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function mysearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition = 'employee_academic_record_trans_user_id = :employee_transaction_employee_id';
		$criteria->params = array(':employee_transaction_employee_id' => $_REQUEST['id']);
		
		$criteria->compare('employee_academic_record_trans_id',$this->employee_academic_record_trans_id);
		$criteria->compare('employee_academic_record_trans_user_id',$this->employee_academic_record_trans_user_id);
		$criteria->compare('employee_academic_record_trans_qualification_id',$this->employee_academic_record_trans_qualification_id);
		$criteria->compare('employee_academic_record_trans_eduboard_id',$this->employee_academic_record_trans_eduboard_id);
		$criteria->compare('employee_academic_record_trans_year_id',$this->employee_academic_record_trans_year_id);
		$criteria->compare('theory_mark_obtained',$this->theory_mark_obtained);
		$criteria->compare('theory_mark_max',$this->theory_mark_max);
		$criteria->compare('theory_percentage',$this->theory_percentage);
		$criteria->compare('practical_mark_obtained',$this->practical_mark_obtained);
		$criteria->compare('practical_mark_max',$this->practical_mark_max);
		$criteria->compare('practical_percentage',$this->practical_percentage);
		
		$criteria->compare('employee_academic_record_trans_oraganization_id',$this->employee_academic_record_trans_oraganization_id);

		$data = new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
	));
		$_SESSION['emp_qual']=$data;
		return $data;
	}

	/*public function beforesave()
	{
		if(($this->theory_mark_obtained > $this->theory_mark_max) || ($this->practical_mark_obtained > $this->practical_mark_max))
		{
			if(($this->theory_mark_obtained > $this->theory_mark_max) && ($this->practical_mark_obtained > $this->practical_mark_max)) 
			{
				$this->addError('theory_mark_obtained','obtained Marks always Less than Max Mark');
				$this->addError('practical_mark_obtained','obtained Marks always Less than Max Mark');
			}
			else if($this->theory_mark_obtained > $this->theory_mark_max)
				$this->addError('theory_mark_obtained','obtained Marks always Less than Max Mark');
			else
				$this->addError('practical_mark_obtained','obtained Marks always Less than Max Mark');
			return false;
		
		}
		else
		{
			return true;
		}	
		

	}*/

}
