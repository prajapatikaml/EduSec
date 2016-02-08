
<?php
/**
 * This is the model class for table "employee_info".
 * @package EduSec.modules.student.models
 */
class EmployeeInfo extends CActiveRecord
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
	const TYPE_MARRIED='MARRIED';
	const TYPE_UNMARRIED='UNMARRIED';
	const TYPE_MR='Mr.';
	const TYPE_MRS='Mrs.'; 
	const TYPE_MISS='Ms.';
	const TYPE_PROF='Prof.';
	const TYPE_DR='Dr.';


	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeInfo the static model class
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
		return 'employee_info';
	}
	public function getreportinglistname()
	{
	return $this->employee_first_name." ".$this->employee_last_name;	
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('employee_first_name,employee_last_name,employee_type, employee_joining_date,employee_private_email,employee_unique_id', 'required','message'=>''),
			array('title,employee_middle_name,employee_private_mobile,employee_name_alias','safe'),
			array('employee_attendance_card_id','safe'),
			array('employee_guardian_income,employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2,employee_organization_mobile,employee_private_mobile,employee_organization_mobile, employee_private_mobile, employee_account_no, employee_guardian_occupation_city, employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2, employee_created_by','numerical', 'integerOnly'=>true ,'message'=>''),
		
			array('employee_private_email','unique', 'message'=>'email id must be unique'),
			array('employee_no, employee_marital_status, employee_probation_period', 'length', 'max'=>10),
			array('employee_name_alias, employee_first_name, employee_middle_name, employee_last_name, employee_birthplace, employee_reference', 'length', 'max'=>25),
			array('employee_hobbies, employee_technical_skills, employee_project_details, employee_curricular', 'length', 'max'=>200, 'message'=>''),
			array('employee_gender', 'length', 'max'=>6),
			array('employee_bloodgroup', 'length', 'max'=>3),
			
			array('employee_private_email', 'length', 'max'=>60, 'message'=>''),
			array('employee_guardian_city_pin', 'length', 'max'=>8),
			array('employee_account_no,employee_pf_id', 'length', 'max'=>20),
			array('employee_organization_mobile,employee_private_mobile,employee_guardian_mobile1, employee_guardian_mobile2','CRegularExpressionValidator','pattern'=>'/^([0-9]+)$/','message'=>''),
			
			array('employee_organization_mobile,employee_private_mobile,employee_guardian_mobile1, employee_guardian_mobile2','length', 'max'=>10, 'min'=>10,'allowEmpty'=>true),
			array('employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2', 'length', 'max'=>15),
			array('employee_refer_designation, employee_guardian_relation', 'length', 'max'=>20),
			array('employee_guardian_home_address, employee_guardian_occupation_address, employee_guardian_name', 'length', 'max'=>100),
			array('employee_guardian_qualification, employee_guardian_occupation,', 'length', 'max'=>50),
			array('employee_guardian_income', 'length', 'max'=>15),
			array('employee_tally_id', 'length', 'max'=>9),

			array('employee_joining_date','chkjoindate'),
			array('employee_dob','chkbdate'),
			// Please remove those attributes that should not be searched.
			array('employee_id, employee_no, employee_first_name, employee_middle_name, employee_last_name, employee_name_alias, employee_mother_name, employee_dob, employee_birthplace, employee_gender, employee_bloodgroup, employee_marital_status, employee_private_email, employee_organization_mobile, employee_private_mobile,employee_account_no, employee_joining_date, employee_probation_period, employee_hobbies, employee_technical_skills, employee_project_details, employee_curricular, employee_reference, employee_refer_designation, employee_guardian_name, employee_guardian_relation, employee_guardian_home_address, employee_guardian_qualification, employee_guardian_occupation, employee_guardian_income, employee_guardian_occupation_address, employee_guardian_occupation_city, employee_guardian_city_pin, employee_guardian_phone_no, employee_guardian_mobile1, employee_guardian_mobile2, employee_attendance_card_id, employee_tally_id, employee_created_by,employee_creation_date,employee_type,employee_left_transfer_date,transfer_left_remarks,employee_pf_id,employee_unique_id', 'safe', 'on'=>'search'),
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
			'Rel_g_city'=>array(self::BELONGS_TO, 'City', 'employee_guardian_occupation_city'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_id' => 'Id',
			'title' => 'Title',
			'employee_no' => 'Employee No',
			'employee_unique_id' => 'Employee Unique Id',
			'employee_first_name' => 'First Name',
			'employee_middle_name' => 'Middle Name',
			'employee_last_name' => 'Last Name',
			'employee_name_alias' => 'Name Alias',
			'employee_mother_name' => 'Mother Name',
			'employee_dob' => 'Date of Birth',
			'employee_birthplace' => 'Birth Place',
			'employee_gender' => 'Gender',
			'employee_type'=>'Type',
			'employee_bloodgroup' => 'Blood Group',
			'employee_marital_status' => 'Marital Status',
			'employee_private_email' => 'Login Id',
			'employee_organization_mobile' => 'Institute Mobile',
			'employee_private_mobile' => 'Private Mobile No.',
			
			'employee_account_no' => 'Bank Account No',
			'employee_joining_date' => 'Joining Date',
			'employee_probation_period' => 'Probation Period',
			'employee_hobbies' => 'Hobbies',
			'employee_technical_skills' => 'Technical Skills',
			'employee_project_details' => 'Project Details',
			'employee_curricular' => 'Curricular',
			'employee_reference' => 'Reference',
			'employee_refer_designation' => 'Reference Designation',
			'employee_guardian_name' => 'Name',
			'employee_guardian_relation' => 'Relation',
			'employee_guardian_home_address' => 'Home Address',
			'employee_guardian_qualification' => 'Qualification',
			'employee_guardian_occupation' => 'Occupation',
			'employee_guardian_income' => 'Annual Income',
			'employee_guardian_occupation_address' => 'Occupation Address',
			'employee_guardian_occupation_city' => 'Occupation City',
			'employee_guardian_city_pin' => 'City Pin Code',
			'employee_guardian_phone_no' => 'Phone No',
			'employee_guardian_mobile1' => 'Guardian Mobile 1',
			'employee_guardian_mobile2' => 'Guardian Mobile 2',
			//'employee_faculty_of' => 'Course Name',
			'employee_attendance_card_id' => 'Attendance Card',
			'employee_tally_id' => 'Tally',
			'employee_created_by' => 'Created By',
			'employee_creation_date' => 'Creation Date',
			
			'employee_pf_id'=>'EPF Number',
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

		$criteria->compare('employee_id',$this->employee_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('employee_no',$this->employee_no,true);
		$criteria->compare('employee_unique_id',$this->employee_unique_id,true);			
		$criteria->compare('employee_first_name',$this->employee_first_name,true);
		$criteria->compare('employee_middle_name',$this->employee_middle_name,true);
		$criteria->compare('employee_last_name',$this->employee_last_name,true);
		$criteria->compare('employee_name_alias',$this->employee_name_alias,true);
		$criteria->compare('employee_mother_name',$this->employee_mother_name,true);
		$criteria->compare('employee_dob',$this->employee_dob,true);
		$criteria->compare('employee_birthplace',$this->employee_birthplace,true);
		$criteria->compare('employee_gender',$this->employee_gender,true);
		$criteria->compare('employee_bloodgroup',$this->employee_bloodgroup,true);
		$criteria->compare('employee_marital_status',$this->employee_marital_status,true);
		$criteria->compare('employee_private_email',$this->employee_private_email,true);
		$criteria->compare('employee_organization_mobile',$this->employee_organization_mobile);
		$criteria->compare('employee_private_mobile',$this->employee_private_mobile);
		
		$criteria->compare('employee_account_no',$this->employee_account_no);
		$criteria->compare('employee_pf_id',$this->employee_pf_id);
		$criteria->compare('employee_joining_date',$this->employee_joining_date,true);
		$criteria->compare('employee_probation_period',$this->employee_probation_period,true);
		$criteria->compare('employee_hobbies',$this->employee_hobbies,true);
		$criteria->compare('employee_technical_skills',$this->employee_technical_skills,true);
		$criteria->compare('employee_project_details',$this->employee_project_details,true);
		$criteria->compare('employee_curricular',$this->employee_curricular,true);
		$criteria->compare('employee_reference',$this->employee_reference,true);
		$criteria->compare('employee_refer_designation',$this->employee_refer_designation,true);
		$criteria->compare('employee_guardian_name',$this->employee_guardian_name,true);
		$criteria->compare('employee_guardian_relation',$this->employee_guardian_relation,true);
		$criteria->compare('employee_guardian_home_address',$this->employee_guardian_home_address,true);
		$criteria->compare('employee_guardian_qualification',$this->employee_guardian_qualification,true);
		$criteria->compare('employee_guardian_occupation',$this->employee_guardian_occupation,true);
		$criteria->compare('employee_guardian_income',$this->employee_guardian_income,true);
		$criteria->compare('employee_guardian_occupation_address',$this->employee_guardian_occupation_address,true);
		$criteria->compare('employee_guardian_occupation_city',$this->employee_guardian_occupation_city);
		$criteria->compare('employee_guardian_city_pin',$this->employee_guardian_city_pin);
		$criteria->compare('employee_guardian_phone_no',$this->employee_guardian_phone_no);
		$criteria->compare('employee_guardian_mobile1',$this->employee_guardian_mobile1);
		$criteria->compare('employee_guardian_mobile2',$this->employee_guardian_mobile2);
		//$criteria->compare('employee_faculty_of',$this->employee_faculty_of,true);
		$criteria->compare('employee_attendance_card_id',$this->employee_attendance_card_id,true);
		$criteria->compare('employee_tally_id',$this->employee_tally_id,true);
		$criteria->compare('employee_created_by',$this->employee_created_by);
		$criteria->compare('employee_creation_date',$this->employee_creation_date,true);
		$criteria->compare('employee_type',$this->employee_type,true);
		
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	* This method is for static Gender Drop Down.
	*/
	public function getGenderOptions()
	{
		return array(
		self::TYPE_MALE=>'MALE',
		self::TYPE_FEMALE=>'FEMALE',
		);
	}

	/**
	* This method is for static Blood Group Drop Down.
	*/
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
		self::TYPE_NPLUS=>'N+',
		);
	}

	/**
	* This method is for static Marital Status Drop Down.
	*/
	public function getMaritialStatus()
	{
		return array(
		self::TYPE_MARRIED=>'MARRIED',
		self::TYPE_UNMARRIED=>'UNMARRIED',
		);
	}
	
	/**
	* This method is for Title Gender Drop Down.
	*/
	public function getTitleOptions()
		{
			return array(
			self::TYPE_MR=>'Mr.',
			self::TYPE_MRS=>'Mrs.', 
			self::TYPE_MISS=>'Ms.',
			self::TYPE_PROF=>'Prof.',
			self::TYPE_DR=>'Dr.',
			);
		}

       /**	
       * This method return true or false by checking joining date and current date.
       */
       public function chkjoindate()
       {
		$curr_date = date('d-m-Y');

		if(strtotime($this->employee_joining_date) > strtotime($curr_date))
		{					
				$this->addError('employee_joining_date',"Joining date must be less than current date.");	
				 return false;	
		}
		else
				return true;
       }
     /**	
     * This method return true or false by checking Birth date and current date.
     */
    public function chkbdate()
    {
	if(empty($this->employee_joining_date)) {
		//$this->addError('employee_dob',"Select Joining date first");	
		return true;
	}
	else {
		
	$curr_date = date('d-m-Y');

	if(strtotime($this->employee_dob) > strtotime($this->employee_joining_date))
	{
		$this->addError('employee_dob',"Birthdate must be less than current date and Joining date.");	
			 return false;	
	}
	else
			return true;
	}
     }
    /**
    * This method is for checking the uniqueness of the employee unique validation.
    */
   public function chkunique()
   {
		$cardid_length = strlen((string) $this->employee_attendance_card_id);
			
		$cardid = $this->employee_attendance_card_id;
		$digit = 0;
		$diff = 10-$cardid_length;
		for($i=1;$i<=$diff;$i++)
		{
			$cardid = $digit.$cardid;
		}
		if($this->isNewRecord)
		$empcardid = EmployeeInfo::model()->findAll('employee_attendance_card_id='.$cardid);
		
		else
		$empcardid = EmployeeInfo::model()->findAll('employee_attendance_card_id='.$cardid.' and employee_info_transaction_id<>'.$_REQUEST['id']);
		
		if($empcardid)
		{
			$this->addError('employee_attendance_card_id',"Employee IdCard must be unique.");	
			return false;	
		}
		else
			return true;
   }

}
