<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "student_transaction".
 * @package EduSec.models
 */

class StudentTransaction extends CActiveRecord
{
	public $student_first_name, $academic_terms_period_name, $academic_term_name, $student_enroll_no,$student_last_name, $student_email_id_1, $student_mobile_no;

	public $status_name;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('student_academic_term_period_tran_id, student_transaction_student_photos_id, student_transaction_detain_student_flag,  student_transaction_course_id', 'required','message'=>''),
			
			array('student_transaction_user_id, student_transaction_student_id,  student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_academic_term_period_tran_id, student_academic_term_name_id,student_transaction_detain_student_flag', 'numerical', 'integerOnly'=>true,'message'=>''),

			array('student_transaction_id, student_transaction_user_id, student_transaction_student_id,  student_transaction_student_address_id, student_transaction_nationality_id, student_transaction_languages_known_id, student_transaction_student_photos_id, student_academic_term_period_tran_id, student_academic_term_name_id, student_first_name, academic_terms_period_name, academic_term_name, student_enroll_no, student_last_name, status_name, student_living_status, student_mobile_no, student_email_id_1, student_transaction_course_id', 'safe', 'on'=>'search, resetloginstudentsearch'),
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
			'Rel_Stud_Info' => array(self::BELONGS_TO, 'StudentInfo', 'student_transaction_student_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'student_transaction_nationality_id'),
			'Rel_Photos' => array(self::BELONGS_TO, 'StudentPhotos','student_transaction_student_photos_id'),
			'Rel_Student_Address' => array(self::BELONGS_TO, 'StudentAddress', 'student_transaction_student_address_id'),
			'Rel_student_academic_terms_period_name' => array(self::BELONGS_TO, 'AcademicTermPeriod', 'student_academic_term_period_tran_id'),	
			'Rel_user' => array(self::BELONGS_TO, 'User', 'student_transaction_user_id'),
			'Rel_language' => array(self::BELONGS_TO, 'LanguagesKnown', 'student_transaction_languages_known_id'),		
			'Rel_student_academic_terms_name' => array(self::BELONGS_TO, 'AcademicTerm', 'student_academic_term_name_id'),	
			'Rel_languages_known' => array(self::BELONGS_TO, 'LanguagesKnown','student_transaction_languages_known_id'),	
			'Rel_Status' => array(self::BELONGS_TO, 'Studentstatusmaster','student_transaction_detain_student_flag'),
			'docs_trans' => array(self::BELONGS_TO, 'StudentDocsTrans','', 'on'=>'student_transaction_id = student_docs_trans_user_id'),	
			'docs' => array(self::BELONGS_TO, 'StudentDocs','','on'=>'student_docs_id= docs_trans.student_docs_trans_stud_docs_id'),
			'relCourse' => array(self::BELONGS_TO, 'CourseMaster', 'student_transaction_course_id'),
			
			
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_transaction_id' => 'Student Transaction',
			'student_transaction_user_id' => 'Username',
			'student_transaction_student_id' => 'Student Transaction Student',
			'student_transaction_branch_id' => 'Branch',
			'student_transaction_category_id' => 'Category',
			'student_transaction_organization_id' => 'Organization',
			'student_transaction_student_address_id' => 'Student Address',
			'student_transaction_nationality_id' => 'Nationality',
			'student_transaction_quota_id' => 'Quota',
			'student_transaction_religion_id' => 'Religion',
			'student_transaction_shift_id' => 'Shift',
			'student_transaction_languages_known_id' => 'Languages Known',
			'student_transaction_student_photos_id' => 'Student Photos',
			'student_transaction_division_id' => 'Division',
			'student_transaction_batch_id' => 'Batch',
			'student_academic_term_period_tran_id' => 'Academic Year',
			'student_academic_term_name_id' => 'Semester',
			'student_enroll_no' => 'Enroll No',
			'student_first_name' => 'Name',
			'student_middle_name' => 'Husband/Father Name',
			'student_last_name' => 'Surname',
			'student_adm_date' => 'Student Adm Date',
			'student_dob' => 'Student Dob',
			'student_gender' => 'Student Gender',
			'student_guardian_name' => 'Student Guardian Name',
			'student_guardian_relation' => 'Student Guardian Relation',
			'student_guardian_occupation' => 'Student Guardian Occupation',
			'student_guardian_income' => 'Student Guardian Income',
			'student_guardian_home_address' => 'Student Guardian Home Address',
			'student_guardian_phoneno' => 'Student Guardian Phoneno',
			'student_guardian_mobile' => 'Student Guardian Mobile',
			'student_email_id_1' => 'Student Email Id 1',
			'student_bloodgroup' => 'Student Bloodgroup',
			'student_transaction_detain_student_flag'=>'Student Status',
			'student_transaction_course_id'=>'Course'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info','Rel_Status', 'Rel_language','Rel_user');

		$criteria->compare('student_transaction_id',$this->student_transaction_id);
		$criteria->compare('student_transaction_student_id',$this->student_transaction_student_id);
		$criteria->compare('student_transaction_student_address_id',$this->student_transaction_student_address_id);
		$criteria->compare('student_transaction_languages_known_id',$this->student_transaction_languages_known_id);
		$criteria->compare('student_transaction_student_photos_id',$this->student_transaction_student_photos_id);
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);
		$criteria->compare('student_academic_term_name_id',$this->student_academic_term_name_id);

		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
		$criteria->compare('Rel_Status.status_name',$this->status_name,true);
		$criteria->compare('Rel_Stud_Info.student_mobile_no',$this->student_mobile_no,true);
		$criteria->compare('Rel_Stud_Info.student_email_id_1',$this->student_email_id_1,true);
		$criteria->compare('student_transaction_course_id',$this->student_transaction_course_id);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 

	/**
	 * Return student list for reset login details.
	 */
	public function resetloginstudentsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Stud_Info', 'Rel_student_academic_terms_name' ,'Rel_user');
		
		$criteria->compare('student_academic_term_period_tran_id',$this->student_academic_term_period_tran_id);
		$criteria->compare('student_transaction_course_id',$this->student_transaction_course_id);
		$criteria->compare('student_transaction_user_id',$this->student_transaction_user_id);
		$criteria->compare('Rel_Stud_Info.student_first_name',$this->student_first_name,true);
		$criteria->compare('Rel_Stud_Info.student_enroll_no',$this->student_enroll_no,true);
		$criteria->compare('Rel_Stud_Info.student_last_name',$this->student_last_name,true);
	
		$criteria->compare('Rel_student_academic_terms_name.academic_term_name',$this->academic_term_name,true);

		$stud_data = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'student_transaction_id DESC',
				),
			));
		
		$_SESSION['Student_records']=$stud_data;
		return $stud_data;
	} 

	
	/**
	 * Find city name based on city id.
	 */	
	public function findcity($id)
	{
		$name = City::model()->findByPk($id);
		return $name->city_name;
		
	}
	/**
	 * Find country name based on country id.
	 */
	public function findcountry($id)
	{
		$name = Country::model()->findByPk($id);
		return $name->name;
		
	}

	/**
	 * Find state name based on state id.
	 */
	public function findstate($id)
	{
		$name = State::model()->findByPk($id);
		return $name->state_name;
		
	}

	/**
	 * @return date format for search in gridview using date column.
	 */
	private function dbDateSearch($value)
	{
		if($value != "" && preg_match('/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/', $value,$matches))
		return date("Y-m-d",strtotime($matches[0]));
	    else
		return $value;
	}
}
