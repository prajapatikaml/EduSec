<?php
/**
 * This is the model class for table "employee_transaction".
 * @package EduSec.modules.student.models
 */

class EmployeeTransaction extends CActiveRecord
{
	public $month,$csvfile,$check;
	public $std_code,$landline,$fax_phone,$applointment,$gross_per_month,$appointment_type,$faculty_type,$payscale,$programme,$course,$salary_mode,$pf_number,$doctrate_degree,$pg_degree,$ug_degree,$area_specialization,$other_qualification,$research_exp,$total_exp,$teaching_exp,$bank_name,$bank_branch_name,$ifsc_code,$national_publication,$patent,$no_pg_prj_guided,$no_dr_prj_guided,$international_publication,$no_of_books_pub,$Physical_hd,$minority_indicator,$fy_teacher,$fy_common_teacher,$fy_common_subject,$expert_mem_aicte,$basic_pay_rs,$aicte_grant_apply,$da,$hra_rs,$other_allowance_rs,$res_phone,$phd,$master_degree,$bachelor_degree,$diploma,$other,$salary_type,$level,$employee_organization_mobile;
	

	public $cat, $employee_docs_path, $branch_name, $employee_first_name, $department_name,$employee_type,$user_organization_email_id,$employee_no,$employee_unique_id,$employee_attendance_card_id,$employee_designation_name,$document_category_namem,$doc_category_id,$employee_last_name;

	public $employee_docs_desc,$title,$employee_docs_submit_date,$employee_private_mobile,$employee_private_email,$employee_left_transfer_date,$transfer_left_remarks;

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
	 * Set Default scope for hide Regine or Transfer Employee from employee list.
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
			array('employee_transaction_designation_id, employee_transaction_department_id', 'required','message'=>''),

			array('employee_transaction_user_id, employee_transaction_employee_id,employee_status, employee_transaction_emp_address_id,employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id', 'numerical', 'integerOnly'=>true),

			array('employee_transaction_id, employee_transaction_user_id, employee_transaction_employee_id, employee_transaction_emp_address_id, employee_transaction_designation_id, employee_transaction_nationality_id, employee_transaction_department_id, employee_transaction_languages_known_id, employee_transaction_emp_photos_id, employee_first_name, department_name,title,employee_type,user_organization_email_id,employee_no,employee_private_mobile,employee_private_email,employee_attendance_card_id,employee_last_name,employee_designation_name,employee_docs_submit_date', 'safe', 'on'=>'search,smssearch,leftresignsearch,resignsearch,salarysearch,transferResgin'),
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
			'Rel_Emp_Info' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_transaction_employee_id'),
			'Rel_Lang' => array(self::BELONGS_TO, 'LanguagesKnown', 'employee_transaction_languages_known_id'),
			'Rel_Type' => array(self::BELONGS_TO, 'EmployeeInfo', 'employee_type'),
			'Rel_Designation' => array(self::BELONGS_TO, 'EmployeeDesignation', 'employee_transaction_designation_id'),
			'Rel_Nationality' => array(self::BELONGS_TO, 'Nationality', 'employee_transaction_nationality_id'),
			'Rel_Department' => array(self::BELONGS_TO, 'Department', 'employee_transaction_department_id'),
			'Rel_Photo' => array(self::BELONGS_TO, 'EmployeePhotos', 'employee_transaction_emp_photos_id'),
			'Rel_user1' => array(self::BELONGS_TO, 'User', 'employee_transaction_user_id'),
			'Rel_Employee_Address' => array(self::BELONGS_TO, 'EmployeeAddress', 'employee_transaction_emp_address_id'),	
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
			'employee_transaction_religion_id' => 'Religion',
			'employee_transaction_designation_id' => 'Designation',
			'employee_transaction_nationality_id' => 'Nationality',
			'employee_transaction_department_id' => 'Department',
			'employee_transaction_languages_known_id' => 'Languages Known',
			'employee_transaction_emp_photos_id' => 'Photos',
			'employee_no' => 'Employee No',
			'employee_unique_id' =>'Employee Unique Id',
			'employee_first_name' => 'First Name',
			'employee_middle_name' => 'Middle Name',
			'employee_last_name' => 'Last Name',
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
			'transfer_left_remarks'=>'Remarks/Reason',
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
		$criteria->with = array('Rel_Emp_Info', 'Rel_user1');
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);

		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_user1.user_organization_email_id',$this->user_organization_email_id,true);

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_unique_id',$this->employee_unique_id,true);			
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
		$_SESSION['exportData']=$emp_data;
		return $emp_data;
	}

	/** This method is written for finding list of Employee who has resign from organization
	*/
	public function resignsearch()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array('Rel_Emp_Info','Rel_user1');

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_unique_id',$this->employee_unique_id,true);	
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);		
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);
		$criteria->addCondition('employee_status=2');		

		$emp_data =  new CActiveDataProvider(EmployeeTransaction::model()->resetScope(), array(
			'criteria'=>$criteria,
					
		));
		$_SESSION['employee_records']=$emp_data;
		return $emp_data;
	}
	
	/*
	/** This method is written for finding list of Employee for send SMA or Email.
	*/
	public function smssearch()
	{
		$criteria=new CDbCriteria;

		$criteria->join = 'JOIN employee_designation emp_des ON employee_transaction_designation_id = emp_des.employee_designation_id';
		$criteria->distinct = true;
		$criteria->with = array('Rel_Emp_Info', 'Rel_user1');
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_nationality_id',$this->employee_transaction_nationality_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);

		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('Rel_user1.user_organization_email_id',$this->user_organization_email_id,true);

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_unique_id',$this->employee_unique_id,true);	
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

	/** Find City name from id
	*/
	public function findcity($id)
	{
	       $name = City::model()->findByPk($id);
	       return $name->city_name;
		       
	}

	/** Find country name from id
	*/
	public function findcountry($id)
	{
	       $name = Country::model()->findByPk($id);
	       return $name->name;
		       
	}

	/** Find state name from id
	*/
	public function findstate($id)
	{
	       $name = State::model()->findByPk($id);
	       return $name->state_name;
		       
	}

	/** @return boolean. Check and delete all other information of the employee from 	      application. Employee profile will delete depend on this value.
	*/
	public function beforeDelete()
	{
		$id = $this->employee_transaction_id;
		//$emp_leave = EmployeeLeaveMaster::model()->findAll(array('condition'=>'empid='.$id));
		$att_check = Attendence::model()->findAll(array('condition'=>'employee_id='.$id));
		$emp_att = Employee_attendence::model()->findAll(array('condition'=>'employee_id='.$id));
		//$emp_leave_app = EmployeeLeaveApplication::model()->findAll(array('condition'=>'employee_leave_application_employee_code='.$id.' OR employee_leave_application_approved_by_code='.$id.' OR employee_leave_application_approved_by_code_2='.$id));
		//$emp_rep = EmployeeReportingTable::model()->findAll(array('condition'=>'emp_reporting_table_user_id='.$id.' OR emp_reporting_table_reporting_level_1='.$id.' OR emp_reporting_table_reporting_level_2='.$id));
		//$emp_sal = EmployeeSalaryStructure::model()->findAll(array('condition'=>'employee_id='.$id));
		//$ass_sub = AssignSubject::model()->findAll(array('condition'=>'subject_faculty_id='.$id));
		//$time_table = TimeTableDetail::model()->findAll(array('condition'=>'faculty_emp_id='.$id));
		

		if(!empty($emp_att) || !empty($att_check))
		{
			Yii::app()->user->setFlash('error',"You can not delete this record because it is used in another table.");
			return false;
		}	
        	else
		{				
			Yii::app()->user->setFlash('success',"Deleted Sucessfully");
			return true;
		}
    	}

	/** @return $menu. Return birth date of employee details of current date.
	*/
      public function Loadbirthdays()
      {
	$current_date = date('m-d');
	$employee_info=EmployeeInfo::model()->findAll('DATE_FORMAT(employee_dob, "%m-%d")="'.$current_date.'"');
	$menu = "<h2 style=text-align:center;>".date("d-M-Y")."</h2>";	
	foreach($employee_info as $emp) {
  	   $tran=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_employee_id'=>$emp['employee_id']));
	  if(isset($tran)) { 		
     	     $menu .= '<div class="birthday">';
	     $photo=EmployeePhotos::model()->findByPk($tran['employee_transaction_emp_photos_id']);
	     $menu .= '<span class="userimage">';
	     $user_image = Yii::app()->baseUrl.'/college_data/emp_images/no-images';
	     if(isset($photo))
	     { 		
	        if(file_exists(Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path))
	        $user_image = Yii::app()->baseUrl.'/college_data/emp_images/'.$photo->employee_photos_path;
	     }	
	     $menu .= CHtml::image($user_image,"No Image",array("width"=>"60px","height"=>"60px"));
	     $menu .='</span><span class="username">';
	     $menu .= ucfirst(strtolower($emp->title)).' '.ucfirst(strtolower($emp->employee_first_name)).' '.ucfirst(strtolower($emp->employee_last_name)).'</span></br>'. ucfirst(strtolower($tran->Rel_Designation->employee_designation_name)).'</br>'.date_format(new DateTime($emp->employee_dob),'d-m-Y').'</div>';
	    }
         }
       return $menu;
      }	
      //left and resign employee
	public function leftresignsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->with = array('Rel_Emp_Info','Rel_user1');

		$criteria->compare('Rel_Emp_Info.employee_no',$this->employee_no,true);
		$criteria->compare('Rel_Emp_Info.employee_unique_id',$this->employee_unique_id,true);	
		$criteria->compare('Rel_Emp_Info.employee_attendance_card_id',$this->employee_attendance_card_id,true);		
		$criteria->compare('Rel_Emp_Info.employee_first_name',$this->employee_first_name,true);
		$criteria->compare('Rel_Emp_Info.employee_last_name',$this->employee_last_name,true);
		$criteria->compare('employee_transaction_designation_id',$this->employee_transaction_designation_id);
		$criteria->compare('employee_transaction_department_id',$this->employee_transaction_department_id);
	
		$criteria->addCondition('employee_status=1');		

		$emp_data =  new CActiveDataProvider(EmployeeTransaction::model()->resetScope(), array(
			'criteria'=>$criteria,
					
		));
		$_SESSION['employee_records']=$emp_data;
		return $emp_data;
	}
	/**
	*For Export to PDF & Excel
	*Field written in attributes are exported in excel
	*For pdf pdfFile will be render to export
	*/
	public static function getExportData() {
		$data=array();
	      if(isset($_REQUEST['contact'])){
			      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Emp_Info.employee_attendance_card_id',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_last_name::Last Name',
			'Rel_Designation.employee_designation_name::Designation',
			'Rel_Department.department_name::Department',	
			'Rel_Emp_Info.employee_organization_mobile::Organization Mobile',
			'Rel_Emp_Info.employee_private_mobile::Private Mobile',	
        		),
		'filename'=>'Employee conatact details', 'pdfFile'=>'employee.views.employeeTransaction.expenseGridtoReport');	
		}
	       else if(isset($_REQUEST['transfer'])){	
		 $data = array('data'=>$_SESSION['employee_records'],'attributes'=>array(
		'Rel_Emp_Info.employee_no',
		'Rel_Emp_Info.employee_attendance_card_id',
		'Rel_Emp_Info.employee_first_name::First Name',
		'Rel_Emp_Info.employee_last_name::Last Name',
		'Rel_Designation.employee_designation_name::Designation',
		'Rel_Department.department_name::Department',	
		'Rel_Emp_Info.employee_left_transfer_date',
		'Rel_Emp_Info.transfer_left_remarks',		
		),
		'filename'=>'Tranfer-Employee-List', 'pdfFile'=>'employee.views.employeeTransaction.expenseGridtoReport');
		}
	      
	      else{	
	      $data = array('data'=>$_SESSION['exportData'],'attributes'=>array(
			'Rel_Emp_Info.employee_no',
			'Rel_Emp_Info.title',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_last_name::Last Name',
			'Rel_Emp_Info.employee_middle_name::Middle Name',
			'Rel_Emp_Info.employee_joining_date',
			'Rel_Emp_Info.employee_type',
			'Rel_Emp_Info.employee_private_mobile::Private Mobile',	
			'Rel_Designation.employee_designation_name::Designation',
			'Rel_Department.department_name::Department',	
			'Rel_Emp_Info.employee_private_email::Private Email',
			'Rel_Emp_Info.employee_dob::Birthdate',
			'Rel_Emp_Info.employee_birthplace::BirthPlace',
			'Rel_Emp_Info.employee_gender::Gender',
			'Rel_Emp_Info.employee_bloodgroup::Bloodgroup',	
			'Rel_Nationality.nationality_name::Nationality',
			'Rel_Emp_Info.employee_marital_status',
			
			'Rel_Emp_Info.employee_account_no::Bank Acc. No',
			'Rel_Emp_Info.employee_organization_mobile::Institute Mobile',
			'Rel_Photo.employee_photos_path',
			'Rel_Emp_Info.employee_guardian_name::Guardian Name',
			'Rel_Emp_Info.employee_guardian_relation::Guardian Relation',
			'Rel_Emp_Info.employee_guardian_qualification::Guardian Qualification',		
			'Rel_Emp_Info.employee_guardian_occupation::Guardian Occupation',
			'Rel_Emp_Info.employee_guardian_home_address::Guardian Address',
			'Rel_Emp_Info.employee_guardian_occupation_address::Guardian Occupation Address',
			'Rel_Emp_Info.Rel_g_city.city_name::Guardian City',
			'Rel_Emp_Info.employee_guardian_city_pin',
			'Rel_Emp_Info.employee_guardian_mobile1::Guardian Mobile1',
			'Rel_Emp_Info.employee_guardian_mobile2::Guardian Mobile2',
			'Rel_Emp_Info.employee_guardian_phone_no::Guardian Phone',
			'Rel_Emp_Info.employee_attendance_card_id',
			
			'Rel_Emp_Info.employee_curricular',
			'Rel_Emp_Info.employee_project_details',
			'Rel_Emp_Info.employee_technical_skills',
			'Rel_Emp_Info.employee_hobbies',		
			'Rel_Lang.languages_known1::Languages Known',
			//'Rel_Lang.Rel_Langs2.languages_name',
			//'Rel_Lang.Rel_Langs3.languages_name',
			//'Rel_Lang.Rel_Langs4.languages_name',
			'Rel_Emp_Info.employee_reference',
			'Rel_Emp_Info.employee_refer_designation',
			'Rel_Employee_Address.employee_address_c_line1::Current Address Street 1',
			'Rel_Employee_Address.employee_address_c_line2::Current Address Street 2',
			'Rel_Employee_Address.Rel_c_city.city_name::Current Address Town',
			'Rel_Employee_Address.employee_address_c_pincode',
			'Rel_Employee_Address.Rel_c_state.state_name::Current Address State',
			'Rel_Employee_Address.Rel_c_country.name::Current Address Country',
			'Rel_Employee_Address.employee_address_c_phone',
			'Rel_Employee_Address.employee_address_c_mobile',
			'Rel_Employee_Address.employee_c_house_no',
			'Rel_Employee_Address.employee_address_p_line1::Parmenent Address Street 1',
			'Rel_Employee_Address.employee_address_p_line2::Parmenent Address Street 2',			
			'Rel_Employee_Address.Rel_p_city.city_name::Parmenent Address Town',
			'Rel_Employee_Address.Rel_p_state.state_name::Parmenent Address State',
			'Rel_Employee_Address.Rel_p_country.name::Parmenent Address Country',		
			'Rel_Employee_Address.employee_address_p_phone',
			'Rel_Employee_Address.employee_address_p_mobile',
			'Rel_Employee_Address.employee_p_house_no',
			'Rel_Emp_Info.employee_name_alias',
			'Rel_Emp_Info.employee_probation_period',	
        		),
		'filename'=>'Employee-List', 'pdfFile'=>'employee.views.employeeTransaction.expenseGridtoReport');
		}
		              return $data;

        }
	/**
	* This method return a list of employee documents based on department and Document category.
	*/
	public function newsearch($department_id,$category_id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_first_name',$this->employee_first_name,true);
		$criteria->select = 'employee_transaction_id,CONCAT_WS(" ",employee_first_name,employee_last_name) as employee_first_name,employee_attendance_card_id,employee_docs.title,employee_docs_submit_date,employee_docs_path,employee_docs_desc,doc_category_id';
		$criteria->alias = 'et';
		$criteria->join='INNER JOIN employee_docs_trans ON employee_docs_trans.employee_docs_trans_user_id =et.employee_transaction_id INNER JOIN employee_info ON employee_info.employee_id =et.employee_transaction_employee_id INNER JOIN employee_docs ON employee_docs.employee_docs_id = employee_docs_trans.employee_docs_trans_emp_docs_id JOIN employee_designation emp_des ON emp_des.employee_designation_id = et.employee_transaction_designation_id';

		$criteria->condition= 'et.employee_transaction_department_id ='.$department_id.' AND employee_docs.doc_category_id = '.$category_id;

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'emp_des.employee_designation_level ASC',
				),
		));

		return $emp_data;
	}
	public function newsearch1($department_id)
	{
		$criteria=new CDbCriteria;
		$criteria->compare('employee_transaction_id',$this->employee_transaction_id);
		$criteria->compare('employee_first_name',$this->employee_first_name,true);
		$criteria->select = 'employee_transaction_id,CONCAT_WS(" ",employee_first_name,employee_last_name) as employee_first_name,employee_attendance_card_id,employee_docs.title,employee_docs_submit_date,employee_docs_path,employee_docs_desc,doc_category_id';
		$criteria->alias = 'et';
		$criteria->join='INNER JOIN employee_docs_trans ON employee_docs_trans.employee_docs_trans_user_id =et.employee_transaction_id INNER JOIN employee_info ON employee_info.employee_id =et.employee_transaction_employee_id INNER JOIN employee_docs ON employee_docs.employee_docs_id = employee_docs_trans.employee_docs_trans_emp_docs_id JOIN employee_designation emp_des ON emp_des.employee_designation_id = et.employee_transaction_designation_id';

		$criteria->condition= 'et.employee_transaction_department_id ='.$department_id;

		$emp_data =  new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'sort'=>array(
				    'defaultOrder'=>'emp_des.employee_designation_level ASC',
				),
		));

		return $emp_data;
	}

	
 }
