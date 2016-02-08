<?php

class ScheduleTimingController extends EduSecCustom
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
		$model=new ScheduleTiming;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ScheduleTiming']))
		{
			$model->attributes=$_POST['ScheduleTiming'];
			if($model->schedule_timing_minute==60)
			{
			  $minute="*";
			}
			else
			{
			  $minute=$model->schedule_timing_minute;
			}
			if($model->schedule_timing_hour==24)
			{
			  $hour="*";
			}
			else
			{
		          $hour=$model->schedule_timing_hour;
			}
			if($model->schedule_timing_date==32)
			{
				$date="*";
			}
			else
			{
				$date=$model->schedule_timing_date;
			}
			$model->schedule_timing_name=$minute."-".$hour."-".$date."-".$model->schedule_timing_month."-".$model->schedule_timing_day;
			$model->schedule_timing_created_by=Yii::app()->user->id;
			$model->schedule_timing_creation_date=new CDbExpression('NOW()');

			if($model->save())
				$this->redirect(array('view','id'=>$model->schedule_timing_id));
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

		if(isset($_POST['ScheduleTiming']))
		{
			$model->attributes=$_POST['ScheduleTiming'];
			if($model->schedule_timing_minute==60)
			{
			  $minute="*";
			}
			else
			{
			  $minute=$model->schedule_timing_minute;
			}
			if($model->schedule_timing_hour==24)
			{
			  $hour="*";
			}
			else
			{
		          $hour=$model->schedule_timing_hour;
			}
			if($model->schedule_timing_date==32)
			{
				$date="*";
			}
			else
			{
				$date=$model->schedule_timing_date;
			}
			$days=array("Sunday"=>7,"Monday"=>1,"Tuesday"=>2,"Wednesday"=>3,"Thursday"=>4,"Friday"=>5,"Saturday"=>6,"*"=>"*");
			$day=$days[$model->schedule_timing_day];
			$months=array('January'=>1,'February'=>2,'March'=>3,'April'=>4,'May'=>5,'June'=>6,'July'=>7,'August'=>8,'September'=>9,'October'=>10,'November'=>11,'December'=>12,'*'=>'*');
			$month=$months[$model->schedule_timing_month];
		
			$model->schedule_timing_name=$minute."-".$hour."-".$date."-".$model->schedule_timing_month."-".$model->schedule_timing_day;
			if($model->save())
			{
			$crons=StudentSmsEmailDetails::model()->findAll(array('condition'=>'student_sms_email_details_schedule_time_id='.$model->schedule_timing_id));
			$j = count($crons);
			$i = 0;

			foreach($crons as $cron)
			{
			    if($cron->student_sms_email_details_purpose=="fees")
			    {
				$period=$cron->academic_period_id;
				$sem=$cron->academic_name_id;
				$branch=$cron->branch_id;
				$div=$cron->division_id;
				$purpose=$cron->student_sms_email_details_purpose;
				$message=$cron->message_email_text;
				$user=$cron->created_by;
				$to=$cron->student_sms_email_details_fees_msg_type;
				$mobile=$cron->student_sms_email_details_to_mobile;
				$cronid=$cron->student_sms_email_details_cron_no-$i;
				$mycron = new Crontab('my_crontab'); 
				$jobs_obj = $mycron->getJobs();	
				$mycron->removeJob($cronid); 	
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
				StudentSmsEmailDetails::model()->updateCounters(array('student_sms_email_details_cron_no'=>-1),'student_sms_email_details_cron_no>'.$cronid);
				$mycron = new Crontab('my_crontab'); 
				$cron->student_sms_email_details_cron_no=((count($mycron->getJobs())));
				$cron->save();
				$mycron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic feesschedulesms '.$period." ".$sem." ".$branch." ".$div." ".$purpose." \"$message\" ".$user." ".$to." ".$mobile , $minute, $hour,$date,$month,$day);
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
			     }
			     else
			     {
				$period=$cron->academic_period_id;
				$sem=$cron->academic_name_id;
				$branch=$cron->branch_id;
				$div=$cron->division_id;
				$purpose=$cron->student_sms_email_details_purpose;
				$user=$cron->created_by;
				$mobile=$cron->student_sms_email_details_to_mobile;
				$cronid=$cron->student_sms_email_details_cron_no-$i;
				$mycron = new Crontab('my_crontab'); 
				$jobs_obj = $mycron->getJobs();	
				$mycron->removeJob($cronid); 	
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
				StudentSmsEmailDetails::model()->updateCounters(array('student_sms_email_details_cron_no'=>-1),'student_sms_email_details_cron_no>'.$cronid);
				$mycron = new Crontab('my_crontab'); 
				$cron->student_sms_email_details_cron_no=(count($mycron->getJobs()));
				$cron->save();
				$mycron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic attendance '.$period." ".$sem." ".$branch." ".$div." ".$purpose." ".$user." ".$mobile,$minute,$hour,$date,$month,$day);
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
			      }
			$i++;	
			}
			$backup_crons=DatabaseBackupCron::model()->findAll(array('condition'=>'database_backup_cron_schedule_time_id='.$model->schedule_timing_id));
			$j = count($backup_crons);
			$i = 0;

			foreach($backup_crons as $cron)
			{
				$cronid=$cron->database_backup_cron_no-$i;
				$mycron = new Crontab('backup_crontab'); 
				$jobs_obj = $mycron->getJobs();	
				$mycron->removeJob($cronid); 	
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
				DatabaseBackupCron::model()->updateCounters(array('database_backup_cron_no'=>-1),'database_backup_cron_no>'.$cronid);
				$mycron = new Crontab('backup_crontab'); 
				$cron->database_backup_cron_no=((count($mycron->getJobs())));
				$cron->save();
				$mycron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic backup' , $minute, $hour,$date,$month,$day);	
				$mycron->saveCronFile(); 	
				$mycron->saveToCrontab();
				$i++;	
			}
			
				$this->redirect(array('view','id'=>$model->schedule_timing_id));
			}
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
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
                $model=new ScheduleTiming('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScheduleTiming']))
			$model->attributes=$_GET['ScheduleTiming'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new ScheduleTiming('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ScheduleTiming']))
			$model->attributes=$_GET['ScheduleTiming'];

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
		$model=ScheduleTiming::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='schedule-timing-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
	
