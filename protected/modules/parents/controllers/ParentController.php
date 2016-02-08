<?php

class ParentController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionChange()
	{
		$model=ParentLogin::model()->findByPk(Yii::app()->user->id);
		$model->setScenario('change');

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ParentLogin']))
		{
			$model->attributes=$_POST['ParentLogin'];
			$model->parent_password = md5($model->new_pass.$model->new_pass);
			if($model->save())
				$this->redirect(array('/site/newdashboard'));
		}

		$this->render('change_password',array(
			'model'=>$model,
		));
	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='parent-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionStudentprofile()
	{
		$id = Yii::app()->user->getState('stud_id');
		
		$model=StudentTransaction::model()->findByPk($id);
		$info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
		$address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
		$photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$old_photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
		$lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
		$studentdocstrans = new StudentDocsTrans;
		$stud_qua = new StudentAcademicRecordTrans;
		$stud_feed = new FeedbackDetailsTable;
		$studentcertificate=new StudentCertificateDetailsTable;
	        $parent = new ParentLogin;

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
	}
	public function actionStudentcertificate()
	{
	  $id = Yii::app()->user->getState('stud_id');
		
	   $model=StudentTransaction::model()->findByPk($id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
      	   $studentdocstrans = new StudentDocsTrans;
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable('Studentsearch');
	   $parent = new ParentLogin;
	   $studentcertificate->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentCertificateDetailsTable']))
			$studentcertificate->attributes=$_GET['StudentCertificateDetailsTable'];

		 $this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
	}	
	
	public function actionStudentdocs()
	{
	   $id = Yii::app()->user->getState('stud_id');
	   $model=StudentTransaction::model()->findByPk($id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans('mysearch');
	   $parent = new ParentLogin;
	        $studentdocstrans->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$studentdocstrans->attributes=$_GET['StudentDocsTrans'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
	}
	public function actionStudentacademicrecord()
	{
	   $id = Yii::app()->user->getState('stud_id');
	   $model=StudentTransaction::model()->findByPk($id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans;
	   $stud_qua=new StudentAcademicRecordTrans('mysearch');
	   $parent = new ParentLogin;
	   $stud_qua->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentAcademicRecordTrans']))
			 $stud_qua->attributes=$_GET['StudentAcademicRecordTrans'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
	}
	public function actionStudentperformance()
	{
	   $id = Yii::app()->user->getState('stud_id');
	   $model=StudentTransaction::model()->findByPk($id);
	   $info = StudentInfo::model()->findByPk($model->student_transaction_student_id);
	   $address = StudentAddress::model()->findByPk($model->student_transaction_student_address_id);
	   $photo = StudentPhotos::model()->findByPk($model->student_transaction_student_photos_id);
	   $lang = LanguagesKnown::model()->findByPk($model->student_transaction_languages_known_id);
	   $stud_qua = new StudentAcademicRecordTrans;
	   $stud_feed = new FeedbackDetailsTable;
	   $studentcertificate=new StudentCertificateDetailsTable;
	   $studentdocstrans=new StudentDocsTrans;
	   $stud_qua=new StudentAcademicRecordTrans;
	   $stud_feed=new FeedbackDetailsTable('mysearch');
	   $parent = new ParentLogin;
		
	   $stud_feed->unsetAttributes();  // clear any default values
		if(isset($_GET['FeedbackDetailsTable']))
			$stud_feed->attributes=$_GET['FeedbackDetailsTable'];

		$this->render('update',array(
			'model'=>$model,'info'=>$info,'photo'=>$photo,'address'=>$address,'lang'=>$lang,'studentdocstrans'=>$studentdocstrans, 'stud_qua'=>$stud_qua,'stud_feed'=>$stud_feed,'flag'=>0,'studentcertificate'=>$studentcertificate,'parent'=>$parent
		));
	}
	public function actionStudenttimetable() 
	{		
		Yii::app()->clientScript->registerCoreScript('jquery.ui');
		Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().
	'/jui/css/base/jquery-ui.css');
		$model=new TimeTable;
		
		$this->render('student_timetable',array(
			'model'=>$model,
			));		
	}
	public function actionStudentpersonaltimetable()
	{
		$this->layout='//layouts/personal-profile';	
		$model=new TimeTable;
		
		$this->render('student_personal_timetable',array(
			'model'=>$model,
			));		
	}
	public function actionStudentFees()
	{
		$model = new FeesPaymentTransaction;
		
		if(Yii::app()->user->getState('stud_id'))
		{	
			$info_model= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud.student_transaction_id='.Yii::app()->user->getState('stud_id').' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
			$model1=new StudentFeesMaster('student_details_fees');
			if(!empty($info_model))
			{
				$this->render('student_fees_report',array(
				'model'=>$model,'info_model'=>$info_model,'model1'=>$model1,
				));
				
			}
			else
			{
				Yii::app()->user->setFlash('no-student-found', "No student found with this Roll No.");
				$this->redirect(array('StudentFeesReportwithoutform'));	
			}
		}
		else
		{
			$this->redirect(array('error','status'=>'login'));
		}
			
		
	}

	public function actionStudentAttendenceReport()	//done by Ravi B
    	{
	       $model=new Attendence;

			
		if((!empty($_POST['Attendence']['start_date']) && !empty($_POST['Attendence']['end_date'])) || (!empty($_POST['months']) || !empty($_REQUEST['month'])))
		{

			$month = null;
			if(!empty($_REQUEST['en_no']))
			    $en = $_REQUEST['en_no'];
		
			 if(!empty($_REQUEST['month']))
				$month = $_REQUEST['month'];
			   else if(!empty($_POST['months']))
				$month = $_POST['months'];
			  
			$student_data= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_info_transaction_id="'.$_REQUEST['id'].'" and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryRow();



			if(!empty($_POST['studentradio']) && $_POST['studentradio']=='1' )
			{
			
		   	   $start=null;
			   $end=null;
			
			   if(empty($student_data))
			   {
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id']));  
			   }				
			   else if(strtotime($_POST['Attendence']['start_date']) > strtotime($_POST['Attendence']['end_date']))
			   {
			      Yii::app()->user->setFlash('no_student_found', "Start-Date must be less than End-Date.");	
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id'])); 		
			   }	
			   else
			   {
				$new_start=$_POST['Attendence']['start_date'];
				$new_end=$_POST['Attendence']['end_date'];
					
				$start = date("Y-m-d", strtotime($new_start));
				$end = date("Y-m-d", strtotime($new_end));
				$att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'attendence_date >=:date_start and attendence_date <= :date_end and st_id = :stu_id',
					'params'=>array(':date_start'=>$start,':date_end'=>$end,'stu_id'=>$student_data['student_transaction_id'])
));				
				$sem_data = array();	
				
				foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				if($sem_data){
				$sem_array = implode(',',$sem_data);

				$subject_data = Yii::app()->db->createCommand()
		        	->select('*')
				->from('subject_master')
				->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.')')
				->queryAll();

			
				
			$this->render('student_report_view',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,));		
				     }


				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Data Found for this Date range.");
					$this->redirect(array('studentAttendenceReport','id'=>$_REQUEST['id'])); 
				}

			     }
							
			}
			if((!empty($_POST['studentradio']) && $_POST['studentradio']=="2") || $month)
			{
				
			   if(strlen($month) == 1)
				$month = "0".$month;

				$year = date('Y');
				$num = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
				$month_start = '01-'.$month.'-'.$year;
				$month_end = $num.'-'.$month.'-'.$year;
   			 
				$start=null;
				$end=null;

			
			   if(empty($student_data))
			   {
				
			      Yii::app()->user->setFlash('no_student_found', "No Student Found for this Enrollment no.");
			      $this->redirect(array('/studentAttendenceReport','id'=>$_REQUEST['id'])); 
				
			   }
			   else 
			   {
				 
				  $att_info = Attendence::model()->findAll(array(
					'select'=>'sem_name_id',
					'distinct'=>true,
					'condition'=>'month(attendence_date) =:month and year(attendence_date) = :year and st_id = :stu_id',
					'params'=>array(':month'=>$month,':year'=>$year,'stu_id'=>$student_data['student_transaction_id'])
));				
				   $sem_data = array();
				
				   foreach($att_info as $list)
					$sem_data[] = $list['sem_name_id'];
				
				   $sem_array = implode(',',$sem_data);


				if($sem_data)
				{
					
				   $subject_data = Yii::app()->db->createCommand()
		        	   		->select('*')
						->from('subject_master')
						->where('subject_master_id in (select sub_id from attendence where branch_id='.$student_data['student_transaction_branch_id'].' and sem_id='.$student_data['student_academic_term_period_tran_id'].') and subject_master_academic_terms_name_id IN('.$sem_array.') AND subject_master_organization_id='.Yii::app()->user->getState('org_id'))
						->queryAll();
				
				   $new_start=$month_start;
				   $new_end=$month_end;
					
				   $start = date("Y-m-d", strtotime($new_start));
				   $end = date("Y-m-d", strtotime($new_end));
			
				
				   $this->render('monthwise_student_attend',array(
				       'subject_data'=>$subject_data,'student_data'=>$student_data,'start'=>$start,'end'=>$end,'month_value'=>$month,'year'=>$year));	
				}
				else
				{
					Yii::app()->user->setFlash('no_student_found', "No Attendence Found for this Criteria.");
				$this->redirect(array('studentAttendenceReport','id'=>$_REQUEST['id']));  	
				}
			    
			   }		
			}
	
		}//!empty($_POST['Attendence']['student_enroll_no']) if end
		
		else 
		{	
               	$this->render('student_attendence_report',array(
                       'model'=>$model,
               		));		
		}    
       	}
	public function actionMonthview()
	{
		$this->render('month-view',array(
			//'model'=>$this->loadModel($id),
		));
	}

	public function actionMyholidays()
     	{
		$org = Yii::app()->user->getState('org_id');
		if(Yii::app()->user->getState('stud_id')){	
			
		   $trans_id = Yii::app()->user->getState('stud_id');
		   $trans_model = StudentTransaction::model()->findByPk($trans_id);
		   $acdm_model = AcademicTerm::model()->findByPk($trans_model->student_academic_term_name_id);
		   $nat_holidays = NationalHolidays::model()->findAll(array('condition'=>'national_holiday_date between "'.$acdm_model->academic_term_start_date.'" and "'.$acdm_model->academic_term_end_date.'" and national_holiday_org_id='.$org,'order'=>'national_holiday_date'));
		}
		
		
		$this->render('my_holidays',array('date_list'=>$nat_holidays));
		
     	}
     	public function actionMysubjects()
     	{
	   $org = Yii::app()->user->getState('org_id');
	   $sub_model = array();
	   $emp_str = array();
	   if(Yii::app()->user->getState('stud_id')){
	   $trans_id = Yii::app()->user->getState('stud_id');
	   $trans_model = StudentTransaction::model()->findByPk($trans_id);
	
	   $sub_model = SubjectMaster::model()->findAll(array('condition'=>'subject_master_academic_terms_name_id='.$trans_model->student_academic_term_name_id.' and subject_master_branch_id='.$trans_model->student_transaction_branch_id.' and subject_master_organization_id='.$org));

	
	   foreach($sub_model as $list){

	   $subject_data = Yii::app()->db->createCommand()
			->select('employee_first_name')
			->from('assign_subject')
			->join('employee_info','employee_info_transaction_id=subject_faculty_id')
			->where('subject_id='.$list['subject_master_id'])
			->queryAll();
		$data = CHtml::listData($subject_data,'employee_first_name','employee_first_name');
		if($data)
		$emp_str[$list['subject_master_id']] = implode(',',$data);
		else
		$emp_str[$list['subject_master_id']] = "<i>Not Assigned<i>";
	   }

	}
	$this->render('my_subjects',array('sub_model'=>$sub_model,'emp_str_array'=>$emp_str));
	
        }
	public function actionStudenthistory()
	{
		if(!empty($_REQUEST['id']))
		{
			$str = 'stud_info.student_info_transaction_id ='.$_REQUEST['id'];
			$stud_trans= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where($str.' and stud.student_transaction_organization_id='.Yii::app()->user->getState('org_id'))
					->queryAll();
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
	

}
