<?php

class ExportToPDFExcelController extends RController
{
	public $layout='//layouts/column2';

	 //Uncomment the following methods and override them if needed
	
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	 public function behaviors()
	 {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	 }
	

//===============Employee Transaction===============
 	
	public function actionEmployeeExportToPdf() 
	{
		if(isset($_SESSION['employee_records']))
		{
		 	$d = $_SESSION['employee_records'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item)
		{
		    $model[] = $item->attributes;
		}
               }
              
		$html = $this->renderPartial('/employeeTransaction/expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Employee Report','Employee.pdf',$html);
	}

	public function actionEmployeeExportToExcel()
	{
	    	$this->toExcel($_SESSION['employee_records'],
		array(
		'Rel_Emp_Info.employee_no',
		'Rel_Emp_Info.title',
		'Rel_Emp_Info.employee_last_name::Last Name',
		'Rel_Emp_Info.employee_first_name::First Name',
		'Rel_Emp_Info.employee_middle_name::Middle Name',
		'Rel_Emp_Info.employee_joining_date',
		'Rel_Emp_Info.employee_type',
		'Rel_Emp_Info.employee_private_mobile::Private Mobile',	
		'Rel_Designation.employee_designation_name::Designation',
		'Rel_Department.department_name::Department',	
		'Rel_Emp_Info.employee_private_email::Private Email',
		'Rel_Shift.shift_type::Shift',
		'Rel_Emp_Info.employee_dob::Birthdate',
		'Rel_Emp_Info.employee_birthplace::BirthPlace',
		'Rel_Emp_Info.employee_gender::Gender',
		'Rel_Emp_Info.employee_bloodgroup::Bloodgroup',	
		'Rel_Nationality.nationality_name::Nationality',
		'Rel_Emp_Info.employee_marital_status',
		'Rel_Religion.religion_name',
		'Rel_Emp_Info.employee_pancard_no',
		'Rel_Emp_Info.employee_account_no::Bank Acc. No',
		'Rel_Category.category_name::Category',
		'Rel_Emp_Info.employee_organization_mobile::Organization Mobile',
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
		'Rel_Emp_Info.employee_faculty_of::Faculty Of',
		'Rel_Emp_Info.employee_curricular',
		'Rel_Emp_Info.employee_project_details',
		'Rel_Emp_Info.employee_technical_skills',
		'Rel_Emp_Info.employee_hobbies',		
		'Rel_Lang.Rel_Langs1.languages_name',
		'Rel_Lang.Rel_Langs2.languages_name',
		'Rel_Lang.Rel_Langs3.languages_name',
		'Rel_Lang.Rel_Langs4.languages_name',
		'Rel_Emp_Info.employee_reference',
		'Rel_Emp_Info.employee_refer_designation',
		'Rel_Employee_Address.employee_address_c_line1::Current Address Line1',
		'Rel_Employee_Address.employee_address_c_line2::Current Address Line2',
		'Rel_Employee_Address.Rel_c_city.city_name::Current Address City',
		'Rel_Employee_Address.employee_address_c_pincode',
		'Rel_Employee_Address.Rel_c_state.state_name::Current Address State',
		'Rel_Employee_Address.Rel_c_country.name::Current Address Country',
		'Rel_Employee_Address.employee_address_p_line1::Parmenent Address Line1',
		'Rel_Employee_Address.employee_address_p_line2::Parmenent Address Line2',			
		'Rel_Employee_Address.Rel_p_city.city_name::Parmenent Address City',
		'Rel_Employee_Address.Rel_p_state.state_name::Parmenent Address State',
		'Rel_Employee_Address.Rel_p_country.name::Parmenent Address Country',		
		'Rel_Employee_Address.employee_address_phone',
		'Rel_Employee_Address.employee_address_mobile',
		'Rel_Emp_Info.employee_name_alias',
		'Rel_Emp_Info.employee_probation_period',
		),
		'Employee',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
		/*  Teaching staff detail report */
	public function actionEmployeedataExportToExcel()
	{
		 
	 	 $des_name = "L.A.";
		 $designation = EmployeeDesignation::model()->findByAttributes(array('employee_designation_name'=>$des_name,'employee_designation_organization_id'=>Yii::app()->user->getState('org_id')));
		 $des_id = $designation['employee_designation_id'];
		 if($des_id)
		 {
		 $org = Yii::app()->user->getState('org_id');
		 $emp_data = EmployeeTransaction::model()->findAll(array('condition' => 't.employee_transaction_designation_id <> :name and t.employee_transaction_organization_id = :org and employee_transaction_id IN(select employee_info_transaction_id from employee_info where employee_type =1)',
'params' => array(':name' => $des_id,':org'=>$org)));
		if($emp_data)
		{
	    	$this->toExcel($emp_data,
		array(
			'Rel_Emp_Info.title::Title',
			'Rel_Emp_Info.employee_last_name::Surname',
			'Rel_Emp_Info.employee_first_name::First Name',
			'Rel_Emp_Info.employee_middle_name::Middle Name',
			'Rel_Emp_Info.employee_gender::Gender',
			'Rel_Emp_Info.employee_middle_name::Father Name',
			'Rel_Emp_Info.employee_mother_name::Mother Name',
			
			'Rel_Employee_Address.employee_address_c_line1::Address Line 1',
			'Rel_Employee_Address.employee_address_c_line2::Address Line 2',
			'Rel_Employee_Address.employee_address_c_pincode::Postal Code',
			'Rel_Employee_Address.Rel_c_city.city_name::City/Village',
			'Rel_Employee_Address.Rel_c_state.state_name::State',
			'Rel_Religion.religion_name::Religion',
			'Rel_Category.category_name::Caste',
			'Rel_Emp_Info.employee_dob::Date of Birth',
			'Rel_Emp_Info.employee_pancard_no::PAN',
			'std_code::STD Code',
			'landline::Land Line #',
			'Rel_Emp_Info.employee_private_mobile::Mobile Phone #',
			'Rel_Emp_Info.employee_private_email::Email Address',
			'fax_phone::Fax Phone #',
			'Rel_Designation.employee_designation_name::Exact Designation',
			'applointment::Appointment FT/PT',
			'gross_per_month::Gross Pay Per Month',
			'appointment_type::Appointment Type',
			'faculty_type::Faculty Type',
			'payscale::PayScale',
			'programme::Programme',
			'course::Course',
			'salary_mode::Salary Mode',
			'pf_number::PF Number',	
			'Rel_Emp_Info.employee_joining_date::Date of Joining',		
			'doctrate_degree::Doctorate Degree',
			'pg_degree::PG Degree',
			'ug_degree::UG Degree',
			'other_qualification::Other Qualification',
			'area_specialization::Area Of Specialization',
			'teaching_exp::Teaching Experiece In Years',
			'total_exp::Total Experiece In Years',
			'research_exp::Research Experience in Years',
			'Rel_Emp_Info.employee_account_no::BankAccountNumber',
			'bank_name::BankName',
			'bank_branch_name::Bank Branch Name',
			'ifsc_code::IFSC Code',
			'national_publication::National Publications',
			'patent::Patents',
			'no_pg_prj_guided::No. Of PG Project Guided:',
			'no_dr_prj_guided::No. Of PG Doctorate Guided',
			'international_publication::International Publications',
			'no_of_books_pub::No Of books Published',
			'Physical_hd::Is Physically handicapped',
			'minority_indicator::Minority Indicator',
			'fy_teacher::First Yr Teacher',
			'fy_common_teacher::FY/Common Subject Teacher?',
			'fy_common_subject::FY/Common Subject',
			'expert_mem_aicte::Would you like to work as Expert Member on various committees of AICTE',
			'aicte_grant_apply::Have you ever applied to AICTE for any grants/assistance',
			'basic_pay_rs::Basic Pay in Rs.',
			'da::DA %',
			'hra_rs::HRA in Rs.',
			'other_allowance_rs::Other Allowances in Rs.',
		),
		'Employeedata',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );	
		}	
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
		}
		else
		{
			echo "No data Found"."</br>";
			echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard'));
			break;

		}
	}
	//===============Employee Attendance===============
	public function actionEmployeeAttendenceExportToPdf() 
	{
             	if(isset($_SESSION['employee_attendence']))
               	{
                	
		 	$d = $_SESSION['employee_attendence'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
	      
              
		$html = $this->renderPartial('/employeeAttendence/expenseGridtoReport', array(
			'model'=>$model,
		), true);
		
		$this->exporttopdf('Employee Attendence Report','EmployeeAttendence.pdf',$html);
		
	}
	public function actionEmployeeAttendenceExportToExcel()
	{
	
		$this->toExcel($_SESSION['employee_attendence'],
		array(
			'Rel_Emp_Info.employee_no',
			'Rel_Emp_Info.employee_attendance_card_id',
			'attendence',
			'Rel_Emp_Info.employee_first_name',
			'date',
			'total_hour',
			'time1',
			'time2',
			'overtime_hour',
			
		),
		'Employee Attendence',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
//===============Employee sms===============
	public function actionempsmsExportToExcel()
	{
	    	$this->toExcel($_SESSION['empsms_data'],
		array(
			'rel_emp_sms_info.employee_no',
			'rel_emp_sms_info.employee_attendance_card_id',
			'rel_emp_sms_info.employee_first_name::Employee Name',
			'rel_emp_sms_bid.branch_name::BranchName',
			'rel_emp_sms_shiftid.shift_type',
			'rel_emp_sms_divid.department_name::Department',
			'message_email_text',
			'email_sms_status',
			'creation_date',
			'rel_emp_sms_user.user_organization_email_id::Created By',
			
		
		),
		'EmployeeSmsEmailDetails',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionempsmsExportToPdf() 
	{
             	if(isset($_SESSION['empsms_data']))
              	{
		 	$d = $_SESSION['empsms_data'];
		 	$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/employeeSmsEmailDetails/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Employee Sms Email Details','EmployeeSmsEmailDetails.pdf',$html);
	}
	public function actionFeedbackMasterExportToPdf() 
	{
             	if(isset($_SESSION['feedback_records']))
               	{
			$d = $_SESSION['feedback_records'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/feedbackMaster/feedbackMasterGeneratePDF', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Feedback Report','Feedback.pdf',$html);
	}
	public function actionFeedbackMasterExportToExcel()
	{
	    	$this->toExcel($_SESSION['feedback_records'],
		array(
		'feedback_start_date',
		'feedback_end_date',
		'feedback_name',
		'Rel_emp_id.employee_first_name',
		'Rel_branch_id.branch_name',
		'Rel_academic_term_id.academic_term_name',
		'Rel_academic_term_period_id.academic_terms_period_name',
		'Rel_subject_id.subject_master_name',
		'Rel_department_id.department_name',
		'remark',
		'Rel_org.organization_name',
		
		),
		'Feedback',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionEmployeeFinalViewExportToPdf($id)
	{
		$employee_transaction = EmployeeTransaction::model()->findAll(' 	employee_transaction_id='.$id);
		$employee_docs = EmployeeDocsTrans::model()->findAll('employee_docs_trans_user_id='.$id);
		$employee_qual = EmployeeAcademicRecordTrans::model()->findAll('employee_academic_record_trans_user_id='.$id);
		$employee_exp = EmployeeExperienceTrans::model()->findAll('employee_experience_trans_user_id='.$id);

		$html = $this->renderPartial('/employeeTransaction/employeeFinalView', array(
		    'employee_docs'=>$employee_docs,
		    'employee_qual'=>$employee_qual,
		    'employee_transaction'=>$employee_transaction,
		    'emp_exp'=>$employee_exp,
		), true);
		$this->exporttopdf('Employee Report','Employee.pdf',$html);	              
	}
		public function actiondocumentExportToPdf() 
	{
             	if(isset($_SESSION['document']))
               	{
			$d = $_SESSION['document'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/documentCategoryMaster/documentGeneratePDF', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Document Report','Document.pdf',$html);
	}
	public function actiondocumentExportToExcel()
	{
	    	$this->toExcel($_SESSION['document'],
		array(
		'doc_category_name',
		//'creation_date',
		
		'Rel_document_user.user_organization_email_id::Created By',
		'Rel_document_org.organization_name',
		),
		'Document_Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionCertificateExportToPdf() 
	{
             	if(isset($_SESSION['certificate']))
               	{
			$d = $_SESSION['certificate'];
			$model = array();

			if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

			foreach ($d->data as $item) {
		    	$model[] = $item->attributes;
			}
               }
              
		$html = $this->renderPartial('/certificate/certificateGeneratepdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Certificate Report','Certificate.pdf',$html);
	}
	public function actionCertificateExportToExcel()
	{
	    	$this->toExcel($_SESSION['certificate'],
		array(
		'certificate_title',
		'certificate_type',
		//'certificate_content',
		'Rel_user.user_organization_email_id::Created By',
		'Rel_org.organization_name',
		),
		'Document_Category',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionEmpcertificateGenerateExcel()
	{
              if(isset($_SESSION['EmployeeCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['EmployeeCertificateDetailsTable_records'];
		 $model = array();

			if($d->data)
				$model[]=array_keys($d->data[0]->attributes);//headers: cols name
				else
				{
					$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
					exit;			
				}

			foreach ($d->data as $item) {
			    $model[] = $item->attributes;
			}
               }
		Yii::app()->request->sendFile("EmployeeCertificateDetails.xls",
			$this->renderPartial('/employeeCertificateDetailsTable/empcertificateGeneratePdf', array(
				'model'=>$model
			), true)
		);
	}
        public function actionEmpcertificateGeneratePdf() 
	{	
             if(isset($_SESSION['EmployeeCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['EmployeeCertificateDetailsTable_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
               }
              $html = $this->renderPartial('/employeeCertificateDetailsTable/empcertificateGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('EmployeeCertificateDetails Report','EmployeeCertificateDetailsTable.pdf',$html);
	}
	
	protected function exporttopdf($title,$filename,$html)
	{
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

		 ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, $title, '');
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 15);
		$pdf->SetFont('dejavusans', '', 7);
		$resolution= array(150, 150);
		$pdf->AddPage('P', $resolution);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output($filename, "I");
	}
}
