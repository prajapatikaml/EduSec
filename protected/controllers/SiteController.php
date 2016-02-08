<?php

class SiteController extends Controller
{
	public $attempts = 2; // allowed 2 attempts
	public $counter;
	/**
	 * Declares class-based actions.
	 */

	 public function behaviors()
	 {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	 }

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CaptchaExtendedAction',
				'backColor'=>0xFFFFFF,
			),

			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),

			'export.'=>'application.components.export',
		);
	}
	
/*
	public function filters()
	{
		return array(
			'blockuser + login + parentlogin', //check to ensure valid project context
		);
	} 


	public function filterBlockuser($filterChain)
	{
		//var_dump(Yii::app()->request->scriptFile); exit;
		$count = User::model()->count();
		$org_count =  Organization::model()->count();
		if($count == 0 && $org_count ==  0) {
			$this->redirect(array('site/welcome'));
		}
		if($org_count !=  0 &&  $count == 0) {
			$org_data = Yii::app()->db->createCommand()
                                ->select('organization_id')
                                ->from('organization')
                                ->queryRow();
			//print_r($org_data); exit;

			$this->redirect(array('createUser','id'=>$org_data['organization_id']));
		}

		$model=new LoginForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$user_id = User::model()->findByAttributes(array('user_organization_email_id'=>$model->username));
			if(isset($user_id))
			{
				$block_user_id = BlockUserTable::model()->findByAttributes(array('user_table_user_id'=>$user_id->user_id));
		
				if(isset($block_user_id))
				{
				Yii::app()->user->setFlash('block', "Sorry You are blocked User!");
				$this->redirect(array('site/login'));
				return false;		
				}
			}
		}
			$filterChain->run();
	} */

	public function actionWelcome()
	{
		$this->layout='select_company_main';		
		$this->render('wel_come',array());
	}

	public function actionDashboard()
	{
	     if(!Yii::app()->user->isGuest) 
	     {
		  if(Yii::app()->user->getState('parent_id'))	
		  {
			$this->redirect(array('parents/parent/studentprofile?id='.Yii::app()->user->getState('stud_id')));	
		  }

		  if(Yii::app()->user->getState('emp_id'))
		  {
		    $read=array();	
		    $unread=array();	
 		    $read=EmployeeNotification::loadReadNotice();
		    $count=count($read)+count($unread); 
	            $pages = new CPagination($count);
	            $pages->pageSize = 10;
	            $this->render('newdashboard', array(
		        'read' => $read,
			'pages'=>$pages,
		    ));
		 }
		else if(Yii::app()->user->getState('stud_id'))
		{
		    $read=array();	
		    $unread=array();	
 		    $read=StudentNotification::loadReadNotice();
		    $count=count($read)+count($unread); 
	            $pages = new CPagination($count);
	            $pages->pageSize = 10;
	            $this->render('newdashboard', array(
		        'read' => $read,
			'pages'=>$pages,
		    ));
		}	
		 else
		 $this->render('newdashboard');
	    }
	    else
		$this->redirect(array('login'));
	}

	public function actionCreateUser()
	{
		$this->layout='installation_layout';
		$model=new User;
		//$ass_comp = new assignCompanyUserTable;
		//$model->setScenario('create');
		$auth_assign = new AuthAssignment;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->user_password=md5($model->user_password.$model->user_password);
			$model->user_type='admin';
			$model->user_created_by=1;
			$model->user_creation_date=new CDbExpression('NOW()');
			//$model->user_organization_id = $_REQUEST['id'];
			if($model->save())
			{
				//$ass_comp->assign_user_id = $model->user_id;
				//$ass_comp->assign_org_id = $_REQUEST['id'];
				//$ass_comp->assign_created_by = $model->user_id;
				//$ass_comp->assign_creation_date = new CDbExpression('NOW()');
				//$ass_comp->save();
			
				//$auth_assign->attributes = $_POST['AuthAssignment'];
				//$this->redirect(array('view','id'=>$model->user_id));
				$auth_assign->itemname = 'SuperAdmin';
				$auth_assign->userid = $model->user_id;
				$auth_assign->save(false); 
				$this->redirect(array('site/redirectLogin'));
			}
		   }

		$this->render('create_user',array(
			'model'=>$model,
		));
	}

	public function actionRedirectLogin()
	{
		$this->layout='installation_layout';
		$this->render('redirect_login',array());
	}

	public function actionCreateOrg()
    	{
          $this->layout='installation_layout';
          $model=new Organization;

        // Uncomment the following line if AJAX validation is needed
         $this->performAjaxValidation($model);

        if(isset($_POST['Organization']['organization_name']))
        {
            $model->attributes=$_POST['Organization'];
            $model->organization_created_by=1;
            $model->organization_creation_date=new CDbExpression('NOW()');


            if(!empty($_FILES['Organization']['tmp_name']['logo']))
            {

                $file = CUploadedFile::getInstance($model,'logo');
                $model->file_type = $file->type;

                $fp = fopen($file->tempName, 'r');
                $content = fread($fp, filesize($file->tempName));
                fclose($fp);
                $model->logo = $content;
            }
            if($model->save(false))
		$this->redirect(array('createUser','id'=>$model->organization_id));
        }

        $this->render('create_org',array(
            'model'=>$model,
        ));
    }


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && ( $_POST['ajax']==='user-form' ||  $_POST['ajax']==='organization-form'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionloadImage()
    	{
        	$model=Organization::model()->findAll();
                header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Content-Transfer-Encoding: binary');
		header('Content-type: '.$model[0]['file_type']);
		echo $model[0]['logo']; 
       		
    	}
	public function actionSend_sms()
	{
		if(Yii::app()->user->isGuest)
			  Yii::app()->user->loginRequired();

		$sms = new Sendsms;

		if(isset($_POST['Sendsms']))
		{
			$sms->attributes=$_POST['Sendsms'];
			$smsobj=new SmsApi;
			$user_id->user_organization_id;
			$r=$smsobj->sendsms($sms->phone_no,$sms->message,$org);

			if(preg_match('/alert_/',$r))
	   		echo 'sent';
		}
		
		$this->render('send_sms',array('model'=>$sms));
	}

	public function actionselectCompany()
	{
		$login=new LoginUser;
		$this->layout='select_company_main';
		if(Yii::app()->user->isGuest)
			  Yii::app()->user->loginRequired();

		$model = new SelectCompany;
		$company_list = assignCompanyUserTable::model()->findAll(array('condition'=>'assign_user_id=:x', 'params'=>array(':x'=>Yii::app()->user->id)));

		foreach($company_list as $list1)
		{
			$company[] = Organization::model()->findByPk($list1->assign_org_id);
//			$listdata[] =  array('id'=>$company->organization_id,'name'=>$company->organization_name);  /// CREATE ARRAY WITH TWO KEY INDEX (ORG_ID,ORG_NAME)
			
		}

		if(isset($_POST['SelectCompany']))
		{
			$model->attributes=$_POST['SelectCompany'];

			if(isset($_POST['select_org']) && $model->organization_name != null)
			{
				Yii::app()->user->setState('org_id',$model->organization_name);
				
				$login->user_id=Yii::app()->user->id;
				$login->status=1;
				$login->log_in_time=new CDbExpression('NOW()');

				$login->user_ip_address=$_SERVER['REMOTE_ADDR'];
				$login->login_organization_id=Yii::app()->user->getState('org_id');	
			  	$login->save();
				
				$this->redirect(array('site/dashboard'));
			}
			else
			{
				Yii::app()->user->setFlash('not-select', "Please selecte any Organization!");
				$this->redirect(array('selectCompany'));
			}

		}
		else
		{
		$this->render('select_company',array('model'=>$model,'company'=>$company,
			));
		}
	}	

	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = false;
		$tblCount = count(Yii::app()->db->schema->tables); 
		if($tblCount == 0)
		   $this->render('index');
		else {
		    $orgExist = Organization::model()->findAll();
		    $usrExist = User::model()->findAll();
		   
		    if(empty($orgExist) || empty($usrExist))
   	   	      $this->render('index');
		    else
		      $this->redirect(array('dashboard/dashboard'));	
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    $this->layout = "column2";
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}


	public function actionForgotpassword()
	{
		$this->layout='loginLayout';
		$model = new LoginForm;
		if(isset($_POST['LoginForm'])) {
		   $model->attributes=$_POST['LoginForm'];
		   $user_id = User::model()->findByAttributes(array('user_organization_email_id'=>$_POST['LoginForm']['username']));
		      	
		   if(!empty($user_id)) {

		   $random = substr(number_format(time() * rand(),0,'',''),0,10);
		   $mail='';
		   
		   $check_user = StudentTransaction::model()->find('student_transaction_user_id ='.$user_id->user_id);
		   if(!empty($check_user))
		   $mail = StudentInfo::model()->findByPk($check_user->student_transaction_student_id)->student_email_id_1;

		   $check_user_emp = EmployeeTransaction::model()->find('employee_transaction_user_id ='.$user_id->user_id);
		   if(!empty($check_user_emp)) 
		   $mail = EmployeeInfo::model()->findByPk($check_user_emp->employee_transaction_employee_id)->employee_private_email;
		   if($mail != '') { 
			
			$mailobj=new MailApi;
			$r=$mailobj->sendmail($mail,$random);
			$update_user = User::model()->findByPk($user_id->user_id);
		        $update_user->user_password = md5($random.$random);
		        $update_user->save();
		        $this->redirect(array('smsNotification','status'=>'success'));
		   }
		}
		else
		     $this->redirect(array('smsNotification','status'=>'user_not_exist'));

		}
        	$this->render('forgotpassword', array('model'=>$model));
	}

	public function actionSmsNotification()
	{
		$this->layout='login_layout';
		$this->render('smsNotification',array());
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
                
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */

	public function actionLogin()
	{						
		$this->layout='loginLayout';
		if(Yii::app()->user->isGuest)
		{					
		
			$login=new LoginUser;
			$model = $this->captchaRequired()? new LoginForm('captchaRequired') : new LoginForm('login');	
			// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{ 
				
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
				{ 
					$login->user_id=Yii::app()->user->id;
					$loginuser = $login->user_id;
					$emplogin = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$loginuser));
					$studlogin = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$loginuser));
					if($studlogin)
					{
						Yii::app()->user->setState('stud_id',$studlogin->student_transaction_id);
					}
					if($emplogin)
					{
						Yii::app()->user->setState('emp_id',$emplogin->employee_transaction_id);
					}	
					$login->status=1;
					$login->log_in_time=new CDbExpression('NOW()');
					$login->user_ip_address=$_SERVER['REMOTE_ADDR'];
					$login->save();

					$this->redirect(array('dashboard/dashboard'));

				}
				else
				{
				 $this->counter=Yii::app()->session->itemAt('captchaRequired') + 1;
				 Yii::app()->session->add('captchaRequired',$this->counter);
				}
		    }
		    $this->render('login',array('model'=>$model));

		}
		else
		{
			if(Yii::app()->user->getState('org_id') != NULL)
				$this->redirect(array('site/dashboard'));
			else {
				Yii::app()->user->logout();	
				$this->redirect(Yii::app()->homeUrl);	
			}
				
		}
		
	}
	public function actionParentlogin()
	{	
		$this->layout='login_layout';
		if(Yii::app()->user->isGuest)
		{
			
			$login=new LoginUser;
			$model = $this->captchaRequired()? new LoginForm('parentcaptchaRequired') : new LoginForm('parentlogin');

			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];

				if($model->validate() && $model->parentlogin())
				{										
						$login->user_id=Yii::app()->user->id;						
					        $loginuser = $login->user_id;
						
						$res = ParentLogin::model()->findByPk($loginuser);
						$studlogin = StudentTransaction::model()->findByAttributes(array('student_transaction_parent_id'=>$res->parent_id));
						Yii::app()->user->setState('stud_id',$studlogin->student_transaction_id);
				
						
						Yii::app()->user->setState('parent_id',$loginuser);
						Yii::app()->user->setState('org_id',$res->parent_organization_id);
					
						$login->status=1;
						$login->log_in_time=new CDbExpression('NOW()');
						$login->user_ip_address=$_SERVER['REMOTE_ADDR'];
						//$login->login_oraganization_id=$res->parent_organization_id;
						$login->save();

						$this->redirect(array('parents/parent/studentprofile?id='.$studlogin->student_transaction_id));
					

				}
				else
				{
					 $this->counter=Yii::app()->session->itemAt('captchaRequired') + 1;
					 Yii::app()->session->add('captchaRequired',$this->counter);
					

				}

			}
					
			$this->render('parent_login',array('model'=>$model));

		}
		else
		{
			if(Yii::app()->user->getState('org_id') != NULL)
				$this->redirect(array('site/dashboard'));
			else {
				Yii::app()->user->logout();	
				$this->redirect(Yii::app()->homeUrl);	
			}
				
		}
		
	}


	public function captchaRequired()
        {           
               return Yii::app()->session->itemAt('captchaRequired') >= $this->attempts;
		//return ($this->counter >= $this->attempts);
        }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionSwitchcompany()
	{
		$this->layout = '//layouts/select_company_main'; 
		Yii::app()->session->destroySession('org_id');
		$this->redirect(array('/site/selectCompany'));
	}
	public function actionLogout()
	{
		if(isset(Yii::app()->user->id))
		LoginUser::model()->updateAll(array( 'status' => 0, 'log_out_time'=> new CDbExpression('NOW()')),'user_id='.Yii::app()->user->id.' AND status = 1');	
		//Yii::app()->session->destroy();
		
		if(Yii::app()->user->getState('parent_id')){
			Yii::app()->user->logout();
			$this->redirect(array('parentlogin'));		
		}
		else{
		Yii::app()->user->logout();
		$this->redirect('login');
		}
	}
}
