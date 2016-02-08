<?php

class CertificateController extends EduSecCustom
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));		
		
	}
	
	/**
	 * Displays student certificate
	 * @param integer $id the certificate from gridview
	 */
	public function actionCertiview($id)
	{
		$data=StudentCertificateDetailsTable::model()->findByPk($id);
		$studData = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$data->student_certificate_details_table_student_id));
		$baseUrl = Yii::app()->baseUrl; 
	  	$cs = Yii::app()->getClientScript();
	  	$cs->registerCssFile($baseUrl.'/css/certificate.css');
		
		$this->layout = "reciept_layout";
			
		$this->render('certificateWithheaderSingle1',array(
				'certiId'=>$data->student_certificate_details_table_id,
				'issuedate'=>$data->student_certificate_created_by,
				'stud_info'=>$studData,
				'prnt'=>1,
				'certificate_type'=>$data->student_certificate_type_id,
			));
			Yii::app()->end();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Certificate;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Certificate']))
		{
			$model->attributes=$_POST['Certificate'];
			$model->certificate_organization_id=yii::app()->user->getState('org_id');
			$model->certificate_created_by=Yii::app()->user->id;
			$model->certificate_creation_date=new CDbExpression('NOW()');
			if($model->save())
				$this->redirect('admin');
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/*
	For student certificate generation
	*/
	public function actionCertificategeneration()
	{
		$model = new Certificate;
		$model->scenario = 'certificategeneration';	
		$this->performAjaxValidation($model);
		$en_no = null;	
		$certificate_type = null;
		if(!empty($_POST['Certificate']['branch_name']) && !empty($_POST['Certificate']['academic_term_period']) && !empty($_POST['Certificate']['certificatetype']) && !empty($_REQUEST['type'])) {	
			$model->attributes=$_POST['Certificate'];
			
			$info_model=StudentTransaction::model()->findAll('student_transaction_branch_id ='.$model->branch_name.' AND student_academic_term_period_tran_id = '.$model->academic_term_period.'  AND student_academic_term_name_id ='.$model->academic_term_name);
			if(empty($info_model))
			{
				Yii::app()->user->setFlash('no-student-found', "No student found with this criteria");
				$this->redirect(array('Certificategeneration'));	
			}

			$baseUrl = Yii::app()->baseUrl; 
	  		//$cs = Yii::app()->getClientScript();
	  		//$cs->registerCssFile($baseUrl.'/css/certificate.css');
		
			$this->layout = "reciept_layout";
			if($_POST['print_on'] ==1)
	     		{   
			$this->render('certificateWithheaderMulti',array(
				'model'=>$model,
				'studModel'=>$info_model,
			
			));
			Yii::app()->end();
			}
			else
			{
			$this->render('certificateWithheaderMulti_letterpad',array(
				'model'=>$model,
				'studModel'=>$info_model,
			
			));
			Yii::app()->end();

			}
		}
		else
		$this->render('generate_certificate',array(
			'en_no'=>$en_no,
			'model'=>$model,
			'certificate_type'=>$certificate_type
		));	
	}
	
	/*
	For employee certificate generation
	*/
	public function actionEmployeeCertificategeneration()
	{
		$model=new Certificate;	
		$model->scenario = 'employeeCertificategeneration';	
		$this->performAjaxValidation($model);
		$attendence_no=null;	
		$certificate_type=null;
		if((!empty($_POST['Certificate']['attendenceno']) && !empty($_POST['Certificate']['certificatetype'])) || (!empty($_REQUEST['id']) && !empty($_REQUEST['eno'])))
		{
			if(!empty($_POST['Certificate']['attendenceno']))			 
			$attendence_no=$_POST['Certificate']['attendenceno'];
			
			
			if(!empty($_REQUEST['eno']))
			$attendence_no=$_REQUEST['eno'];
			
			if(!empty($_POST['Certificate']['certificatetype']))			 
			$certificate_type=$_POST['Certificate']['certificatetype'];	
			if(!empty($_REQUEST['id']))
			$certificate_type=$_REQUEST['id'];	
			
			$info_model=EmployeeInfo::model()->findByAttributes(array('employee_attendance_card_id'=>$attendence_no));

			if(empty($info_model))
			{
				Yii::app()->user->setFlash('No-Employee-Found', "No Employee found with this Attendance Card No.");
					$this->redirect(array('EmployeeCertificategeneration'));	
			}

			if(!empty($info_model))
			{
				
	$emp_trans_model=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_employee_id'=>$info_model->employee_id));
			
				if(empty($emp_trans_model))
				{
					Yii::app()->user->setFlash('No-Employee-Found', "No Employee found with this No.");
					$this->redirect(array('EmployeeCertificategeneration'));
				}
			}
				
			$baseUrl = Yii::app()->baseUrl; 
	  		$cs = Yii::app()->getClientScript();
	  		$cs->registerCssFile($baseUrl.'/css/certificate.css');
		
			$this->layout = "reciept_layout";
			
			$this->render('emp_certificate_layout_final',array(
					'attendence_no'=>$attendence_no,
					'certificate_type'=>$certificate_type,
				));
					
		}
		else if(!empty($_REQUEST['sctid']))
		{
		   $empcertificate=EmployeeCertificateDetailsTable::model()->findByPk($_REQUEST['sctid']);	
		   $certificate_type=$empcertificate->employee_certificate_type_id;
		   $emp=$empcertificate->employee_certificate_details_table_emp_id;	
		   $attendance_no=EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$emp))->employee_attendance_card_id;
		   $baseUrl = Yii::app()->baseUrl; 
	  	   $cs = Yii::app()->getClientScript();
	  	   $cs->registerCssFile($baseUrl.'/css/certificate.css');
		
		   $this->layout = "reciept_layout";
		   $this->render('emp_certificate_layout_final',array(
				'attendence_no'=>$attendance_no,
				'certificate_type'=>$certificate_type,
			));
		}

		else
		$this->render('employee_certificate_generate',array(
			'attendence_no'=>$attendence_no,
			'model'=>$model,
			'certificate_type'=>$certificate_type,
		));	
	}
	// generate certificate
	
	public function actiongeneratecertificate()
	{
		$en_no=null;	
		$certificate_type=null;
		if(!empty($_POST['en_no']) && !empty($_POST['certificate_type']))
		{
			$en_no=$_POST['en_no'];	
			$certificate_type=$_POST['certificate_type'];
			$baseUrl = Yii::app()->baseUrl; 
	  		$cs = Yii::app()->getClientScript();
	  		$cs->registerCssFile($baseUrl.'/css/certificate.css');
			$this->render('generate_certificate',array(
				'en_no'=>$en_no,
				'certificate_type'=>$certificate_type
			));		
		}
		else
		$this->render('generate_certificate',array(
			'en_no'=>$en_no,
			'certificate_type'=>$certificate_type
		));	
	}
	public function actionselectedfield()
	{
		$en_no=$_POST['en_no'];	
		$certificate_type=$_POST['certificate_type'];
		if(!empty($_POST['stud_info']))
		{
			$this->layout = "reciept_layout";
			$selected_list=$_POST['stud_info']; 
			$certificate_stud_info = Yii::app()->db->createCommand()
						->select('*')
						->from('student_transaction stud')
						->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
						->join('student_address add', 'add.student_address_id = stud.student_transaction_student_address_id')
						->where('stud_info.student_enroll_no='.$en_no)
						->queryAll();

			//print_r($certificate_stud_info);exit;
			$this->render('certificate_layout',array(
			'en_no'=>$en_no,
			'certificate_type'=>$certificate_type,
			'selected_list'=>$selected_list,
			'certificate_stud_info'=>$certificate_stud_info,
			));	
		}
		else
		{
		$baseUrl = Yii::app()->baseUrl; 
	  		$cs = Yii::app()->getClientScript();
	  		$cs->registerCssFile($baseUrl.'/css/certificate.css');
		
		$this->render('generate_certificate',array(
			'en_no'=>$en_no,
			'certificate_type'=>$certificate_type
		));	
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Certificate']))
		{
			$model->attributes=$_POST['Certificate'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->certificate_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	   $stud_certificate=StudentCertificateDetailsTable::model()->findByAttributes(array('student_certificate_type_id'=>$id));
	   $emp_certificate=EmployeeCertificateDetailsTable::model()->findByAttributes(array('employee_certificate_type_id'=>$id));	
 	
	   if(!empty($stud_certificate) || !empty($emp_certificate))
	   {
	   	throw new CHttpException(400,'You can not delete this record because it is used in another table.');
	   }	
	   else
	   {
	   	// we only allow deletion via POST request
	   	$this->loadModel($id)->delete();
	   }
	
	   // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	   if(!isset($_GET['ajax']))
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Certificate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Certificate']))
			$model->attributes=$_GET['Certificate'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Certificate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='certificate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/*
	*To save geneated certficate of student
	*/
	public function actionSaveStudentCertificatedata()
	{

		$student_certificate = new StudentCertificateDetailsTable;

		$student_transaction_id = $_REQUEST['stid'];
		$semData = StudentTransaction::model()->findByPk($_REQUEST['stid'])->student_academic_term_name_id;
		$ctype = $_REQUEST['ctype'];
		
		$student_certificate->student_certificate_details_table_student_id = $student_transaction_id;
		$student_certificate->student_semester_id = $semData;
		$student_certificate->student_certificate_type_id = $ctype;
		$student_certificate->student_certificate_creation_date = new CDbExpression('NOW()');
		$student_certificate->student_certificate_created_by = Yii::app()->user->id;
		$student_certificate->save(false);
		$this->redirect(array('student/studentCertificateDetailsTable/admin'));

	}
	
	/*
	*To save geneated certficate of employee
	*/
	public function actionSaveEmployeeCertificatedata()
	{

		$emp_certificate = new EmployeeCertificateDetailsTable;

		$emp_transaction_id = $_REQUEST['emp_id'];
		$ctype = $_REQUEST['ctype'];
		
		$emp_certificate->employee_certificate_details_table_emp_id = $emp_transaction_id;
		$emp_certificate->employee_certificate_type_id = $ctype;
		$emp_certificate->employee_certificate_creation_date = new CDbExpression('NOW()');
		$emp_certificate->employee_certificate_created_by = Yii::app()->user->id;
		$emp_certificate->employee_certificate_org_id = yii::app()->user->getState('org_id');
		$emp_certificate->save();
		$this->redirect(array('/employee/employeeCertificateDetailsTable/admin'));

	}

	/*
	*To geneate single certficate for particular student with enrollment  no  
	*/
	public function actionSingleCertificate()
	{
	  if(!empty($_POST['Certificate']['EnrollmentNo']) && !empty($_POST['Certificate']['certificatetype']) && !empty($_REQUEST['type'])) {
		 $studData = StudentInfo::model()->findByAttributes(array('student_enroll_no'=>$_POST['Certificate']['EnrollmentNo']));
		$baseUrl = Yii::app()->baseUrl; 
	     $cs = Yii::app()->getClientScript();
	    // $cs->registerCssFile($baseUrl.'/css/certificate.css');
	   // $cs->registerCssFile($baseUrl.'/css/print.css');
  	     $this->layout = "reciept_layout";
	     if($_POST['print_on'] ==1)
	     {   	     
	        $this->render('certificateWithheaderSingle',array(
		'en_no'=>$_POST['Certificate']['EnrollmentNo'],
		'certificate_type'=>$_POST['Certificate']['certificatetype'],
		'stud_info'=>$studData,
	     ));
	     Yii::app()->end();
	     }
	     else
	     {
		 $this->render('certificateWithheaderSingle1',array(
		'en_no'=>$_POST['Certificate']['EnrollmentNo'],
		'certificate_type'=>$_POST['Certificate']['certificatetype'],
		'stud_info'=>$studData,
	     ));
	     Yii::app()->end();
	     }
	  }
	  else
	     $this->redirect(array('certificategeneration'));	
	}

}
