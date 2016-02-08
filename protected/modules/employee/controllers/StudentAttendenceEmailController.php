<?php

class StudentAttendenceEmailController extends RController
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
			'rights',  // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GeneratePdf','GenerateExcel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmployeeTransaction('smssearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('select_employee',array(
			'model'=>$model,
			));
	}
	public function actionEmployeeChecked()
	{
	  $model=new StudentAttendenceEmail;
	  $model->scenario='selectedsms';
	  $this->performAjaxValidation($model);
          if(isset($_POST['StudentAttendenceEmail'])) {
	    $model->attributes=$_POST['StudentAttendenceEmail'];
	    if(empty($model->student_attendence_email_branch_id))
	    {
		$branch=0;	
		$model->student_attendence_email_branch_id=0;	
	    } 
	    else
	     	$branch= $model->student_attendence_email_branch_id;
	    $minute=$model->student_attendence_email_minute;
	    $hour=$model->student_attendence_email_hour;
            $orgid= Yii::app()->user->getState('org_id');	
	    $model->student_attendence_email_org_id = $orgid;
	    $model->student_attendence_email_creation_date = new CDbExpression('NOW()');
	    $model->student_attendence_email_created_by = Yii::app()->user->id;
            $emp_ids = $_POST['result']; 
	    foreach ($emp_ids as $item) {
		$model->setIsNewRecord(true);
		$model->student_attendence_email_id=null;
		$model->student_attendence_email_emp_id=$item;
		$cron = new Crontab('mail_crontab'); 
		$model->student_attendence_email_cron_no=count($cron->getJobs());
		$model->save();
		$jobs_obj = $cron->getJobs();
		$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic attendancemail '.$orgid." ".$branch." ".$item , $minute, $hour,"*","*","1-6");
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();
	    }	
	       $this->redirect(array('admin'));	
	  }
	      else {
		  if(!empty($_POST['selectedempid'])) 
		  {
		     $emp_data =explode(',', $_POST['selectedempid']);		
		     $this->render('branch_selection',array('list'=>$emp_data,'model'=>$model));
	 	  }
		  else {
		     $this->redirect(array('create'));	
		  }
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

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['StudentAttendenceEmail']))
		{
		   $model->attributes=$_POST['StudentAttendenceEmail'];
		   if(empty($model->student_attendence_email_branch_id))
		   {
			$branch=0;	
			$model->student_attendence_email_branch_id=0;	
		   } 
		   else
		     	$branch= $model->student_attendence_email_branch_id;
		   if($model->save())
		   {
			$cron = new Crontab('mail_crontab'); 
			$jobs_obj = $cron->getJobs();	
			$cron->removeJob($model->student_attendence_email_cron_no); 	
			$cron->saveCronFile(); 	
			$cron->saveToCrontab();
			$emp=$model->student_attendence_email_emp_id;
			$cronid=$model->student_attendence_email_cron_no;
			$orgid=$model->student_attendence_email_org_id;
			
			StudentAttendenceEmail::model()->updateCounters(array('student_attendence_email_cron_no'=>-1),'student_attendence_email_cron_no>'.$cronid);
			$cron = new Crontab('mail_crontab'); 
			$model->student_attendence_email_cron_no=count($cron->getJobs());
			$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic attendancemail '.$orgid." ".$branch." ".$emp , $model->student_attendence_email_minute, $model->student_attendence_email_hour,"*","*","1-6");
			$cron->saveCronFile(); 	
			$cron->saveToCrontab();

				$this->redirect(array('view','id'=>$model->student_attendence_email_id));
		 }
		}
		     $emp_data =array($model->student_attendence_email_emp_id);
		     $this->render('branch_selection',array('list'=>$emp_data,'model'=>$model));
	 }	

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			// we only allow deletion via POST request
			$model=$this->loadModel($id);
			$cron = new Crontab('mail_crontab'); 
			$jobs_obj = $cron->getJobs();	
			$cron->removeJob($model->student_attendence_email_cron_no); 				$cron->saveCronFile(); 	
			$cron->saveToCrontab();	
			$cronid=$model->student_attendence_email_cron_no;
			StudentAttendenceEmail::model()->updateCounters(array('student_attendence_email_cron_no'=>-1),'student_attendence_email_cron_no>'.$cronid);
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                $model=new StudentAttendenceEmail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentAttendenceEmail']))
			$model->attributes=$_GET['StudentAttendenceEmail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new StudentAttendenceEmail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentAttendenceEmail']))
			$model->attributes=$_GET['StudentAttendenceEmail'];

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
		$model=StudentAttendenceEmail::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-attendence-email-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        }
	
