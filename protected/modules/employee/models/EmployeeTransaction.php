<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

/**
 * This is the model class for table "employee_transaction".
 * @package EduSec.models
 */

class EmployeeTransaction extends CActiveRecord
{
	public $month,$csvfile,$check;
	public $std_code,$landline,$fax_phone,$applointment,$gross_per_month,$appointment_type,$faculty_type,$payscale,$programme,$course,$salary_mode,$pf_number,$doctrate_degree,$pg_degree,$ug_degree,$area_specialization,$other_qualification,$research_exp,$total_exp,$teaching_exp,$bank_name,$bank_branch_name,$ifsc_code,$national_publication,$patent,$no_pg_prj_guided,$no_dr_prj_guided,$international_publication,$no_of_books_pub,$Physical_hd,$minority_indicator,$fy_teacher,$fy_common_teacher,$fy_common_subject,$expert_mem_aicte,$basic_pay_rs,$aicte_grant_apply,$da,$hra_rs,$other_allowance_rs,$res_phone,$phd,$master_degree,$bachelor_degree,$diploma,$other,$salary_type,$level,$employee_organization_mobile;
	

	public $cat,$category_name, $employee_docs_path, $branch_name, $employee_first_name, $department_name, $shift_type, $quota_name,$employee_type,$user_organization_email_id,$employee_no,$employee_attendance_card_id,$employee_designation_name,$document_category_namem,$doc_category_id,$employee_last_name;

	public $employee_docs_desc,$title,$employee_docs_submit_date,$employee_private_mobile,$employee_private_email;

	/**
	 * Returns the static model of the specified AR class.
	 * @return EmployeeTransaction the static model class
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
		return 'employee_transaction';
	}

	/**
	 * Set defualt scope to do not display transafer and resign employee.
	 */
	public function defaultScope() 
	{
       		return array(
           		'condition' => 'employee_status = 0'
			);
  	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_department_id', 'required','message'=>''),

			array('employee_transaction_user_id, employee_transaction_employee_id,employee_status, employee_transaction_emp_address_id, employee_transaction_branch_id, employee_transaction_category_id, employee_transaction_religion_id, employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_organization_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id', 'numerical', 'integerOnly'=>true),

			array('employee_transaction_id, employee_transaction_user_id, employee_transaction_employee_id, employee_transaction_emp_address_id, employee_transaction_branch_id, employee_transaction_category_id, employee_transaction_religion_id, employee_transaction_shift_id, employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_organization_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id, category_name, branch_name, employee_first_name, department_name, quota_name,title, shift_type,employee_type,user_organization_email_id,employee_no,employee_private_mobile,employee_private_email,employee_attendance_card_id,employee_last_name,employee_designation_name,employee_docs_submit_date', 'safe', 'on'=>'search,smssearch'),
		);

	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'Rel_Emp_Info' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_transaction_employee_id'),
			'Rel_Lang' => array(self::BELONGS_TO, 'LanguagesKnown', 'employee_transaction_languages_known_id'),


			'Rel_Branch' => array(self::BELONGS_TO, 'Branch', 'employee_transaction_branch_id'),
			'Rel_Category' => array(self::BELONGS_TO, 'Category', 'employee_transaction_category_id'),
			'Rel_Type' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_type'),
			'Rel_Quota' => array(self::BELONGS_TO, 'Quota', 'employee_transaction_quota_id'),
			'Rel_Religion' => array(self::BELONGS_TO, 'Religion', 'employee_transaction_religion_id'),
			'Rel_Shift' => array(self::BELONGS_TO, 'Shift', 'employee_transaction_shift_id'),
			'Rel_Designation' => array(self::BELONGS_TO, 'EmployeeDesignation', 'employee_transaction_designation_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'employee_transaction_nationality_id'),
			'Rel_Department' => array(self::BELONGS_TO, 'Department', 'employee_transaction_department_id'),
			'Rel_Organization' => array(self::BELONGS_TO, 'Organization', 'employee_transaction_organization_id'),
			'Rel_Photo' => array(self::BELONGS_TO, 'EmployeePhotos', 'employee_transaction_emp_photos_id'),
			'Rel_user1' => array(self::BELONGS_TO, 'User', 'employee_transaction_user_id'),
			'Rel_Employee_Address' => array(self::BELONGS_TO, 'EmployeeAddress', 'employee_transaction_emp_address_id'),	
			'docs_trans' => array(self::BELONGS_TO, 'EmployeeDocsTrans','', 'on'=>'employee_transaction_id = employee_docs_trans_user_id'),	
			'docs' => array(self::BELONGS_TO, 'EmployeeDocs','','on'=>'employee_docs_id= docs_trans.employee_docs_trans_emp_docs_id'),	

	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employee_transaction_id' => 'Employee Transaction',
			'employee_transaction_user_id' => 'Employee Transaction User',
			'employee_transaction_employee_id' => 'Employee Transaction Employee',
			'employee_transaction_emp_address_id' => 'Employee Transaction Emp Address',
			'employee_transaction_branch_id' => 'Branch',
			'employee_transaction_category_id' => 'Category',
			'employee_transaction_religion_id' => 'Religion',
			'employee_transaction_shift_id' => 'Shift',
			'employee_transaction_designation_id' => 'Designation',
			'employee_transaction_nationality_id' => 'Nationality',
			'employee_transaction_department_id' => 'Department',
			'employee_transaction_organization_id' => 'Organization',
			'employee_transaction_languages_known_id' => 'Languages Known',
			'employee_transaction_emp_photos_id' => 'Photos',
			'employee_no' => 'Employee No',
			'employee_first_name' => 'Employee First Name',
			'employee_middle_name' => 'Employee Middle Name',
			'employee_last_name' => 'Employee Last Name',
			'employee_name_alias' => 'Employee Name Alias',
			'employee_dob' => 'Employee Dob',
			'employee_birthplace' => 'Employee Birth Place',
			'employee_gender' => 'Employee Gender',
			'employee_bloodgroup' => 'Employee Blood Group',
			'employee_marital_status' => 'Employee Marital Status',
			'employee_private_email' => 'Employee Private Email',
			'employee_organization_mobile' => 'Employee Organization Mobile',
			'employee_private_mobile' => 'Employee Private Mobile',
			'employee_pancard_no' => 'Employee Pancard No',
			'employee_account_no' => 'Employee Account No',
			'employee_joining_date' => 'Employee Joining Date',
			'employee_probation_period' => 'Employee Probation Period',
			'employee_hobbies' => 'Employee Hobbies',
			'employee_technical_skills' => 'Employee Technical Skills',
			'employee_project_details' => 'Employee Project Details',
			'employee_curricular' => 'Employee Curricular',
			'employee_reference' => 'Employee Reference',
			'employee_refer_designation' => 'Employee Refer Designation',
			'employee_guardian_name' => 'Employee Guardian Name',
			'employee_guardian_relation' => 'Employee Guardian Relation',
			'employee_guardian_home_address' => 'Employee Guardian Home Address',
			'employee_guardian_qualification' => 'Employee Guardian Qualification',
			'employee_guardian_occupation' => 'Employee Guardian Occupation',
			'employee_guardian_income' => 'Employee Guardian Income',
			'employee_guardian_occupation_address' => 'Employee Guardian Occupation Address',
			'employee_guardian_occupation_city' => 'Employee Guardian Occupation City',
			'employee_guardian_city_pin' => 'Employee Guardian City Pin',
			'employee_guardian_phone_no' => 'Employee Guardian Phone No',
			'employee_guardian_mobile1' => 'Employee Guardian Mobile1',
			'employee_guardian_mobile2' => 'Employee Guardian Mobile2',
			'employee_faculty_of' => 'Employee Faculty Of',
			'employee_attendance_card_id' => 'Employee Attendance Card',
			'employee_tally_id' => 'Employee Tally',
			'employee_type' => 'Employee Type',
			'employee_attendence_card_id'=> 'Attendence card number',
			'employee_designation_name'=> 'Employee Designation', 
			
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
	
		$criteria->distinct = true;
		$criteria->alias = 'et';
		$criteria->join = 'JOIN employee_designation emp_des ON emp_des.employee_designation_id = et.employee_transaction_designation_id';
		$criteria->with = array('Rel_Emp_Info');
		
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_transaction_user_id',$this->employee_transaction_user_id);
		$criteria->compare('employee_transaction_employee_id',$this->employee_transaction_employee_id);
		$criteria->compare('employee_transaction_emp_address_id',$this->employee_transaction_emp_address_id);
		$criteria->compare('employee_transaction_branch_id',$this->employee_transaction_branch_id);
		$criteria->compare('employee_transaction_category_id',$this->employee_transaction_category_id);
		$criteria->compare('employee_transaction_religion_id',$this->employee_transaction_religion_id);
		$criteria->compare('employee_transaction_shift_id',$this->employee_transaction_shift_id);
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_nationality_id',$this->employee_transaction_nationality_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);
		$criteria->compare('employee_transaction_organization_id',$this->employee_transaction_organization_id);
		$criteria->compare('employee_transaction_languages_known_id',$this->employee_transaction_languages_known_id);
		$criteria->compare('employee_transaction_emp_photos_id',$this->employee_transaction_emp_photos_id);

		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_user1.user_organization_email_id',$this->user_organization_email_id,true);

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);

		$criteria->compare('Rel_Emp_Info.employee_type',$this->employee_type,true);
		$criteria->compare('Rel_Emp_Info.employee_private_mobile',$this->employee_private_mobile,true);
		$criteria->compare('Rel_Emp_Info.employee_private_email',$this->employee_private_email,true);

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
					
			'sort'=>array(
				    'defaultOrder'=>'emp_des.employee_designation_level ASC',
				),
		));
		$_SESSION['employee_records']=$emp_data;
		return $emp_data;
	}
	
	/**
	 * Find city name based on city id.
	 */
	public function findcity($id)
	{
		       // Warning: Please modify the following code to remove attributes that
		       // should not be searched.
		       $name = City::model()->findByPk($id);
		       return $name->city_name;
		       
	}
	
	/**
	 * Find country name based on country id.
	 */
	public function findcountry($id)
	{
		       // Warning: Please modify the following code to remove attributes that
		       // should not be searched.
		       $name = Country::model()->findByPk($id);
		       return $name->name;
		       
	}

	
	/**
	 * Find state name based on state id.
	 */
	public function findstate($id)
	{
		       // Warning: Please modify the following code to remove attributes that
		       // should not be searched.
		       $name = State::model()->findByPk($id);
		       return $name->state_name;
		       
	}
}
