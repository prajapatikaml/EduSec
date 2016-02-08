<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class SiteController extends Controller
{
	public $attempts = 2; // allowed 2 attempts
	public $counter;
	public $defaultAction = 'login';

	/**
	 * Declares class-based actions.
	 */
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
		);
	}

	public function actionWelcome()
	{
		$this->layout='select_company_main';		
		$this->render('wel_come',array());
	}

	/**
	 * Check user is guest then redirect to login page otherwise redirect to dashboard.
	 */

	public function actionNewDashboard()
	{
		if(Yii::app()->user->isGuest)
		    $this->redirect(array('login'));
		  //Yii::app()->user->loginRequired();
		else
		 $this->render('newdashboard');
	}

	/**
	 * Create first organization when installation process is going to finish.
	 */

	public function actionCreateOrg()
    	{
	   $org = Organization::model()->count();
	   if($org == 0)  {
          	$this->layout='installation_layout';
          	$model=new Organization;
	  	$user = new User;
	  	$auth_assign = new AuthAssignment;
	  	$this->performAjaxValidation($model);

        if(isset($_POST['Organization']['organization_name']) && 
		!empty($_POST['Organization']['phone']) && !empty($_POST['Organization']['email']))
        {
            $country_model = new Country;
            $country_model->name = $_POST['Organization']['country'];
            $country_model->save();

            $state_model = new State;
            $state_model->state_name = $_POST['Organization']['state'];
            $state_model->country_id = $country_model->id;
            $state_model->save();

            $city_model = new City;
            $city_model->city_name = $_POST['Organization']['city'];
            $city_model->country_id = $country_model->id;
            $city_model->state_id = $state_model->state_id;
            $city_model->save();

            $model->attributes=$_POST['Organization'];
            $model->organization_created_by=1;
            $model->organization_creation_date=new CDbExpression('NOW()');

	    $model->city = $city_model->city_id;
            $model->state = $state_model->state_id;
            $model->country = $country_model->id;

		
            if($model->save(false)) {
		$user->user_organization_email_id=$model->email;
		$user->user_password=md5($model->email.$model->email);
		$user->user_type='admin';
		$user->user_created_by=1;
		$user->user_creation_date=new CDbExpression('NOW()');
		$user->user_organization_id = $model->organization_id;
		$user->save();
		$auth_assign->itemname = 'SuperAdmin';
		$auth_assign->userid = $user->user_id;
		$auth_assign->save(false); 

		$this->redirect(array('redirectLogin'));
	    }
        }

        $this->render('create_org',array(
            'model'=>$model,
        ));
      }
	else {
	Yii::app()->user->logout();
	$this->redirect(array('login'));
	}
    }

	/**
	 * Check user is guest then redirect to login page otherwise redirect to dashboard.
	 */
	public function actionRedirectLogin()
	{
		$this->layout = 'installation_layout';
		if(Yii::app()->user->isGuest )
		$this->render('redirect_login');
		else
		$this->redirect(array('newDashboard'));

	}


	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && ( $_POST['ajax']==='user-form' ||  $_POST['ajax']==='organization-form' || $_POST['ajax']==='forgot-password-form' ))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Use load an organization image from database.
	 */
	public function actionloadImage($id)
    	{
        	$model=Organization::model()->findByPk($id);
       		$this->renderPartial('image', array(
            		'model'=>$model
        				));
    	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout = false;
		if(Yii::app()->user->isGuest)
		$this->render('index');
		else
		$this->redirect(array('newDashboard'));

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

	/**
	 * Use for forgotPassword. After succesfull update sent an email to user with their
         * login details
	 */
	public function actionForgotpassword()
	{
		$this->layout='login_layout';
		$model = new LoginForm('forgotpassword');
	         $this->performAjaxValidation($model);
		if(isset($_POST['LoginForm'])) {
		   $model->attributes=$_POST['LoginForm'];
		   $user_id = User::model()->findByAttributes(array('user_organization_email_id'=>$model->username));
		if($user_id) {
		     $user_id->user_password = md5($model->username.$model->username);
		     $user_id->save();
		     $message = "Your password has been reset.\n"."UserName: ".$model->username."\nPassword: ".$model->username;
		     $headers = 'From: rudratestmail@gmail.com' . "\r\n" .
			    'Reply-To: rudratestmail@gmail.com' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
		     $subject = "Login details for Edusec";
		     mail($model->username, $subject, $message, $headers);
		     $this->redirect(array('smsNotification','status'=>'success'));
		} 
		else
		     $this->redirect(array('smsNotification','status'=>'user_not_exist'));

		}
        	$this->render('forgotpassword', array('model'=>$model));
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
		$this->layout='login_layout';
		if(Yii::app()->user->isGuest)
		{
			
		  $login=new LoginUser;
		  $model = $this->captchaRequired()? new LoginForm('captchaRequired') : new LoginForm('login');	

		  if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		  {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		  }

		if(isset($_POST['LoginForm']))
		{
		  $model->attributes=$_POST['LoginForm'];
		  if($model->validate() && $model->login())
		  {
			$emplogin = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>Yii::app()->user->id));
			$studlogin = StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>Yii::app()->user->id));
		  if($studlogin)
		  {
			Yii::app()->user->setState('stud_id',$studlogin->student_transaction_id);
		  }
		  if($emplogin)
		  {
			Yii::app()->user->setState('emp_id',$emplogin->employee_transaction_id);
		  }	

		  $login->user_id=Yii::app()->user->id;
		  $login->status=1;
		  $login->log_in_time=new CDbExpression('NOW()');
		  $login->user_ip_address=$_SERVER['REMOTE_ADDR'];
		  $login->login_organization_id=1;
		  $login->save();
		  $this->redirect(array('site/newdashboard'));
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
		  $this->redirect(array('site/newdashboard'));
	}

	/**
	 * @return Captch require on login page if user enter invalid username
         * or password more then specified attempts number.
	 */
	public function captchaRequired()
        {           
               return Yii::app()->session->itemAt('captchaRequired') >= $this->attempts;
        }

	/**
	 * Use for logout. And then redirect to login page.
	 */
	public function actionLogout()
	{
		if(isset(Yii::app()->user->id)) {
			LoginUser::model()->updateAll(array( 'status' => 0, 'log_out_time'=> new CDbExpression('NOW()')),'user_id='.Yii::app()->user->id.' AND status = 1');	
			Yii::app()->user->logout();
			$this->redirect(array('login'));
		}
		$this->redirect(array('login'));
	}
}
