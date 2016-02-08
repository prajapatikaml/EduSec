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
	
//===============Student Transaction===============

	 public function actionStudentTransactionExportPdf() 
   	 {
	    	if(isset($_SESSION['Student_records']))
	       	{
		 	$d = $_SESSION['Student_records'];
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
			   
		$html = $this->renderPartial('/studentTransaction/StudentTransactionExportPdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Student Report','Student.pdf',$html);	
	}
	public function actionStudentTransactionExportExcel()
	{
	    	$this->toExcel($_SESSION['Student_records'],
		array(
			'Rel_Stud_Info.student_enroll_no',
			'Rel_Stud_Info.title',
			'Rel_Stud_Info.student_last_name',
			'Rel_Stud_Info.student_first_name',
			'Rel_Stud_Info.student_guardian_name::Guardian Name',
			'Rel_Stud_Info.student_adm_date',
			'Rel_Stud_Info.student_gender',
			'Rel_Stud_Info.student_mobile_no::Mobile Number',
			'Rel_Stud_Info.student_guardian_mobile::Guardian Mobile',
			'Rel_student_academic_terms_name.academic_term_name',
			'Rel_Stud_Info.student_dob',
			'Rel_Nationality.nationality_name',
			'Rel_student_academic_terms_period_name.academic_term_period::Term Period',
			'Rel_Stud_Info.student_guardian_relation::Guardian Relation',
			'Rel_Stud_Info.student_guardian_income::Guardian Income',
			'Rel_Stud_Info.student_guardian_home_address::Guardian Home Address',
			'Rel_Stud_Info.student_guardian_city_pin',
			'Rel_Stud_Info.student_guardian_phoneno',
			'Rel_Stud_Info.student_email_id_1',
			'Rel_Stud_Info.student_bloodgroup',
			'Rel_language.Rel_language_known1.languages_name',
			'Rel_language.Rel_language_known2.languages_name',
			'Rel_Student_Address.student_address_c_line1::Current Address Line1',
			'Rel_Student_Address.student_address_c_line2::Current Address Line2',
			'Rel_Student_Address.Rel_c_city.city_name::Current Address City',
			'Rel_Student_Address.student_address_c_pin::Current Address City Pin ',
			'Rel_Student_Address.Rel_c_state.state_name::Current Address State',
			'Rel_Student_Address.Rel_c_country.name::Current Address Country',
			'Rel_Student_Address.student_address_p_line1::Permanent Address Line1',
			'Rel_Student_Address.student_address_p_line2::Permanent Address Line2',
			'Rel_Student_Address.Rel_p_city.city_name::Permanent Address City',
			'Rel_Student_Address.student_address_p_pin::Permanent Address pincode',
			'Rel_Student_Address.Rel_p_state.state_name::Permanent Address State',
			'Rel_Student_Address.Rel_p_country.name::Permanent Address Country',
			'Rel_Student_Address.student_address_phone',
			'Rel_Student_Address.student_address_mobile',
			'Rel_Status.status_name',
			),
			'studenttransaction',
			array(
			    'creator' => 'Rudrasoftech',
			    'freezePane' => 'A2',
			),
			'Excel5'
		    );
		}
	public function actionStudentdataExportExcel()
	{
		
		$stud_data = StudentTransaction::model()->findAll('student_transaction_organization_id = '.Yii::app()->user->getState('org_id'));
		
		if($stud_data)
		{
	    	$this->toExcel($stud_data,
		array(
			'Rel_Stud_Info.title::Title',
			'Rel_Stud_Info.student_first_name::First Name',
			'Rel_Stud_Info.student_middle_name::Middle Name',
			'Rel_Stud_Info.student_last_name::Surname / Family Name',
			'year1::Year1 (% marks)',
			'year2::Year2 (% marks)',
			'year3::Year3 (% marks)',
			'year4::Year4 (% marks)',
			'year5::Year5 (% marks)',
			'Rel_Stud_Info.student_mother_name::Mother Name',
			'Rel_Stud_Info.student_father_name::Father Name',
			'Rel_Stud_Info.student_guardian_phoneno::Res Phone',
			'Rel_Stud_Info.student_mobile_no::Mobile Number',
			'Rel_Stud_Info.student_gender::Gender',
			'Rel_Stud_Info.student_dob::Date of Birth(dd/mm/yyyy)',
			'program::Program',
			'course::Course',		
			'level::Level',
			'Rel_Stud_Info.student_adm_date::Date of joining(dd/mm/yyyy)',
			'admission::Admitted To',
			'Rel_Stud_Info.student_roll_no::Roll Number',
			'Rel_Stud_Info.student_email_id_1::Email Address',
			'Rel_Religion.religion_name::Religion',
			'Rel_Cast.cast_master_name::Caste',
			'reserve_category::Reserve Category',
			'phy_hand::Is Physically Handicapped',
			'econ_back::Econ Backward',
			'Rel_Stud_Info.student_living_status::Home',
			'institute_fees::Institute Fees Paid',
			'hostel_fees::Hostel Fees/Month',
			'gate_score::Gate Score',
			'gate_exam_number::Gate Exam Number',
			'gate_score_validfrom::Gate Score- Year Valid From',
			'gate_score_validto::Gate Score- Year Valid To',
			'aadharcard::Aadhaar Card',
			'Rel_Stud_Info.student_enroll_no::Enrolment Id(EID)',
				
			),
			'studentdata',
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

//===============Student Attendance===============

 	public function actionAttendenceExportToPdf() 
	{
             	if(isset($_SESSION['attendence']))
               	{
		 	$d = $_SESSION['attendence'];
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
              
		$html = $this->renderPartial('/attendence/expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Attendence Report','Attendence.pdf',$html);
	}
	public function actionAttendenceExportToExcel()
	{
	
		$this->toExcel($_SESSION['attendence'],
		array(
			'rel_atd_student.student_enroll_no',
			'rel_atd_student.student_first_name::Student Name',
			'attendence',
			'rel_atd_employee.employee_first_name::Faculty Name',
			'rel_atd_branch.branch_name::Branch Name',
			'rel_atd_subject.subject_master_name::Subject Name',
			'rel_atd_atn.academic_term_name',
			'rel_atd_sem.academic_term_period::Academic Term',
			'attendence_date',
		),
		'Student Attendence',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}


	public function actionLeftDetainExportToPdf() 
	{
             	if(isset($_SESSION['left_student_data']))
               	{
			$d = $_SESSION['left_student_data'];
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
              
		$html = $this->renderPartial('/leftDetainedPassStudentTable/gridview_export_report', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('LeftDetainPassout Report','LeftDetainPassout.pdf',$html);
		
	}
	public function actionLeftDetainExportToExcel()
	{
	    	$this->toExcel($_SESSION['left_student_data'],
		array(
		'Rel_left_student_id.Rel_Stud_Info.student_roll_no',
		'Rel_left_student_id.Rel_Stud_Info.student_enroll_no',
		'Rel_left_student_id.Rel_Stud_Info.student_first_name',
		'Rel_left_status_id.status_name',
		'Rel_left_sem_id.academic_term_name',
		'Rel_left_academic_term_period_id.academic_term_period',
		'Rel_left_student_id.Rel_Branch.branch_name::Branch',
		'remarks',
		'left_detained_pass_student_cancel_date::Date of Detain/Left',
		'Rel_user.user_organization_email_id::Created By',
		'Rel_organization.organization_name',
		),
		'LeftDetainPassout',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}
	public function actionCancelstudentlistpdf() 
	{
             	if(isset($_SESSION['left_student_data']))
               	{
			$d = $_SESSION['left_student_data'];
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
              
		$html = $this->renderPartial('/leftDetainedPassStudentTable/cancel_student_pdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Cancel Student Admission Report','LeftDetainPassout.pdf',$html);
		
	}	
	public function actionCancelstudentlistexcel()
	{
	    	$this->toExcel($_SESSION['left_student_data'],
		array(
		'Rel_left_student_id.Rel_Stud_Info.student_roll_no',
		'Rel_left_student_id.Rel_Stud_Info.student_enroll_no',
		'Rel_left_student_id.Rel_Stud_Info.student_first_name',
		'Rel_left_status_id.status_name',
		'Rel_left_sem_id.academic_term_name',
		'Rel_left_academic_term_period_id.academic_term_period',
		'Rel_left_student_id.Rel_Branch.branch_name::Branch',
		'remarks',
		'refundable_fees_amount',
		'left_detained_pass_student_cancel_date::Date of Cancellation',
		'Rel_user.user_organization_email_id::Created By',
		'Rel_organization.organization_name',
		),
		'LeftDetainPassout',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );
	}

//===============student sms===============
	public function actionstusmsExportToExcel()
	{
	    	$this->toExcel($_SESSION['stusms_data'],
		array(
			'rel_stud_sms_info.student_enroll_no',
			'rel_stud_sms_info.student_roll_no',
			'rel_stud_sms_info.student_first_name',
			'rel_stu_sms_bid.branch_name',
			'rel_stu_sms_shiftid.shift_type',
			'rel_stu_sms_divid.division_name',
			'rel_stud_acd_tname.academic_term_name',
			'message_email_text',
			'email_sms_status',
			'creation_date',
			'rel_stu_sms_user.user_organization_email_id',
			'rel_stu_sms_org.organization_name::Created By',
			
		
		),
		'StudentSmsEmailDetails',
		array(
		    'creator' => 'Rudrasoftech',
		),
		'Excel5'
	    );
	}
	
	public function actionstusmsExportToPdf() 
	{
             	if(isset($_SESSION['stusms_data']))
              	{
		 	$d = $_SESSION['stusms_data'];
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
		           
		$html = $this->renderPartial('/studentSmsEmailDetails/exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Student Sms Email Details','StudentSmsEmailDetails.pdf',$html);
		
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
	

	public function actionStudentFinalViewExportToPdf($id)
	    {
		$student_docs = StudentDocsTrans::model()->findAll('student_docs_trans_user_id='.$id);	
		$studentqualification = StudentAcademicRecordTrans::model()->findAll('student_academic_record_trans_stud_id='.$id);
		$student_transaction = StudentTransaction::model()->findAll('student_transaction_id='.$id);		 

		$html = $this->renderPartial('/studentTransaction/studentfinalview', array(
		    'student_docs'=>$student_docs,
		    'studentqualification'=>$studentqualification,
		    'student_transaction'=>$student_transaction,
		), true);

		$this->exporttopdf('Stundent Report','StundentFinalView.pdf',$html);	       
	    }
	//feedbackcategorymaster//////////////////////////
	public function actionFeedbackcategoryExportToPdf() 
	{
             	if(isset($_SESSION['feedbackcategory']))
               	{
			$d = $_SESSION['feedbackcategory'];
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
		$html = $this->renderPartial('/feedbackCategoryMaster/FeedbackCategoryGeneratePdf', array(
			'model'=>$model
		), true);
		$this->exporttopdf('Feedback Category Master Report','StudentPerformanceReport.pdf',$html);	       
	}
	public function actionFeedbackcategoryExportToExcel()
	{
	    	$this->toExcel($_SESSION['feedbackcategory'],
		array(
		'feedback_category_name',
		'Rel_user_feedback.user_organization_email_id::Created By',
		//'feedback_category_creation_date',
		'Rel_org_feedback.organization_name',
		),
		'StudentPerformanceReport',
		array(
		    'creator' => 'RudraSoftech',
		),
		'Excel5'
	    );

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
	public function actionstudentcertificateGenerateExcel()
	{
              if(isset($_SESSION['StudentCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['StudentCertificateDetailsTable_records'];
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
              
		
		Yii::app()->request->sendFile("StudentCertificateDetails.xls",
			$this->renderPartial('/studentCertificateDetailsTable/studentcertificateGeneratePdf', array(
				'model'=>$model
			), true)
		);
	}
        public function actionstudentcertificateGeneratePdf() 
	{	
             if(isset($_SESSION['StudentCertificateDetailsTable_records']))
               {
                 $d=$_SESSION['StudentCertificateDetailsTable_records'];
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
              	$html = $this->renderPartial('/studentCertificateDetailsTable/studentcertificateGeneratePdf', array(
			'model'=>$model
		), true);
		
		$this->exporttopdf('Student Certificate Details Report','StudentCertificateDetails.pdf',$html);
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
	public function actionScheduleTimingGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['ScheduleTiming_records']))
               {
                $d=$_SESSION['ScheduleTiming_records'];
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
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("ScheduleTiming.xls",
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionScheduleTimingGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['ScheduleTiming_records']))
               {
                $d=$_SESSION['ScheduleTiming_records'];
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
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('exportGridtoReport', array(
			'model'=>$model
		), true);
		$this->exporttopdf('ScheduleTiming Report','ScheduleTiming.pdf',$html);		
	}
}
