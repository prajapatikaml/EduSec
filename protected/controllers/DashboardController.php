<?php

class DashboardController extends Controller
{

	public function actions()
	{
	   return array(
	      'index.'=> array(
		 'class'=>'application.components.moduleIndexWidget',
		 'indexPage'=>array(
		    'modulePage'=> Yii::app()->request->getParam('page'),
		   ),
		),
	    );
	}

	public function actionDashboard()
	{
		 $this->layout = '//layouts/dashboard';

		if(!Yii::app()->user->isGuest) {  
		  $this->render('/dashboard/dashboard');
		}
		else
		   $this->redirect(array('site/login'));	
	
	/* $isStudent = Yii::app()->user->getState('stud_id');
		$isEmployee = Yii::app()->user->getState('emp_id');
		if(!empty($isStudent) || !empty($isEmployee))
		  $this->layout = '//layouts/dashboard';
		else
  		 $this->layout = '//layouts/admin_dashboard';

		if(!Yii::app()->user->isGuest) {
 				  
		  $this->render('/dashboard/dashboard');
		}
		else
		   $this->redirect(array('site/login'));  */
	}

	public function actionAictReport()
	{
	   $this->layout = '//layouts/no-sidebar';
	   $this->render('aictReport',array());
	}

	public function actionMyProfile()
	{
	   $this->layout = '//layouts/profileLayout';
	   $checkUser = Yii::app()->user->getState('stud_id');
	   if(isset($checkUser))
	      $this->render('stdProfile',array());
           else
	      $this->render('empProfile',array());
	}

}
