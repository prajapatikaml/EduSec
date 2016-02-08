<?php

/**
 * This is the model class for table "student_info".
 * @package EduSec.models
 */
class StudentInfo extends CActiveRecord
{

	const TYPE_MALE='MALE';
	const TYPE_FEMALE='FEMALE';
	const TYPE_APLUS='A+';
	const TYPE_AMINUS='A-';
	const TYPE_BPLUS='B+';
	const TYPE_BMINUS='B-';
	const TYPE_ABPLUS='AB+';
	const TYPE_ABMINUS='AB-';
	const TYPE_OPLUS='O+';
	const TYPE_OMINUS='O-';
	const TYPE_NPLUS='N+';
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';
        const TYPE_HOSTEL='HOSTEL';
	const TYPE_HOME='HOME';
	const TYPE_REGULAR='Regular';
	const TYPE_DTOD='DTOD';
	const TYPE_TRANSFER='Transfer';

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StudentInfo the static model class
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
		return 'student_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,student_mobile_no, student_roll_no,student_first_name, student_last_name, student_adm_date, student_created_by, student_creation_date, student_email_id_1,visa_exp_date,emergency_cont_name,emergency_cont_no','safe','message'=>''),
			array('student_first_name, student_last_name,passport_no,passport_exp_date,student_email_id_1','required','message'=>''),
			array('student_guardian_occupation_city, student_guardian_city_pin, student_guardian_phoneno, student_guardian_mobile,  student_created_by,student_mobile_no,student_guardian_income', 'numerical', 'integerOnly'=>true,'message'=>''),
			array('student_roll_no', 'length', 'max'=>15),
			array('student_no','safe'),
			//array('student_roll_no', 'CRegularExpressionValidator', 'pattern'=>'/^\w*[A-Za-z0-9\/_-]*[0-9]+$/','message'=>''),

			array('student_first_name, student_middle_name, student_last_name, student_birthplace', 'length', 'max'=>25),
			array('student_guardian_name', 'length', 'max'=>100),
			array('student_gender', 'length', 'max'=>6),
			array('student_email_id_1, student_email_id_2', 'email','message'=>'Email shoud ne in E-mail format'),
			array('student_email_id_1, student_email_id_2','unique', 'message'=>'Email id must be unique'),
			array('student_guardian_relation', 'length', 'max'=>20),
			array('student_guardian_mobile,student_mobile_no', 'length', 'max'=>10,'min'=>10),
			
			array('student_guardian_qualification, student_guardian_occupation', 'length', 'max'=>50),
			array('student_guardian_occupation_address, student_guardian_home_address', 'length', 'max'=>100),

			//array('student_dob','chkbirthdate'),
			array('student_adm_date','chkacpcdate'),

			array('student_email_id_1, student_email_id_2', 'length', 'max'=>60, 'message'=>''),
			array('student_bloodgroup', 'length', 'max'=>3),
			
			//array('student_first_name,student_middle_name,student_last_name', 'CRegularExpressionValidator', 'pattern'=>'/^([A-Za-z]+)$/','message'=>''),
			//array('student_email_id_1, student_email_id_2','CRegularExpressionValidator','pattern'=>'/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]+)$/','message'=>''),

			array('student_id, student_roll_no,student_no, student_first_name, student_middle_name, student_last_name, student_adm_date, student_dob, student_birthplace, student_gender, student_guardian_name, student_guardian_relation, student_guardian_qualification, student_guardian_occupation, student_guardian_income, student_guardian_occupation_address, student_guardian_occupation_city, student_guardian_city_pin, student_guardian_home_address, student_guardian_phoneno, student_guardian_mobile, student_email_id_1, student_email_id_2, student_bloodgroup, student_created_by, student_creation_date,visa_exp_date,passport_no,passport_exp_date,emergency_cont_name,emergency_cont_no', 'safe', 'on'=>'search'),

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
		'Rel_gardian_city' => array(self::BELONGS_TO, 'City', 'student_guardian_occupation_city'),
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'student_id' => 'Student',
			'title' => 'Title',
			'student_roll_no' => 'Student Unique ID',
			'student_no' => 'Student No',
			'student_mobile_no' => 'Mobile No',
			'student_first_name' => 'First Name',
			'student_middle_name' => 'Middle Name',
			'student_last_name' => 'Last Name',
			'student_adm_date' => 'Admission Date',
			'student_dob' => 'Date of Birth',
			'student_birthplace' => 'Birth / Native Place',
			'student_gender' => 'Gender',
			'student_guardian_name' => 'Name',
			'student_guardian_relation' => 'Relation',
			'student_guardian_qualification' => 'Qualification',
			'student_guardian_occupation' => 'Occupation',
			'student_guardian_income' => 'Annual Income',
			'student_guardian_occupation_address' => 'Occupation Address',
			'student_guardian_occupation_city' => 'Occupation City',
			'student_guardian_city_pin' => 'City Pin',
			'student_guardian_home_address' => 'Home Address',
			'student_guardian_phoneno' => 'Guardian Phone',
			'student_guardian_mobile' => 'Guardian Mobile',
			'student_email_id_1' => 'Email ID',
			'student_email_id_2' => 'Private Email ID',
			'student_bloodgroup' => 'Blood Group',
			'student_tally_ledger_name' => 'Tally',
			'student_created_by' => 'Student Created By',
			'student_creation_date' => 'Student Creation Date',
			'visa_exp_date'=>'Visa Expiry Date',
			'passport_no'=>'Passport No.',
			'emergency_cont_name'=>'Emergency Contact Name',
			'emergency_cont_no'=>'Emergency Contact No.',
			'passport_exp_date'=>'Passport Expiry Date',
		);
	}


    public function chkbirthdate()
    {
	$curr_date = date('d-m-Y');
	if(empty($this->student_adm_date)) {
		//$this->addError('student_dob',"Select Admission date first");	
		return true;
	}
	else {
	  $dob = date('Y-m-d',strtotime($this->student_dob));
	  $adm = date('Y-m-d',strtotime($this->student_adm_date));
	  $diff = $adm-$dob;
	   if($diff <= 14) 	{
			
		$this->addError('student_dob',"Birth date must be less than Admission date.");	
		return false;	
	
	   }

	   else
		return true;
	}
     }

    public function chkacpcdate()
    {

	$curr_date = date('d-m-Y');

	if(strtotime($this->student_adm_date) > strtotime($curr_date))
	{					
			$this->addError('student_adm_date',"Admission date must be less than current date.");	
			 return false;	
	}
	else
			return true;
     }

	public function getBloodGroup()
	{
		return array(
		self::TYPE_APLUS=>'A+',
		self::TYPE_AMINUS=>'A-',
		self::TYPE_BPLUS=>'B+',
		self::TYPE_BMINUS=>'B-',
		self::TYPE_ABPLUS=>'AB+',
		self::TYPE_ABMINUS=>'AB-',
		self::TYPE_OPLUS=>'O+',
		self::TYPE_OMINUS=>'O-',
		self::TYPE_NPLUS=>'NA',
		);
	}

	public function getGenderOptions()
	{
		return array(
		self::TYPE_MALE=>'MALE',
		self::TYPE_FEMALE=>'FEMALE',
		);
	}

	public function getTitleOptions()
	{
		return array(
		self::TYPE_MR=>'Mr.',
		self::TYPE_MRS=>'Mrs.', 
		self::TYPE_MISS=>'Ms.',
		);
	}
		
	public function getLivingOptions()
	{
		return array(
		self::TYPE_HOSTEL=>'HOSTEL',
		self::TYPE_HOME=>'HOME',
		);
	}
}
