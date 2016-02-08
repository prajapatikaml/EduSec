<?php

class ReportController extends EduSecCustom
{
	public function actionView()
	{
		$this->render('view');
	}
	
	public $layout='//layouts/column2';
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}
	/*
	  For student information dynamic reports
	*/

	public function actionStudInfoReport()
	{

		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->theme->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		

		if((!empty($_POST['batch']) || !empty($_POST['gender']) || !empty($_POST['city']) || !empty($_POST['bg']) || !empty($_POST['sem'])) && !empty($_POST['stud_info']))
		{
			
	if(!empty($_POST['batch']))
	{
		$query .="stud.student_transaction_batch_id=".$_POST['batch']. " AND ";
	}
	if(!empty($_POST['city']))
	{
		$query .="add.student_address_c_city=".$_POST['city']. " AND ";			
	}

	if(!empty($_POST['gender']))
	{
		$query .="stud_info.student_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="stud_info.student_bloodgroup='".$_POST['bg']."' AND ";
		
	}

			$selected_list=$_POST['stud_info'];  
			
			$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' student_transaction_id<>0 order by student_roll_no')
					->queryAll();


				//$this->layout='timetable_layout';	
						
				$this->render('stud_report_view',array(
			      		'stud_data'=>$student_data,'selected_list'=>$selected_list,'query'=>$query,
		       		));
				
				break;		
			}
				
		$this->render('studinfo_dyanamic_report_form1',array(
               'selected_list'=>$selected_list, 'query' => $query,
       		));
	
	}
	/*
	   For export student information data to pdf and excel format
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
					->where($query.' student_transaction_detain_student_flag in(11)')
					->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('stud_report_view_pdf', array(
			'stud_data'=>$student_data, 
			'selected_list'=>$selected_list,
		), true);
		
		ob_clean();
		$pdf = new ExportToPdf;
		$pdf->exportData('Student Report','Student_report.pdf',$html);		
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

					->where($query.' student_transaction_detain_student_flag in(11) order by student_roll_no')
					->queryAll();
		  
		  Yii::app()->request->sendFile(date('YmdHis').'.xls',
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
		
		$baseUrl = Yii::app()->theme->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');		
		

	}
	/* 
	   for print student id card 
	*/
	public function actionStudentid()
	{
		$model = new IdcardFieldFormat;
		$model->scenario = 'studentid';
		$this->performAjaxValidation($model);
		
		if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']) || !empty($_POST['roll_no']) && !empty($_POST['IdcardFieldFormat']['template_name']))
		{
			//var_dump($_POST['IdcardFieldFormat']['template_name']);
			//print_r($_POST); exit;

			$this->layout='timetable_layout';
			$query=null;
			$s = array();
			$selected_list = array();
			$student_data1 = array();
			if(!empty($_POST['acdm_period']))
			{
			$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period'];	
			}
			
			if(!empty($_POST['branch_name']))
			{
				if(!empty($_POST['div_name']))
				{
					if(!empty($_POST['acdm_period']))
					{
						if(!empty($_POST['acdm_name']))
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name']." and stud.student_academic_term_name_id =".$_POST['acdm_name'];
						}
						else
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
						}
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
					}
				}
				else
				{
					if(!empty($_POST['acdm_period']))
					{
					$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
				}
			}
			
			if(!empty($_POST['enroll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']))
				{
				$query .=" and stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
				else
				{
				$query .="stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
			}
			
			if(!empty($_POST['roll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']))
				{
				$query .=" and stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
				else
				{
				$query .="stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
			}
				$cardfield = Yii::app()->db->createCommand()
						->select('*')
						->from('idcard_field_format')
						->where('idtemplate_name="'.$_POST['IdcardFieldFormat']['template_name'].'"')
						->order('label_priority')
						->queryAll();
			
				foreach($cardfield as $card)
				{
					$selectedfieldname[] = $card['selected_field_name'];
					$selectedfieldlabel[] = $card['selected_field_label'];
				}
				foreach($selectedfieldname as $index=>$name)
				{
					$selected_list[$name]= $selectedfieldlabel[$index];
				}
			
			
			$student_data1 =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($query.' order by student_enroll_no')
					->queryAll();
			
		$this->render('print_idcard',array(
      		'student_data1'=>$student_data1,'selected_list'=>$selected_list,
		));

		}
		else
		{
		$this->render('stud_idgenration',array('model'=>$model));
       		}	
	}
	
	/* 
	   for print employee id card 
	*/	
	
	public function actionEmployeeid()
	{
		$model = new IdcardFieldFormat;
		$model->scenario = 'employeeid';
		$this->performAjaxValidation($model);
		$dept='';
		$cardno='';
	        if(!empty($_POST['department']) || !empty($_POST['employee_card_id']) && !empty($_POST['IdcardFieldFormat']['template_name']))
		{
		  //echo $_POST['employee_card_id'];exit;
		 $this->layout='timetable_layout';
		 $query=null;
		 $employee_data1 = array();
		 $selected_list = array();
		if(!empty($_POST['department']))
			{
			$dept=$_POST['department'];
			$query .="emp.employee_transaction_department_id=".$_POST['department'];
			}
	
		
		if(!empty($_POST['employee_card_id']))
			{
				$cardno=$_POST['employee_card_id'];
				if(!empty($_POST['department']))
				{
				$query .=" and emp_info.employee_attendance_card_id='".$_POST['employee_card_id']."'";
				}
				else
				{
				$query .="emp_info.employee_attendance_card_id='".$_POST['employee_card_id']."'";
				}
			}
		if(!empty($_POST['IdcardFieldFormat']['template_name']))
			{
				$cardfield = Yii::app()->db->createCommand()
						->select('*')
						->from('idcard_field_format')
						->where('idtemplate_name="'.$_POST['IdcardFieldFormat']['template_name'].'"')
						->order('label_priority')
						->queryAll();
			
				foreach($cardfield as $card)
				{
					$selectedfieldname[] = $card['selected_field_name'];
					$selectedfieldlabel[] = $card['selected_field_label'];
				}
				foreach($selectedfieldname as $index=>$name)
				{
					$selected_list[$name]= $selectedfieldlabel[$index];
				}
			}

		$employee_data1 =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')
					->where($query)
					->queryAll();	

				
		$this->render('print_emp_idcard',array(
      		'employee_data1'=>$employee_data1,'selected_list'=>$selected_list,'dept'=>$dept,'cardno'=>$cardno
		));
	
		}
		
		else
		{
		$this->render('emp_idgeneration',array('model'=>$model));
       		}
	}
	/*
	  For employee information dynamic report
	*/
	public function actionEmployeeInfoReport()
	{
		$selected_list=null;
		
		$query=null;	
		$baseUrl = Yii::app()->theme->baseUrl; 
  		$cs = Yii::app()->getClientScript();
  		$cs->registerCssFile($baseUrl.'/css/report.css');
		
    if((!empty($_POST['department'])||!empty($_POST['gender'])||!empty($_POST['city'])||!empty($_POST['category'])||!empty($_POST['bg'])||isset($_POST['typ'])) && !empty($_POST['emp_info']))
	{
			
	if(!empty($_POST['department']))
	{
		$query .="emp.employee_transaction_department_id=".$_POST['department']. " AND ";
	}
	
	if(!empty($_POST['category']))
	{
		$query .="emp.employee_transaction_category_id=".$_POST['category']. " AND ";
	}
	if(!empty($_POST['city']))
	{
		$query .="add.employee_address_c_city=".$_POST['city']. " AND ";
	}

	if(!empty($_POST['gender']))
	{
		
		$query .="emp_info.employee_gender='".$_POST['gender']."' AND ";
		
	}
	if(!empty($_POST['bg']))
	{
		$query .="emp_info.employee_bloodgroup='".$_POST['bg']."' AND ";
		
	}
	
	if(is_numeric($_POST['typ']))
	{
		$query .="emp_info.employee_type='".$_POST['typ']."' AND ";
		
	}
			$selected_list = $_POST['emp_info'];
			$employee_data =Yii::app()->db->createCommand()
					->select('*')
					->from('employee_transaction emp')
					->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
					->join('employee_designation emp_des','emp_des.employee_designation_id = emp.employee_transaction_designation_id')
					->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')
					->order('emp_des.employee_designation_level asc')
					->where($query.' employee_status=0')
					->queryAll();
 		//$this->layout='timetable_layout';
												
		$this->render('emp_report_view',array(
              		'emp_data'=>$employee_data,'selected_emp_list'=>$selected_list,'query'=>$query,
       		));
			
			
		}
		else		
		$this->render('empinfo_dyanamic_report_form',array('selected_list'=>$selected_list,'query'=>$query));
	
	}
	/*
	  for export employee information to pdf and excel
	*/
	public function actionSelectedEmployeeList()
	{
		$query= $_SESSION['query'];
		if(!empty($_REQUEST['employeelistexport']))
		{
		$query= $_SESSION['query'];
		$selected_list=$_SESSION['selected_list'];
		$employee_data =Yii::app()->db->createCommand()
			->select('*')
			->from('employee_transaction emp')
			->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
			->leftJoin('employee_address add', 'add.employee_address_id = emp.employee_transaction_emp_address_id')

			->where($query.' employee_status=0')
			->queryAll();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
		$html = $this->renderPartial('emp_report_view_pdf', array(
			'emp_data'=>$employee_data, 
			'selected_emp_list'=>$selected_list,
		), true);
		
		$pdf = new ExportToPdf;
		$pdf->exportData('Employee Info Report','Employee_info_report.pdf',$html);
	
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

					->where($query.' employee_status=0')
					->queryAll();
		 Yii::app()->request->sendFile(date('YmdHis').'.xls',
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

	/*
	   search attached document for employee
	*/
	public function actionDocumentsearch()
	{
		$model = new DocumentCategoryMaster;
		$model->scenario = 'documentsearch';
		$this->performAjaxValidation($model);	
		if(isset($_POST['DocumentCategoryMaster']))
		{
			if(!empty($_POST['DocumentCategoryMaster']['document_category'])){
			$this->redirect(array('documentsearchview','dept_id'=>$_POST['DocumentCategoryMaster']['department'],'cat_id'=>$_POST['DocumentCategoryMaster']['document_category']));	
			}
			else{
			$this->redirect(array('documentsearchview1','dept_id'=>$_POST['DocumentCategoryMaster']['department']));	
			}
			
		}
		$this->render('document_search',array('model'=>$model));

	}
	public function actionDocumentsearchview1($dept_id)
	{
		$model=new EmployeeTransaction('newsearch1');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction'])) {
			$model->employee_transaction_id=$_GET['EmployeeTransaction']['employee_transaction_id'];
			$model->employee_first_name=$_GET['EmployeeTransaction']['employee_first_name'];
			
		}
		$this->render('document_search_view1',array('model'=>$model,'department_id'=>$dept_id));
	}
	/*
	   display result of above search action
	*/
	public function actionDocumentsearchview($dept_id,$cat_id)
	{
		$model=new EmployeeTransaction('newsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction'])) {
			$model->employee_transaction_id=$_GET['EmployeeTransaction']['employee_transaction_id'];
			$model->employee_first_name=$_GET['EmployeeTransaction']['employee_first_name'];
			
		}
		$this->render('document_search_view',array('model'=>$model,'department_id'=>$dept_id,'category_id'=>$cat_id));
	}
	/*
	   search attached document for student
	*/
	public function actionStudentDocumentsearch()
	{
		$model = new DocumentCategoryMaster;
		$model->scenario = 'studentDocumentsearch';
		$this->performAjaxValidation($model);

		if(isset($_POST['DocumentCategoryMaster']))
		{		
		if(!empty($_POST['DocumentCategoryMaster']['document_category']))
		{
			/*$branch = 0;
			$sem = 0;
			$year = 0;
			if(!empty($_POST['DocumentCategoryMaster']['branch']))
			{
				$branch = $_POST['DocumentCategoryMaster']['branch'];
			}
			if(!empty($_POST['DocumentCategoryMaster']['sem']))
			{
				$sem = $_POST['DocumentCategoryMaster']['sem'];
			}
			if(!empty($_POST['DocumentCategoryMaster']['academic_year']))
			{
				$year = $_POST['DocumentCategoryMaster']['academic_year'];
			}*/


			$this->redirect(array('studentdocumentsearchview','cat_id'=>$_POST['DocumentCategoryMaster']['document_category']));	
		}
		else
		{
			//echo "hi";exit;
			$stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_docs_trans s_doc_tran','s_doc_tran.student_docs_trans_user_id=stud.student_transaction_id')
					->join('student_docs stud_doc', 'stud_doc.student_docs_id = s_doc_tran.student_docs_trans_stud_docs_id')
					->queryAll();
			/* $stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_docs s_doc')
					->join('student_transaction stud','stud.student_transaction_id=s_doc.student_docs_id')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->queryAll();
			*/ 
			//print_r($stud_trans); exit;
			$this->redirect(array('studentdocumentsearchview1','stud_trans'=>$stud_trans));
		}
		}
		$this->render('student_document_search',array('model'=>$model));
	}
	/*
	   display result of above search action
	*/
	public function actionStudentdocumentsearchview($cat_id)
	{
		
		$model=new StudentTransaction('newsearch');
		
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['StudentTransaction']))
 		{
		
			$model->student_transaction_id=$_GET['StudentTransaction']['student_transaction_id'];
			$model->student_first_name=$_GET['StudentTransaction']['student_first_name'];
			
		}
		
		$this->render('student_document_search_view',array('model'=>$model,'cat_id'=>$cat_id));
	}
	public function actionStudentdocumentsearchview1()
	{
		
		$model=new StudentTransaction('newsearch');
		
		$model->unsetAttributes();  // clear any default values
		$stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_docs_trans s_doc_tran','s_doc_tran.student_docs_trans_user_id=stud.student_transaction_id')
					->join('student_docs stud_doc', 'stud_doc.student_docs_id = s_doc_tran.student_docs_trans_stud_docs_id')
					->queryAll();

		$this->render('student_document_search_view1',array('model'=>$model,'stud_trans'=>$stud_trans));
	}
	/*
	   For display History and current progress of the student
	*/
	public function actionStudenthistory()
	{
		if(!empty($_POST['roll_no']) || !empty($_POST['en_no']) || !empty($_REQUEST['id']))
		{
			
			if(!empty($_POST['en_no']))
				$str = 'stud_info.student_enroll_no='.$_POST['en_no'];
			if(!empty($_POST['roll_no']))
				$str = 'stud_info.student_roll_no="'.$_POST['roll_no'].'"';
			if(!empty($_REQUEST['id']))
				$str = 'stud_info.student_info_transaction_id ='.$_REQUEST['id'];
		

			$stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($str)
					->queryAll();
			if(empty($stud_trans))
			{
				Yii::app()->user->setFlash('no-student-found',"No Student Found.");
				$this->redirect(array('studenthistory'));
			}
			
			$transaction_id= $stud_trans[0]['student_transaction_id'];
		
			$stud_archive = StudentArchiveTable::model()->findAll(array('condition'=>'student_archive_stud_tran_id='.$transaction_id));
				
			$this->render('student_history_view',
					array(
						'stud_archive'=>$stud_archive,
						'stud_trans'=>$stud_trans,
					)
			);		
			
		}
		else
		$this->render('student_history');	
	}

       public function actionBranchwiseAllStudentsFeesDetailInfoReport()
    {
	$baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/report.css');
	$model=new FeesPaymentTransaction;
	$yearModel=new Year;
	$branch=null;
	$year = $startYear=$startSem = $result=$resultSem = 0;
	$student=array();
	$sid=array();       
	$k=array();
	$term=array();
	if((!empty($_POST['Year']['year']) && !empty($_POST['FeesPaymentTransaction']['fees_student_branch_id'])) || (!empty($_REQUEST['Year']['year']) && !empty($_REQUEST['FeesPaymentTransaction']['fees_student_branch_id'])))  
        {	    
            $year = $_REQUEST['Year']['year'];  
            $branch = $_REQUEST['FeesPaymentTransaction']['fees_student_branch_id'];
	
	$student= Yii::app()->db->createCommand()
                ->select('student_transaction_id')
                ->from('student_transaction st')
		->join('student_info si','si.student_id=st.student_transaction_student_id')
                ->where('student_transaction_batch_year ='.$year.' AND student_transaction_branch_id ='.$branch.' order by student_enroll_no')
                ->queryAll();
	
	 $startYear= Yii::app()->db->createCommand()
                ->select('sat.fees_academic_period_id')
                ->from('fees_payment_transaction sat')
		->rightJoin('student_transaction st', 'st.student_transaction_id=sat.fees_student_id')
		->join('student_info si', 'si.student_info_transaction_id=sat.fees_student_id')
                ->where('st.student_transaction_batch_year ='.$year.' AND st.student_transaction_branch_id ='.$branch)
                ->queryAll();

	    foreach($startYear as $l)
		$k[] = $l['fees_academic_period_id'];
	    $result = array_unique($k);
	
	    if(isset($_REQUEST['excel']))
            {
		    Yii::app()->request->sendFile(date('YmdHis').'.xls',
		    $this->renderPartial('branchwise_allstudents_fees_detail_info_report_excel',
		    array(
		        'year'=>$year,
		        'branch'=>$branch,
		        'student'=>$student,
		        'yearModel'=>$yearModel,
			'model'=>$model,
			'startYear'=>$result,
			),true));
            }
	    else
	    {
		$this->render('branchwise_allstudents_fees_detail_info_report',
		array(
		      'model'=>$model,
		      'branch'=>$branch,
		      'year'=>$year,
		      'student'=>$student,
		      'startYear'=>$result,
		      ));
	     }		
	}
	else{	
	$this->render('branchwise_allstudents_fees_detail_info_report',
		array('model'=>$model,
		      'branch'=>$branch,
		      'year'=>$year,
		      'student'=>$student,
		      'startYear'=>$result,
		      ));
	}
    }

    public function actionDepartmentwiseEmployeeInfoReport() //code done by janvi.14-2-2014
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/report.css');      
        $model= new Department;
        $employee_data=array();
        $month = null;$month_value=null;$dept=null;$type=null;
    $query=null;
        if(!empty($_POST['months']) || !empty($_REQUEST['months']))
        {
            $month = $_REQUEST['months'];
            if(!empty($_REQUEST['department']))
            {
                $dept = $_REQUEST['department'];
                $query .="emp.employee_transaction_department_id=".$dept. " AND ";
            }
            if(is_numeric($_REQUEST['employee_type']))  
            {
                $type = $_REQUEST['employee_type'];
		
                $query .="emp_info.employee_type=".$type. " AND ";
            }
           $employee_data =Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('employee_transaction emp')
                    ->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
                    ->where($query.' emp.employee_status =0' )
                    ->queryAll();                   
        }
          if(isset($_REQUEST['excel']))
                {
          $employee_data =Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('employee_transaction emp')
                    ->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
                    ->where($query.' emp.employee_status =0' )
                    ->queryAll();                   
         
    Yii::app()->request->sendFile(date('YmdHis').'.xls',
        $this->renderPartial('departmentwise_monthly_empinfo_report_excel', array(
                                'month'=>$_REQUEST['months'],
                'dept'=>$dept,
                'type'=>$type,
                'employee_data'=>$employee_data,                             
                                ),true));

          }    
     $this->render('departmentwise_monthly_empinfo_report',array('employee_data'=>$employee_data,'month'=>$month));
}

    public function actionStudMonthlyAllsubjectAttendenceReport() 
    {
        $baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/report.css');
        $model = new Attendence;
        $this->performAjaxValidation($model);
        $month = null;
        $month_value=null;
        $student=array();
        $subject_data=array();
        $sid=array();
        $subject=0;
        $subjectp=0;
        $subjectidp=array();
        $subjectid=array();
        $batch=0;
       
        if(!empty($_POST['months']) && !empty($_REQUEST['Attendence']['batch_id']) && isset($_POST['Attendence']) || isset($_REQUEST['batch_id']))
        {   
            //print_r ($_POST['Attendence']);exit;   
            $query=null;  
          
            if(!empty($_REQUEST['batch_id']))
            {
                $batch = $_REQUEST['batch_id'];
                $query .="batch_id=".$batch. " AND ";
            }
            else
            {
                $batch =$_POST['Attendence']['batch_id'];
                $query .="batch_id=".$batch. " AND ";
            }
            if(!empty($_POST['months']) || !empty($_REQUEST['month']))
            {
                if(!empty($_REQUEST['month']))
                {
                    $month=$_REQUEST['month'];
                }
                else
                {
                    $month = $_POST['months'];
                }
                $student=Yii::app()->db->createCommand()
                    ->selectDistinct('st_id')
                    ->from('attendence a')
                    ->join('student_transaction st','a.st_id=st.student_transaction_student_id')
                    ->where($query.'  st.student_transaction_detain_student_flag NOT IN (1,2)')
                    ->queryAll();
                //print_r($student);exit;
                foreach($student as $s )
                {
                    //student name
                    $data3 =Attendence::model()->findAll(array('condition'=>'st_id='.$s['st_id']));
                    $stud_name=StudentInfo::model()->findByPk($s['st_id']);
                    $sid[]=$s['st_id'];
                }
                $subject=Yii::app()->db->createCommand()
                    ->selectDistinct('sub_id')
                    ->from('attendence a')
                    ->join('subject_master sub','a.sub_id=sub.subject_master_id')
                    ->where('subject_master_type_id=1')
                    ->queryAll();

               $subject_p=Yii::app()->db->createCommand()
                    ->selectDistinct('sub_id')
                    ->from('attendence a')
                    ->join('subject_master sub','a.sub_id=sub.subject_master_id')
                    ->where('subject_master_type_id=2')
                    ->queryAll();
                foreach($subject as $sub)
                {
                    $sub_name=SubjectMaster::model()->findByPk($sub['sub_id']);
                    $subjectid[]=$sub['sub_id'];
                  
                }
        foreach($subject_p as $sub)
        {
            $sub_name=SubjectMaster::model()->findByPk($sub['sub_id']);
            $subjectidp[]=$sub['sub_id'];
       
        }
            }
        // .......export excel.....      
        if(isset($_REQUEST['excel']))
        {
            Yii::app()->request->sendFile(date('YmdHis').'.xls',
        $this->renderPartial('stud_monthly_allsubject_attendence_report_excel', array(
                                'month'=>$month,
                                'sid'=>$sid,
                                'batch'=>$batch,
                                'subjectid'=>$subjectid,
                		'subjectidp'=>$subjectidp,
                                ),true));
        }
        else
        $this->render('stud_monthly_allsubject_attendence_report_view',array('model'=>$model,'month'=>$month,'sid'=>$sid,'batch'=>$batch,'subjectid'=>$subjectid,'subjectidp'=>$subjectidp));
      

        } //main if
                  
        else
        {
            $this->render('stud_monthly_allsubject_attendence_report_view',array('model'=>$model,'month'=>$month,'sid'=>$sid,'batch'=>$batch,'subjectid'=>$subjectid,'subjectidp'=>$subjectidp));
        }

    }
	
    public function actionDailyDivisionwiseStudentAttendenceReport()// code by janvi
    {
        $model= new TimeTableDetail;
        $this->performAjaxValidation($model);
        $sem=0;
        $branch=0;
        $date=null;
        $lecture=0;
        $student=array();
       
        $sid=array();
       
        if(!empty($_REQUEST['TimeTableDetail']['branch_id']) && !empty($_POST['TimeTableDetail']['lecture_date']) && isset($_POST['TimeTableDetail'])|| isset($_REQUEST['branch_id']))
        {
            $query=null;
            if(!empty($_REQUEST['branch_id']))
            {
                $branch = $_REQUEST['branch_id'];
                $query .="branch_id=".$branch. " AND ";
            }
            else
            {
                $branch =$_POST['TimeTableDetail']['branch_id'];
                $query .="branch_id=".$branch. " AND ";
            }
            if(!empty($_REQUEST['acdm_name_id']))
            {
                $sem = $_REQUEST['acdm_name_id'];
                $query .="acdm_name_id=".$sem;
            }   
            else
            {
                $sem =$_POST['TimeTableDetail']['acdm_name_id'];
                $query .="acdm_name_id=".$sem;
            }
          
                if(!empty($_REQUEST['lecture_date']))
                {
                    $date=date_format(new DateTime($_REQUEST['lecture_date']), 'Y-m-d');                       
                }
                else
                {
                    $date=date_format(new DateTime($_POST['TimeTableDetail']['lecture_date']), 'Y-m-d');               
                }
           
            $lecture=Yii::app()->db->createCommand()
                    ->selectDistinct('No_of_Lec')
                    ->from('time_table t')
                    ->join('time_table_detail td','t.timetable_id=td.timetable_id')
                    ->where($query)
                    ->queryScalar();
	
            $student=Yii::app()->db->createCommand()
                    ->selectDistinct('student_id')
                    ->from('student_info st_info')
                    ->join('student_transaction st','st_info.student_id=st.student_transaction_student_id')
                    ->where('st.student_transaction_branch_id='.$branch.' AND st.student_academic_term_name_id='.$sem.' AND st.student_transaction_detain_student_flag NOT IN (1,2)')
                    ->queryAll();   
              
                foreach($student as $s )
                {
                    $stud_name=StudentInfo::model()->findByPk($s['student_id']);
                    $sid[]=$s['student_id'];
                }
                       
            //}
            if(isset($_REQUEST['excel']))
            {
                //echo "hi";exit;
                Yii::app()->request->sendFile(date('YmdHis').'.xls',
            $this->renderPartial('daily_divisionwise_stud_attendence_report_excel', array(
                                    'date'=>$date,
                                    'branch'=>$branch,
                                    'sem'=>$sem,
                                    'lecture'=>$lecture,
                                    'sid'=>$sid,
                                    ),true));
            }
            else
       
            $this->render('daily_divisionwise_stud_attendence_report',array('model'=>$model,'date'=>$date,'branch'=>$branch,'sem'=>$sem,'lecture'=>$lecture,'sid'=>$sid));
                       
        }
        else
        {
            $this->render('daily_divisionwise_stud_attendence_report',array('model'=>$model,'date'=>$date,'branch'=>$branch,'sem'=>$sem,'lecture'=>$lecture,'sid'=>$sid));
        }       

    }
 	/*
	 not in use
	*/		
	public function actionPostLabelStudent()
	{
	
	if(!empty($_POST['roll_no']) && !empty($_POST['stud_info']))
	{
		$query=null;
		$selectedlist = null;
		$student_data = null;
			if(!empty($_POST['roll_no']))
			{
				$query .="stud_info.student_roll_no='".$_POST['roll_no']."'";
			}
		if(!empty($_POST['stud_info']))
		{
			$selectedlist = $_POST['stud_info'];
		}
		$student_data =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->leftJoin('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
					->where($query.' and stud.student_transaction_detain_student_flag=5')
					->queryAll();

		$this->render('postaladdress_layout',
					array(
						'student_data'=>$student_data,
						'selectedlist'=>$selectedlist,
					)
			);
	}
	
	else
	{
	$this->render('postaladdress',array());
	}
     }
    /*
	   display current semester holidays
    */	
     public function actionMyholidays()
     {
		$org = Yii::app()->user->getState('org_id');
		if(Yii::app()->user->getState('stud_id')){	
			
		   $trans_id = Yii::app()->user->getState('stud_id');
		   $trans_model = StudentTransaction::model()->findByPk($trans_id);
		   $acdm_model = AcademicTerm::model()->findByPk($trans_model->student_academic_term_name_id);
		   $nat_holidays = NationalHolidays::model()->findAll(array('condition'=>'national_holiday_date between "'.date_format(new DateTime($acdm_model->academic_term_start_date), 'Y-m-d').'" and "'.date_format(new DateTime($acdm_model->academic_term_end_date),'Y-m-d').'" and national_holiday_org_id='.$org,'order'=>'national_holiday_date'));		}
		else{

		   $date_yr = date('Y');
		   $nat_holidays = NationalHolidays::model()->findAll(array('condition'=>'year(national_holiday_date)='.$date_yr ,'order'=>'national_holiday_date'));
		}
		
		$this->render('my_holidays',array('date_list'=>$nat_holidays));
		
     }
     /*
	   display current semester student subjects
     */
     public function actionMysubjects()
     {
	$sub_model = array();
	$emp_str = array();
	
	$trans_id = $_REQUEST['id'];
	$trans_model = StudentTransaction::model()->findByPk($trans_id);
	$course_id = Yii::app()->db->createCommand()
			->select('c.course_id')
			->from('course as c')
			->join('batch as b','b.course_id=c.course_id')
			->join('student_transaction','b.batch_id=student_transaction_batch_id')
			->where('student_transaction_id='.$trans_id)
			->queryRow();

	$sub_model = Yii::app()->db->createCommand()
		->select('*')
		->from('subject_master')
		->join('coursewise_subject_table','couse_subject_sub_id=subject_master_id')
		->where('couse_subject_course_id='.$course_id['course_id'])
		->queryAll();
	//print_r($sub_model);exit;

	//$sub_model = SubjectMaster::model()->findAll(array('condition'=>'subject_master_course_id ='.$course_id['course_id']));
	/*foreach($sub_model as $list){

	$subject_data = Yii::app()->db->createCommand()
			->select('concat(employee_first_name," ",employee_last_name,"(",employee_name_alias,")") as emp_name')
			->from('assign_subject')
			->join('employee_info','employee_info_transaction_id=subject_faculty_id')
			->where('subject_id='.$list['subject_master_id'])
			->queryAll();
		$data = CHtml::listData($subject_data,'emp_name','emp_name');
		if($data)
		$emp_str[$list['subject_master_id']] = implode(',',$data);
		else
		$emp_str[$list['subject_master_id']] = "<i>Not Assigned<i>";
	

	}*/
	//$this->render('my_subjects',array('sub_model'=>$sub_model,'emp_str_array'=>$emp_str));
	$this->render('my_subjects',array('sub_model'=>$sub_model));
     }
     
     public function actionStudentidcard(){
		$model = new IdcardFieldFormat;
		$model->scenario = 'studentid';
		$this->performAjaxValidation($model);
		
		if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']) || !empty($_POST['roll_no']) && !empty($_POST['IdcardFieldFormat']['template_name']))
		{
			
			$this->layout='timetable_layout';
			$query=null;
			$s = array();
			$selected_list = array();
			$student_data1 = array();
			if(!empty($_POST['acdm_period']))
			{
			$query .="stud.student_academic_term_period_tran_id=".$_POST['acdm_period'];	
			}
			
			if(!empty($_POST['branch_name']))
			{
				if(!empty($_POST['div_name']))
				{
					if(!empty($_POST['acdm_period']))
					{
						if(!empty($_POST['acdm_name']))
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name']." and stud.student_academic_term_name_id =".$_POST['acdm_name'];
						}
						else
						{
							$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
						}
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name']." and stud.student_transaction_division_id=".$_POST['div_name'];
					}
				}
				else
				{
					if(!empty($_POST['acdm_period']))
					{
					$query .=" and stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
					else
					{
					$query .="stud.student_transaction_branch_id=".$_POST['branch_name'];
					}
				}
			}
			
			if(!empty($_POST['enroll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']))
				{
				$query .=" and stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
				else
				{
				$query .="stud_info.student_enroll_no='".$_POST['enroll_no']."'";
				}
			}
			
			if(!empty($_POST['roll_no']))
			{
				if(!empty($_POST['acdm_period']) || !empty($_POST['branch_name']) || !empty($_POST['enroll_no']))
				{
				$query .=" and stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
				else
				{
				$query .="stud_info.student_roll_no='".$_POST['roll_no']."'";
				}
			}
				$cardfield = Yii::app()->db->createCommand()
						->select('*')
						->from('idcard_field_format')
						->where('idtemplate_name="'.$_POST['IdcardFieldFormat']['template_name'].'" and idcard_org_id='.Yii::app()->user->getState('org_id'))
						->order('label_priority')
						->queryAll();
			
				foreach($cardfield as $card)
				{
					$selectedfieldname[] = $card['selected_field_name'];
					$selectedfieldlabel[] = $card['selected_field_label'];
				}
				foreach($selectedfieldname as $index=>$name)
				{
					$selected_list[$name]= $selectedfieldlabel[$index];
				}
			
			
			$student_data1 =Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($query.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id').' order by student_enroll_no')
					->queryAll();
			
		$this->render('studIDCard',array(
      		'student_data1'=>$student_data1,'selected_list'=>$selected_list,
		));

		}
		else
		{
		$this->render('stud_idgenration',array('model'=>$model));
       		}	
	}	

	public function actionYearlyBranchwiseAllstudentsInfoReport()
    	{       
		$model=new StudentArchiveTable;
		$yearModel = new Year;
		$this->performAjaxValidation($model);
		$branch=null;
		$year = $startYear = $result = 0;
		$student=array();
		$sid=array();       
		$k=array();

	if((!empty($_POST['Year']['year']) && !empty($_POST['StudentArchiveTable']['student_archive_branch_id'])) || (!empty($_REQUEST['Year']['year']) && !empty($_REQUEST['StudentArchiveTable']['student_archive_branch_id'])))  
        {
	    
            $year = $_REQUEST['Year']['year'];  
            $branch = $_REQUEST['StudentArchiveTable']['student_archive_branch_id'];
                               
            $student= Yii::app()->db->createCommand()
                ->select('student_transaction_id')
                ->from('student_transaction')
                ->where('student_transaction_batch_year ='.$year.' AND student_transaction_branch_id ='.$branch)
                ->queryAll();

            $startYear= Yii::app()->db->createCommand()
                ->select('sat.student_archive_ac_t_p_id')
                ->from('student_archive_table sat')
		->rightJoin('student_transaction st', 'st.student_transaction_id=sat.student_archive_stud_tran_id')
		->join('student_info si', 'si.student_info_transaction_id=sat.student_archive_stud_tran_id')
                ->where('st.student_transaction_batch_year ='.$year.' AND st.student_transaction_branch_id ='.$branch.' AND si.student_dtod_regular_status = "Regular"')
                ->queryAll();

	    foreach($startYear as $l)
		$k[] = $l['student_archive_ac_t_p_id'];
	    $result = array_unique($k);

            if(isset($_REQUEST['excel']))
            {
		    Yii::app()->request->sendFile(date('YmdHis').'.xls',
		    $this->renderPartial('yearly_branchwise_allstudents_info_report_excel',
		    array(
		        'year'=>$year,
		        'branch'=>$branch,
		        'sid'=>$student,
		        'yearModel'=>$yearModel,
			'startYear'=>$result,
		        ),true));
            }
            else           
            	$this->render('yearly_branchwise_allstudents_info_report',array('model'=>$model,'branch'=>$branch,'sid'=>$student,'year'=>$year,'student'=>$student, 'yearModel'=>$yearModel,'startYear'=>$result));

        }
        else
        {
            $this->render('yearly_branchwise_allstudents_info_report',array('model'=>$model,'branch'=>$branch,'sid'=>$student,'year'=>$year,'student'=>$student, 'yearModel'=>$yearModel, 'startYear'=>$result));
        }

    }


     protected function performAjaxValidation($model)
     {
		if(isset($_POST['ajax']) && ($_POST['ajax']==='document-search' || $_POST['ajax']==='document-search-emp' || $_POST['ajax']==='emp-id-card' || $_POST['ajax']==='stu-id-card'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
    }

	public function actionHostelRoomAllocatoin()
	{
		$model = new HostelRoomMaster;
		$hostelid=null;
		$blockid=null;
		if(isset($_POST['HostelRoomMaster']) || !empty($_POST['HostelRoomMaster']['hostel_hostelinfo_id'])) 
		{
			$hostelid = $_POST['HostelRoomMaster']['hostel_hostelinfo_id'];
			$blockid = $_POST['HostelRoomMaster']['hostel_block_id'];

		}
		
		if(isset($_REQUEST['excel']))
		{
		    Yii::app()->request->sendFile(date('YmdHis').'.xls',
		$this->renderPartial('hostelRoomAllocation_excel',
			array('model'=>$model,'hostelid'=>$_REQUEST['hostelid'],'blockid'=>$_REQUEST['blockid']),true));
		}
			$this->render('hostelRoomAllocation',array('model'=>$model,'hostelid'=>$hostelid,'blockid'=>$blockid));
		}
    public function actionEmployeeLeaveInfoReport()//code done by janvi kapopara
    {
	$baseUrl = Yii::app()->baseUrl;
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($baseUrl.'/css/report.css');
	$model= new Department;
	$dept=null;
       	$employee=array();
	$month=null;
	$yr=null;
	$leave=0;
	$query=null;
	
	if( !empty($_POST['year']) || !empty($_REQUEST['year']) )
	{
	   $yr = $_REQUEST['year'];
	  if( !empty($_REQUEST['months']) )
          {
		$month = $_REQUEST['months'];		
	    if(!empty($_REQUEST['department']))
	    {       
		$dept= $_REQUEST['department'];
		$query .= "emp.employee_transaction_department_id=".$dept. " AND ";
	    }
		$employee =Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('employee_transaction emp')
                    ->join('employee_info emp_info', 'emp_info.employee_id = emp.employee_transaction_employee_id')
                    ->where($query. '  emp.employee_status =0 order by employee_first_name' )
                    ->queryAll(); 
		
		 $leave=Yii::app()->db->createCommand()
                    ->select('leave_master_category,leave_master_id')
                    ->from('leave_master lm')
                    ->queryAll();	    	
	  }
	}
	if(isset($_REQUEST['excel']))
        {	
	            Yii::app()->request->sendFile(date('YmdHis').'.xls',
        $this->renderPartial('employee_leave_info_report_excel', array(
                                'month'=>$_REQUEST['months'],
				'employee'=>$employee,
				'yr'=>$yr,
				'dept'=>$dept,
				'leave'=>$leave,
                             ),true));
        }    
	$this->render('employee_leave_info_report',array('employee'=>$employee,'month'=>$month,'yr'=>$yr,'leave'=>$leave,'dept'=>$dept));	
    }

	}
