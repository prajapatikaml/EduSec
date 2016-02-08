<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_academic_record_trans".
 * @package EduSec.models
 */

class StudentAcademicRecordTrans extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentAcademicRecordTrans the static model class
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
		return 'student_academic_record_trans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_academic_record_trans_stud_id, student_academic_record_trans_qualification_id, student_academic_record_trans_eduboard_id, student_academic_record_trans_record_trans_year_id, theory_mark_obtained, theory_mark_max, theory_percentage', 'required','message'=>""),
			array('student_academic_record_trans_stud_id, student_academic_record_trans_qualification_id, student_academic_record_trans_eduboard_id, student_academic_record_trans_record_trans_year_id, theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max', 'numerical', 'integerOnly'=>true,'message'=>""),
			array('theory_percentage, practical_percentage', 'numerical'),

			array('theory_mark_max','checkMarks','message'=>'Obtained Marks Can Not Be Greater Than Max Marks'),
			array('theory_percentage','checkpercentage','message'=>'Percentage Always Less Than 100'),
			array('theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max','length','max'=>4),

			array('theory_mark_obtained, theory_mark_max, practical_mark_obtained, practical_mark_max','numerical',
   			 'integerOnly'=>true,
    			  'min'=>1,
   			 'max'=>3000,
   			 'tooSmall'=>'You must Enter at least 1.',
   			 'tooBig'=>'You cannot Enter more than 3000.'),
			array('practical_mark_obtained, practical_mark_max, practical_percentage','safe'),
			array('student_academic_record_trans_id, student_academic_record_trans_stud_id, student_academic_record_trans_qualification_id, student_academic_record_trans_eduboard_id, student_academic_record_trans_record_trans_year_id, theory_mark_obtained, theory_mark_max, theory_percentage, practical_mark_obtained, practical_mark_max, practical_percentage', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		'Rel_student_qualification' => array(self::BELONGS_TO, 'Qualification', 'student_academic_record_trans_qualification_id'),
		'Rel_student_eduboard' => array(self::BELONGS_TO, 'Eduboard', 'student_academic_record_trans_eduboard_id'),
		);
	}

	/**
	 * Generate error if obtain mark greater then max marks.
	 */
	public function checkMarks($attribute,$params)
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
	}

	/**
	 * Generate error if percentage is greate then 100%.
	 */
	public function checkpercentage($attribute,$params)
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
	}
	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_academic_record_trans_id' => 'Student Academic Record Trans',
			'student_academic_record_trans_stud_id' => 'Student Academic Record Trans Student',
			'student_academic_record_trans_qualification_id' => 'Course',
			'student_academic_record_trans_eduboard_id' => 'Eduboard',
			'student_academic_record_trans_record_trans_year_id' => 'Academic Year',
			'theory_mark_obtained' => 'Theory Mark Obtained',
			'theory_mark_max' => 'Theory Mark Max',
			'theory_percentage' => 'Theory Percentage',
			'practical_mark_obtained' => 'Practical Mark Obtained',
			'practical_mark_max' => 'Practical Mark Max',
			'practical_percentage' => 'Practical Percentage',
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

		$criteria->compare('student_academic_record_trans_id',$this->student_academic_record_trans_id);
		$criteria->compare('student_academic_record_trans_stud_id',$this->student_academic_record_trans_stud_id);
		$criteria->compare('student_academic_record_trans_qualification_id',$this->student_academic_record_trans_qualification_id);
		$criteria->compare('student_academic_record_trans_eduboard_id',$this->student_academic_record_trans_eduboard_id);
		$criteria->compare('student_academic_record_trans_record_trans_year_id',$this->student_academic_record_trans_record_trans_year_id);
		$criteria->compare('theory_mark_obtained',$this->theory_mark_obtained);
		$criteria->compare('theory_mark_max',$this->theory_mark_max);
		$criteria->compare('theory_percentage',$this->theory_percentage);
		$criteria->compare('practical_mark_obtained',$this->practical_mark_obtained);
		$criteria->compare('practical_mark_max',$this->practical_mark_max);
		$criteria->compare('practical_percentage',$this->practical_percentage);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Return academic information for select user.
	 */
	public function mysearch()
	{
		$criteria=new CDbCriteria;
		if(Yii::app()->user->getState('stud_id'))
		{
		$criteria->condition = 'student_academic_record_trans_stud_id = :student_transaction_student_id';
		$criteria->params = array(':student_transaction_student_id' => Yii::app()->user->getState('stud_id'));
		}
		else
		{
		$criteria->condition = 'student_academic_record_trans_stud_id = :student_transaction_student_id';
		$criteria->params = array(':student_transaction_student_id' => $_REQUEST['id']);
		}
		$criteria->compare('student_academic_record_trans_id',$this->student_academic_record_trans_id);
		$criteria->compare('student_academic_record_trans_stud_id',$this->student_academic_record_trans_stud_id);
		$criteria->compare('student_academic_record_trans_qualification_id',$this->student_academic_record_trans_qualification_id);
		$criteria->compare('student_academic_record_trans_eduboard_id',$this->student_academic_record_trans_eduboard_id);
		$criteria->compare('student_academic_record_trans_record_trans_year_id',$this->student_academic_record_trans_record_trans_year_id);
		$criteria->compare('theory_mark_obtained',$this->theory_mark_obtained);
		$criteria->compare('theory_mark_max',$this->theory_mark_max);
		$criteria->compare('theory_percentage',$this->theory_percentage);
		$criteria->compare('practical_mark_obtained',$this->practical_mark_obtained);
		$criteria->compare('practical_mark_max',$this->practical_mark_max);
		$criteria->compare('practical_percentage',$this->practical_percentage);

		
		$student_qualification = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		$_SESSION['student_qualification']=$student_qualification;
		return $student_qualification;
	}		
}
