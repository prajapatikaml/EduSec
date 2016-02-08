<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class ReportController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Generate Student info report with dynamic field and dynamic serching crieteria.
	 */
	public function actionStudInfoReport()
	{ 
		Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		

		if((!empty($_POST['acdm_period']) || !empty($_POST['gender']) || !empty($_POST['city']) || !empty($_POST['bg']) || !empty($_POST['sem'])) && !empty($_POST['stud_info']))
		{
			
	if(!empty($_POST['acdm_period']))
	{
		$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period']."  AND ";
	}
	if(!empty($_POST['city']))
	{
		$query .="add.student_address_c_city=".$_POST['city']." AND ";
	}

	if(!empty($_POST['gender']))
	{
		$query .="stud_info.student_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="stud_info.student_bloodgroup='".$_POST['bg']."' AND ";
		
	}
	if(!empty($_POST['sem']))
	{
		$query .="stud.student_academic_term_name_id=".$_POST['sem']." AND ";
	}
	if(!empty($_POST['course']))
	{
		$query .="stud.student_transaction_course_id=".$_POST['course']." AND ";
	}

			$selected_list=$_POST['stud_info'];  
			
			$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.'student_transaction_id <> 0 order by student_enroll_no')
					->queryAll();

				$this->render('stud_report_view',array(
			      		'stud_data'=>$student_data,'selected_list'=>$selected_list,'query'=>$query,
		       		));
				
				return;		
			}
				
		$this->render('studinfo_dyanamic_report_form1',array(
               'selected_list'=>$selected_list, 'query' => $query,
       		));
	
	}

	/**
	 * Generate Student info report with dynamic field and dynamic serching crieteria.
	 */
	public function actionSelectedList()
	{
		if(!empty($_REQUEST['studentlistexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('stud_report_view_pdf', array(
			'stud_data'=>$student_data, 
			'selected_list'=>$selected_list,
		), true);
		
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('StudentList Report');
		$pdf->SetSubject('StudentList Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Student Info Report", '');
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
		$pdf->Output("StudentInfoReport.pdf", "I");
	
		}
		else if(!empty($_REQUEST['studentlistexcelexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')

					->where($query.' stud.student_transaction_id<>0 order by student_enroll_no')
					->queryAll();
		  
		  Yii::app()->request->sendFile("StudentInfoReport".'.xls',
			    $this->renderPartial('stud_report_view_excel', array(
				'stud_data'=>$student_data, 
				'selected_list'=>$selected_list,
			    ), true)
			);
		}		
		else
		{		
		$query=$_POST['query'];
		$selected_list=null;
		}
		
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');		
		

	}

	/**
	 * Generate Employee info report with dynamic field and dynamic serching crieteria.
	 */
	public function actionEmployeeInfoReport()
	{
		Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		
    if((!empty($_POST['department'])||!empty($_POST['gender'])||!empty($_POST['city'])|| !empty($_POST['bg'])) && !empty($_POST['emp_info']))
	{
			
	if(!empty($_POST['department']))
	{
		$query .="emp.employee_transaction_department_id=".$_POST['department']." AND ";
	}
	
	if(!empty($_POST['city']))
	{
		$query .="add.employee_address_c_city=".$_POST['city']." AND ";
	}

	if(!empty($_POST['gender']))
	{
		
		$query .="emp_info.employee_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="emp_info.employee_bloodgroup='".$_POST['bg']."' AND";
		
	}
			$selected_list = $_POST['emp_info'];
			$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->join('employee_designation emp_des','emp_des.employee_designation_id = emp.employee_transaction_designation_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')
					->order('emp_des.employee_designation_level asc')
					->where($query.' employee_transaction_id <> 0')
					->queryAll();
											
		$this->render('emp_report_view',array(
              		'emp_data'=>$employee_data,'selected_emp_list'=>$selected_list,'query'=>$query,
       		));
			
			
		}
		else		
		$this->render('empinfo_dyanamic_report_form',array('selected_list'=>$selected_list,'query'=>$query));
	
	}

	/**
	 * Generate Employee info report with dynamic field and dynamic serching crieteria.
	 */
	public function actionSelectedEmployeeList()
	{
		if(!empty($_REQUEST['employeelistexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

					->where($query.' emp.employee_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('emp_report_view_pdf', array(
			'emp_data'=>$employee_data, 
			'selected_emp_list'=>$selected_list,
		), true);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('EmployeeList Report');
		$pdf->SetSubject('EmployeeList Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Employee Info Report", '');
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
		ob_clean();
		$pdf->Output("EmployeeInfoReport.pdf", "I");
	
		}
		else if(!empty($_REQUEST['employeelistexcelexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

					->where($query.' emp.employee_transaction_id<>0')
					->queryAll();
		 Yii::app()->request->sendFile("EmployeeInfoReport".'.xls',
			    $this->renderPartial('emp_report_view_excel', array(
				'emp_data'=>$employee_data, 
				'selected_emp_list'=>$selected_list,
			    ), true)
			);
		}		
		else
		{		
		$query=$_POST['query'];
		$selected_list=null;
		}
		
		$baseUrl = Yii::app()->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');					
	}

     /**
      * Generate report for course details.
      */
     public function actionCourseDetails()
     {
	$courseData = StudentTransaction::model()->findByPk($_REQUEST['id'])->student_transaction_course_id;
	if($courseData != 0) {
	  $courseDetails = CourseMaster::model()->findByPk($courseData);
	  $courseUnits = CourseUnitTable::model()->findAll('course_unit_master_id='.$courseDetails->course_master_id);
	  $this->render('courseDetails',array('courseDetails'=>$courseDetails, 'courseUnits'=>$courseUnits));
	}
	else {
	  $noCourse = "No course assign";
	  $this->render('courseDetails',array('noCourse'=>$noCourse));
	}
	
     }
	
     /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
     protected function performAjaxValidation($model)
     {
		if(isset($_POST['ajax']) && ($_POST['ajax']==='document-search' || $_POST['ajax']==='document-search-emp' || $_POST['ajax']==='emp-id-card' || $_POST['ajax']==='stu-id-card'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    }
}
