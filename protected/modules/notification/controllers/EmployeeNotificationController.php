<?php

class EmployeeNotificationController extends EduSecCustom
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
	public function actionNotify()
	{
		$model=new EmployeeTransaction('smssearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('notify',array(
			'model'=>$model
		));
	}
	
	public function actionMessageform()
	{
	 	
	   $notification=new EmployeeNotification;
	   $this->performAjaxValidation($notification);
  	   if(!empty($_POST['selectedemployeeid'])) {
	      $emp_data =explode(',', $_POST['selectedemployeeid']); 
	     	
	      $this->render('message_form',array('list'=>$emp_data,'notification'=>$notification));
	   }
	   else if(isset($_POST['EmployeeNotification']))
	   {
	  	$notification->attributes = $_POST['EmployeeNotification'];
		$employee_ids = $_POST['result']; 
	 	
		//$result = $_SESSION['student_data'];
		$from=Yii::app()->user->id;	
		$notification->alert_after_date = date("Y-m-d", strtotime($_POST['EmployeeNotification']['alert_after_date']));
		$notification->alert_before_date = date("Y-m-d", strtotime($_POST['EmployeeNotification']['alert_before_date']));
		$notification->employee_notification_read = 0;

		foreach ($employee_ids as $item){
		    $notification->setIsNewRecord(true);
		    $notification->id=null;   
		    $notification->from = $from;
		    $notification->emp_notice_to=$item;
	            $notification->employee_notification_creation_date = new CDbExpression('NOW()'); 
		    $notification->employee_notification_read = 0;
		    $notification->save();
                }	
		$this->redirect(array('notify'));
	     }
		 else {
		   	$this->redirect(array('notify'));	
		   }
	}
   	public function actionRead($id)
    	{
	
        $record = $this->loadmodel($id);
	$link=$record->link;

	$record->employee_notification_read = 1;
	$record->save(false);
	if(!empty($link))
	$this->redirect(array($link));
	else 
	$this->redirect(array('view','id'=>$id));
        //$this->redirect($this->createUrl('../dashboard'));
    	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EmployeeNotification;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeNotification']))
		{
			if(!empty($_POST['EmployeeNotification']['to']))
	     	        {
			$model->attributes = $_POST['EmployeeNotification'];
			$to=$model->emp_notice_to;
			$emp_tran_id=EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$to))->employee_transaction_id;
			
			$model->to=$emp_tran_id;
			}	
			else
		   	{
		
			$model->attributes = $_POST['EmployeeNotification'];
			$model->emp_notice_to=0;
			}	
			if(!empty($_POST['EmployeeNotification']['notifiyii_department_id']))
	     	        {
			$model->notifiyii_department_id=$_POST['EmployeeNotification']['notifiyii_department_id'];
			}	
			else
		   	{
		
			$model->notifiyii_department_id=0;
			}	

			$startdate = $_POST['EmployeeNotification']['alert_after_date'];
			
			$alertstartdate  = date("Y-m-d", strtotime($startdate));
			$model->alert_after_date = $alertstartdate ;
		
			$enddate = $_POST['EmployeeNotification']['alert_before_date'];
			$alertenddate = date("Y-m-d", strtotime($enddate));
			$model->alert_before_date = $alertenddate ;
			$expire=$_POST['EmployeeNotification']['expire'];
			$alertexpire = date("Y-m-d", strtotime($expire));
			$model->expire = $alertexpire ;
			$model->from=Yii::app()->user->id;	
	                $model->employee_notification_creation_date = new CDbExpression('NOW()'); 

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$model->alert_after_date = date("d-m-Y", strtotime($model->alert_after_date));
		$model->alert_before_date = date("d-m-Y", strtotime($model->alert_before_date));

		if(isset($_POST['EmployeeNotification']))
		{
			$model->attributes=$_POST['EmployeeNotification'];
			if(!empty($_POST['EmployeeNotification']['to']))
	     	        {
			 $model->attributes = $_POST['EmployeeNotification'];
			$to=$model->to;
			$emp_tran_id=Yii::app()->user->id;
			$model->to=$emp_tran_id;
			}	
			else
		   	{
		
			$model->attributes = $_POST['EmployeeNotification'];
			$model->to=0;
			}
			if(!empty($_POST['EmployeeNotification']['notifiyii_department_id']))
	     	        {
			$model->notifiyii_department_id=$_POST['EmployeeNotification']['notifiyii_department_id'];
			}	
			else
		   	{
		
			$model->notifiyii_department_id=0;
			}	
			$startdate = $_POST['EmployeeNotification']['alert_after_date'];
			
			$alertstartdate  = date("Y-m-d", strtotime($startdate));
			$model->alert_after_date = $alertstartdate ;
		
			$enddate = $_POST['EmployeeNotification']['alert_before_date'];
			$alertenddate = date("Y-m-d", strtotime($enddate));
			$model->alert_before_date = $alertenddate ;
					
  	              	if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria(array(
                    'condition' => 'emp_notice_to=:to',
                    'params' => array(
                       	':to'=>Yii::app()->user->getState('emp_id'),
                      ),
			'order'=>'id DESC',    
			'limit'=>'30',
                ));
                $notices = EmployeeNotification::model()->findAll($criteria);
		$total=count($notices);
		$pages = new CPagination($total);
            	$pages->pageSize = 10;
                $pages->applyLimit($criteria);
		$this->render('index', array(
		        'notices' => $notices,
		        'pages' => $pages,
		    ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new EmployeeNotification('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeNotification']))
			$model->attributes=$_GET['EmployeeNotification'];

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
		$model=EmployeeNotification::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-notification-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
	   public function actionAjaxRequest()
	    {
		$res = array();
		$list = EmployeeNotification::model()->findAll(array('condition'=>'emp_notice_to = :notify_to AND alert_after_date <= :afterdate AND alert_before_date >= :beforedate AND employee_notification_read = :read AND employee_notification_type <> "Leave" AND employee_notification_type <> "Leave Applied" AND employee_notification_type <> "Leave Cancel"', 'params'=> array(':notify_to' => Yii::app()->user->getState('emp_id'), ':afterdate'=>date('Y-m-d'),':beforedate'=>date('Y-m-d'), ':read' => 0)));
		$res['count'] = count($list);
		$menu = null;
		foreach($list as $notice) {
		  $menu .= '<div class="comment_ui">';
                  $menu .='<a href='.Yii::app()->request->baseUrl.'/notification/employeeNotification/Read?id='.$notice->id.'>';
                  //$menu .='<div style="position: relative;cursor:pointer;">';
                  $menu .=$notice->title.'</a></div>';

		}
		$res['details'] = $menu;
		echo json_encode($res);
	    }
}
	
