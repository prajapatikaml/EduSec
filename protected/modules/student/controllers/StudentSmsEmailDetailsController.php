<?php

class StudentSmsEmailDetailsController extends EduSecCustom
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
	public function actions()
	{
		return array(
		        'toggle'=>'ext.jtogglecolumn.ToggleAction',
		        'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
		);
    	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentSmsEmailDetails;
		$stud_trans=new StudentTransaction;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['StudentSmsEmailDetails']))
		{
			$model->attributes=$_POST['StudentSmsEmailDetails'];
			$branch_id=$model->branch_id;
			$acdm_name_id=$model->academic_name_id;
			$shift_id=$model->shift_id;
			$division_id=$model->division_id;
			$sms_email_status=$model->email_sms_status;
			$stud_ids = Yii::app()->db->createCommand()
					    ->select('student_transaction_id,student_transaction_student_id,student_transaction_branch_id ,student_transaction_shift_id,student_academic_term_period_tran_id, student_academic_term_name_id')
					    ->from('student_transaction')			    			   
					    ->where('student_academic_term_name_id='.$acdm_name_id.' and student_transaction_shift_id='.$shift_id.' and student_transaction_branch_id='.$branch_id)
					    ->queryAll();
			
			$count = count($stud_ids);
			for($i=0;$i<$count;$i++)
			{ 
				$model->setIsNewRecord(true);
				$model->student_sms_email_id=null;				
				$stud_id = $stud_ids[$i]['student_transaction_id'];
				$model->student_id = $stud_id;
				$model->created_by = Yii::app()->user->id;
				$model->creation_date = new CDbExpression('NOW()');
				$model->save();
			}
			
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionScheduleFeesMessage()
	{
	   $model=new StudentSmsEmailDetails;
	   $model->scenario = 'scheduleFeesMessage';
	   $this->performAjaxValidation($model);
	   if(isset($_POST['StudentSmsEmailDetails']))
	   {
	       	$model->attributes=$_POST['StudentSmsEmailDetails'];
		$data=ScheduleTiming::model()->findByPk($model->student_sms_email_details_schedule_time_id);
			
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
		$mobile=$model->student_sms_email_details_to_mobile;
		if(empty($model->student_sms_email_details_course_id))
		{
			$course=0;	
			$model->student_sms_email_details_course_id=0;	
		}
		else
		$course= $model->student_sms_email_details_course_id;
		if(empty($model->student_sms_email_details_batch_id))
		{
			$batch=0;	
			$model->student_sms_email_details_batch_id=0;	
		}
		else
		$batch= $model->student_sms_email_details_batch_id;
		$model->email_sms_status=1; 	
		$model->student_sms_email_details_schedule_flag=1;
		$model->student_sms_email_details_purpose="fees";
		$model->created_by=  Yii::app()->user->id;
		$userid=Yii::app()->user->id;	
		$model->creation_date=new CDbExpression('NOW()');
		$purpose=$model->student_sms_email_details_purpose;
		$message=$model->message_email_text;
		$to=$model->student_sms_email_details_fees_msg_type;
		$cron = new Crontab('my_crontab'); // my_crontab file will store all added jobs
		$jobs_obj = $cron->getJobs(); // previous jobs saved in my_crontab
		$model->student_sms_email_details_cron_no=count($cron->getJobs());
		$model->save(false);	
		$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic feesschedulesms '.$course." ".$batch." ".$purpose." \"$message\" ".$userid." ".$to." ".$mobile,$minute,$hour,$date,$month,$day);
       		$cron->saveCronFile(); 	
		$cron->saveToCrontab();	
		$this->redirect(array('scheduleMessages'));
		}
		$this->render('schedulesms',array(
			'model'=>$model,
			));
	}
	public function actionScheduleAttendanceMessage()
	{
	   $model=new StudentSmsEmailDetails;
	   $model->scenario = 'scheduleAttendanceMessage';
	
	   $this->performAjaxValidation($model);
	   if(isset($_POST['StudentSmsEmailDetails']))
	   {
	        $model->attributes=$_POST['StudentSmsEmailDetails'];
			
	        $data=ScheduleTiming::model()->findByPk($model->student_sms_email_details_schedule_time_id);
			
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

		$mobile=$model->student_sms_email_details_to_mobile;
		if(empty($model->student_sms_email_details_course_id))
		{
			$course=0;	
			$model->student_sms_email_details_course_id=0;	
		}
		else
		$course= $model->student_sms_email_details_course_id;
		if(empty($model->student_sms_email_details_batch_id))
		{
			$batch=0;	
			$model->student_sms_email_details_batch_id=0;	
		}
		else
		$batch= $model->student_sms_email_details_batch_id;
		$model->email_sms_status=1; 	
		$model->student_sms_email_details_schedule_flag=1;
		$model->student_sms_email_details_purpose="attendance";
		$model->created_by=  Yii::app()->user->id;
		$userid=Yii::app()->user->id;	
		$model->creation_date=new CDbExpression('NOW()');
		$purpose=$model->student_sms_email_details_purpose;
		$cron = new Crontab('my_crontab'); // my_crontab file will store all added jobs
		$model->student_sms_email_details_cron_no=count($cron->getJobs());
		$model->save(false);	
		$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic attendance '.$course." ".$batch." ".$purpose." ".$userid." ".$mobile,$minute,$hour,$date,$month,$day);
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();			
		
		$this->redirect(array('scheduleMessages'));
		}
		$this->render('attendanceMessage',array(
			'model'=>$model,
			));
	}
	
	public function actionScheduleMessages()
	{
		$model=new StudentSmsEmailDetails('schedulesearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentSmsEmailDetails']))
			$model->attributes=$_GET['StudentSmsEmailDetails'];

		$this->render('schedulemessages',array(
			'model'=>$model,
		));
	}


	public function actionMycreate()
	{
	   $model=new StudentSmsEmailDetails;
	   $stud_trans=new StudentTransaction;
	   $model->scenario = 'mycreate';
	   // Uncomment the following line if AJAX validation is needed
	   $this->performAjaxValidation($model);
	  
	if(isset($_POST['StudentSmsEmailDetails']))
	{
	  $model->attributes=$_POST['StudentSmsEmailDetails'];
	  $course_id=$model->student_sms_email_details_course_id;
	  $batch_id=$model->student_sms_email_details_batch_id;
	  $sms_email_status=$model->email_sms_status;
	  $query='';
	  if(!empty($batch_id))
	    $query.='student_transaction_batch_id='.$batch_id;
	  
	  $stud_ids = Yii::app()->db->createCommand()
		    ->select('student_transaction_id,student_transaction_student_id')
		    ->from('student_transaction')			    			   
		    ->where($query)
		    ->queryAll();
	   $count = count($stud_ids);
	   for($i=0;$i<$count;$i++)
	   { 
		$model->setIsNewRecord(true);
		$model->student_sms_email_id=null;				
		$stud_id = $stud_ids[$i]['student_transaction_id'];
		$model->student_id = $stud_id;
		$model->created_by = Yii::app()->user->id;
		$model->creation_date = new CDbExpression('NOW()');
		$model->save();
	   }
	   if(!empty($stud_ids))
	   {
	      if($sms_email_status == 2) {
		foreach($stud_ids as $stud_info_ids)
		{
		   if(!empty(StudentInfo::model()->findByPk($stud_info_ids['student_transaction_student_id'])->student_email_id_2))
			$info_id[] = StudentInfo::model()->findByPk($stud_info_ids['student_transaction_student_id'])->student_email_id_2;
		}
		$this->actionBackground($info_id,$model->message_email_text);				
		//exit;
			
	      } 
	     else {
		foreach($stud_ids as $stud_info_ids)
			$phone_nos[] = StudentInfo::model()->findByPk($stud_info_ids['student_transaction_student_id'])->student_mobile_no;
			$this->actionBackgroundmsg($phone_nos,$model->message_email_text);
	   	 }
	   }
	   else
	   {
	     Yii::app()->user->setFlash('selection-error', "No student Found with this critaria");
	   }
	}

		$this->render('my_create',array(
			'model'=>$model,
		));
	}
		
	public function actionStudentBulkSmsEmail()
	{
		$model=new StudentTransaction('smssearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('select',array(
			'model'=>$model,
			));

	}

	public function actionDoChacked()
	{ 
	  $model=new StudentSmsEmailDetails;
	  $model->scenario='selectedsms';
	  $this->performAjaxValidation($model);
	  Yii::app()->clientScript->registerScript("message-script", "
	   $(document).ready(function() {
	   $('input.radio').bind('change', function (){
	    if($(this).val()=='1')
		$('#StudentSmsEmailDetails_message_email_text').attr('maxlength','160');		    else
		$('#StudentSmsEmailDetails_message_email_text').attr('maxlength','');
           });
	  });
	  ", CClientScript::POS_END);
	  if(isset($_POST['StudentSmsEmailDetails'])) {
	    $model->attributes=$_POST['StudentSmsEmailDetails'];
	    $stud_ids = $_POST['result']; 
	    $message=$model->message_email_text;
	    $sms_email_status=$model->email_sms_status;
	    if($sms_email_status==1)
	    {
		if($model->student_sms_email_details_to_mobile==1)
		{	
			foreach ($stud_ids as $item) 
				$num_list[]=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$item))->student_mobile_no;
		}
		else
		{
			foreach ($stud_ids as $item) 
				$num_list[]=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$item))->student_guardian_mobile;
		}		
		$output = implode(",",$num_list);
		$smsobj=new SmsApi;
		$r=$smsobj->sendsms($output,$message);
		if(preg_match('/alert_/',$r))
		{ 
		   echo 'Message sucessfully sent';
		   $i=0;
		   foreach($stud_ids as $item)
		   {
			$model->student_sms_email_id=null;				
			$model->student_id = $item;	
			$model->created_by = Yii::app()->user->id;
			$model->creation_date = new CDbExpression('NOW()');
			$tran=StudentTransaction::model()->findByPk($item);
			$model->student_sms_email_details_batch_id=$tran->student_transaction_batch_id;
			$model->student_sms_email_details_ack="sent";
			$model->setIsNewRecord(true);
			$model->save();
			$i++;
		  }
	   	$this->redirect(array('admin'));		
		}
		else
		{
		   $this->render('error_form',array('error'=>$r));
		}
	}
	if($sms_email_status==2)
	{
	  foreach($stud_ids as $stud_info_ids)
	  {
	       if(!empty(StudentInfo::model()->findByPk($stud_info_ids['student_transaction_student_id'])->student_email_id_2))
		 $email_list[] = StudentInfo::model()->findByPk($stud_info_ids['student_transaction_student_id'])->student_email_id_2;
	  }
	$output = implode(",",$email_list);
	$to = $output;

	$mailobj=new MailApi;

	$mailobj->sendmail($to,$message);
	foreach($stud_ids as $item)
	{
	  $model->student_sms_email_id=null;				
	  $model->student_id = $item;	
	  $model->created_by = Yii::app()->user->id;
	  $model->creation_date = new CDbExpression('NOW()');
	  $tran=StudentTransaction::model()->findByPk($item);
	  $model->student_sms_email_details_batch_id=$tran->student_transaction_batch_id;
	  $model->setIsNewRecord(true);
	  $model->save();
	}	
	$this->redirect(array('admin'));	
	}
 	}
	else {
	   if(!empty($_POST['selectedstudentid'])) {
	     $stud_data =explode(',', $_POST['selectedstudentid']); 
	     	
	     $this->render('message_form',array('list'=>$stud_data,'model'=>$model));
 	   }
	   else {
	   	$this->redirect(array('studentbulksmsemail'));	
	   }
	}
	}


	public function actionBackground($info_id,$msg)
	{
		$count = count($info_id);

		Yii::import('application.extensions.runactions.components.ERunActions');
			
		require_once "Mail.php";

		if (ERunActions::runBackground()) 
		{
		
			for($i=0;$i<$count;$i++)
			{
				$mailobj=new MailApi;
				$to = $info_id[$i];
				
				$mailobj->sendmail($to,$msg);

			}
		}
		else
		{
			$this->redirect(array('admin'));
		}
	}

	public function actionBackgroundmsg($phone_nos,$msg)
	{
		$count = count($phone_nos);

		Yii::import('application.extensions.runactions.components.ERunActions');
			
		//require_once "Mail.php";

		if (ERunActions::runBackground()) {
			$output = implode(",",$phone_nos);
			$smsobj=new SmsApi;
			$r=$smsobj->sendsms($output,$msg);
			if(preg_match('/alert_/',$r))
				echo 'sent';
				
		}	
		else
		{
			$this->redirect(array('admin'));
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

	   if(!empty($_POST['StudentSmsEmailDetails']))
	    {
		$model->attributes=$_POST['StudentSmsEmailDetails'];
		$data=ScheduleTiming::model()->findByPk($model->student_sms_email_details_schedule_time_id);

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

		if(empty($course->student_sms_email_details_course_id))
		{
			$course=0;	
			$model->student_sms_email_details_course_id=0;	
		}
		else
		$course= $model->student_sms_email_details_course_id;
		
		if(empty($batch->student_sms_email_details_batch_id))
		{
			$batch=0;	
			$model->student_sms_email_details_batch_id=0;	
		}
		else
		$batch= $model->student_sms_email_details_batch_id;
		if($model->student_sms_email_details_schedule_flag==1 && $model->student_sms_email_details_purpose=="fees")
		{
		
		$cron = new Crontab('my_crontab'); 
		$jobs_obj = $cron->getJobs();	
		$cron->removeJob($model->student_sms_email_details_cron_no); 	
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();
		$mobile=$model->student_sms_email_details_to_mobile;

		$cronid=$model->student_sms_email_details_cron_no;
		$purpose=$model->student_sms_email_details_purpose;
		$message=$model->message_email_text;
		$to=$model->student_sms_email_details_fees_msg_type;
		$userid=$model->created_by;
		
		StudentSmsEmailDetails::model()->updateCounters(array('student_sms_email_details_cron_no'=>-1),'student_sms_email_details_cron_no>'.$cronid);
		$cron = new Crontab('my_crontab'); 
		$model->student_sms_email_details_cron_no=count($cron->getJobs());
		$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic feesschedulesms '.$course." ".$batch." ".$purpose." \"$message\" ".$userid." ".$to." ".$mobile , $minute, $hour,$date,$month,$day);
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();
		
		if($model->save())
		   $this->redirect(array('scheduleMessages'));			}
		else
		{
		 	$mobile=$model->student_sms_email_details_to_mobile;
		        $purpose=$model->student_sms_email_details_purpose;
			$userid=$model->created_by;
			$cron = new Crontab('my_crontab'); 
			$jobs_obj = $cron->getJobs();	
			$cron->removeJob($model->student_sms_email_details_cron_no); 	
			$cron->saveCronFile(); 	
			$cron->saveToCrontab();
			$cronid=$model->student_sms_email_details_cron_no;
			StudentSmsEmailDetails::model()->updateCounters(array('student_sms_email_details_cron_no'=>-1),'student_sms_email_details_cron_no>'.$cronid);
			$cron = new Crontab('my_crontab'); // my_crontab file will store all added jobs
			$model->student_sms_email_details_cron_no=count($cron->getJobs());
			$model->save(false);	
			$cron->addJob(Yii::getPathOfAlias('webroot').'/protected/yiic attendance '.$course." ".$batch." ".$purpose." ".$userid." ".$mobile,$minute,$hour,$date,$month,$day);
			$cron->saveCronFile(); 	
			$cron->saveToCrontab();		
			if($model->save())
			$this->redirect(array('scheduleMessages'));	
		}
	}
		if($model->student_sms_email_details_schedule_flag==1 && $model->student_sms_email_details_purpose=="fees")
		{
					$this->render('schedulesms',array(
			'model'=>$model,
			));
			break;
		}	
		if($model->student_sms_email_details_schedule_flag==1 && $model->student_sms_email_details_purpose=="attendance")
		{
			$this->render('attendanceMessage',array(
			'model'=>$model,
			));
			break;
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
		$cron = new Crontab('my_crontab'); 
		$jobs_obj = $cron->getJobs();	
		$cron->removeJob($model->student_sms_email_details_cron_no); 			
		$cron->saveCronFile(); 	
		$cron->saveToCrontab();	
		$cronid=$model->student_sms_email_details_cron_no;
		StudentSmsEmailDetails::model()->updateCounters(array('student_sms_email_details_cron_no'=>-1),'student_sms_email_details_cron_no>'.$cronid);
		$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('scheduleMessages'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentSmsEmailDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentSmsEmailDetails']))
			$model->attributes=$_GET['StudentSmsEmailDetails'];

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
		$model=StudentSmsEmailDetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-sms-email-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
