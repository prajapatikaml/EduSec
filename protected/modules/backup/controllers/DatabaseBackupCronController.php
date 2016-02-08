<?php

class DatabaseBackupCronController extends EduSecCustom
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
		$model=new DatabaseBackupCron;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['DatabaseBackupCron']))
		{
			$model->attributes=$_POST['DatabaseBackupCron'];
			$data=ScheduleTiming::model()->findByPk($model->database_backup_cron_schedule_time_id);
			
			if($data->schedule_timing_minute==60)
			{
			  $minute="*";
			}
			else
			{
			  $minute=$data->schedule_timing_minute;
			}
			if($data->schedule_timing_hour==24)
			{
			  $hour="*";
			}
			else
			{
		          $hour=$data->schedule_timing_hour;
			}
			if($data->schedule_timing_date==32)
			{
				$date="*";
			}
			else
			{
				$date=$data->schedule_timing_date;
			}
			$days=array("Sunday"=>7,"Monday"=>1,"Tuesday"=>2,"Wednesday"=>3,"Thursday"=>4,"Friday"=>5,"Saturday"=>6,"*"=>"*");
			$day=$days[$data->schedule_timing_day];
			$months=array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12,'*'=>'*');
			$month=$months[$data->schedule_timing_month];	
			$cron = new Crontab('backup_crontab'); // my_crontab file will store all added jobs
			$model->database_backup_cron_no=count($cron->getJobs());
			$model->database_backup_cron_created_by = Yii::app()->user->id;
			$model->database_backup_cron_creation_date = new CDbExpression('NOW()');
			if($model->save())
			    $cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic backup' , $minute, $hour,$date,$month,$day);
			    $cron->saveCronFile(); 	
			    $cron->saveToCrontab();
			$this->redirect(array('view','id'=>$model->database_backup_cron_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

	     if(isset($_POST['DatabaseBackupCron']))
	     {
		$model->attributes=$_POST['DatabaseBackupCron'];
		$data=ScheduleTiming::model()->findByPk($model->database_backup_cron_schedule_time_id);
		
		if($data->schedule_timing_minute==60)
		{
		  $minute="*";
		}
		else
		{
		  $minute=$data->schedule_timing_minute;
		}
		if($data->schedule_timing_hour==24)
		{
		  $hour="*";
		}
		else
		{
	          $hour=$data->schedule_timing_hour;
		}
		if($data->schedule_timing_date==32)
		{
			$date="*";
		}
		else
		{
			$date=$data->schedule_timing_date;
		}
		$days=array("Sunday"=>7,"Monday"=>1,"Tuesday"=>2,"Wednesday"=>3,"Thursday"=>4,"Friday"=>5,"Saturday"=>6,"*"=>"*");
		$day=$days[$data->schedule_timing_day];
		$months=array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12,'*'=>'*');
		$month=$months[$data->schedule_timing_month];
		$cronid=$model->database_backup_cron_no;
		$cron = new Crontab('backup_crontab'); 
		$jobs_obj = $cron->getJobs();	
		$cron->removeJob($model->database_backup_cron_no); 	
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();
		DatabaseBackupCron::model()->updateCounters(array('database_backup_cron_no'=>-1),'database_backup_cron_no>'.$cronid);
		$cron = new Crontab('backup_crontab');
		$model->database_backup_cron_no=count($cron->getJobs());
		$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic backup' , $minute, $hour,$date,$month,$day);
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();
		if($model->save())
			$this->redirect(array('view','id'=>$model->database_backup_cron_id));
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
		$model=$this->loadModel($id);
		$cron = new Crontab('backup_crontab'); 
		$jobs_obj = $cron->getJobs();	
		$cron->removeJob($model->database_backup_cron_no); 			
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();	
		$cronid=$model->database_backup_cron_no;
		DatabaseBackupCron::model()->updateCounters(array('database_backup_cron_no'=>-1),'database_backup_cron_no>'.$cronid);

		// we only allow deletion via POST request
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
	 	  $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new DatabaseBackupCron('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DatabaseBackupCron']))
			$model->attributes=$_GET['DatabaseBackupCron'];

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
		$model=DatabaseBackupCron::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='database-backup-cron-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
	
