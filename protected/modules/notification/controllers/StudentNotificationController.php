<?php

class StudentNotificationController extends EduSecCustom
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
		$model=new StudentNotification;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['StudentNotification']))
		{
			$model->attributes = $_POST['StudentNotification'];
			if(!empty($_POST['StudentNotification']['student_notification_to']))
	     	        {
			$model->attributes = $_POST['StudentNotification'];
			$to=$model->student_notification_to;
			$stud_tran_id=StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$to))->student_transaction_id;
			$model->student_notification_to=$stud_tran_id;
			}	
			else
		   	{
				$model->student_notification_to=0;
			}
			if(empty($model->student_notification_academic_term_id))
			{
				$model->student_notification_academic_term_id=0;	
			}
 		
			if(empty($model->student_notification_academic_period_id))
			{
				$model->student_notification_academic_period_id=0;	
			}
 			if(empty($model->student_notification_branch_id))
			{
				$model->student_notification_branch_id=0;	
			}
			$startdate = $_POST['StudentNotification']['student_notification_alert_after_date'];
			$alertstartdate  = date("Y-m-d", strtotime($startdate));
			$model->student_notification_alert_after_date = $alertstartdate;
			$enddate = $_POST['StudentNotification']['student_notification_alert_before_date'];
			$alertenddate = date("Y-m-d", strtotime($enddate));
			$model->student_notification_alert_before_date = $alertenddate;
			$expire=$_POST['StudentNotification']['student_notification_expire'];
			$alertexpire = date("Y-m-d", strtotime($expire));
			$model->student_notification_expire = $alertexpire ;
			$model->student_notification_from=Yii::app()->user->id;	
	    		$model->student_notification_creation_date = new CDbExpression('NOW()');	
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_notification_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionRead($id)
	{
		$record = $this->loadmodel($id);
		$record->student_notification_read = 1;
		$record->save(false);
		$link=$record->student_notification_link;
		if(!empty($link))
		$this->redirect(array($link));
		else 
		$this->redirect(array('view','id'=>$id));
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
		$model->student_notification_alert_after_date = date("d-m-Y", strtotime($model->student_notification_alert_after_date));
		$model->student_notification_alert_before_date = date("d-m-Y", strtotime($model->student_notification_alert_before_date));
		if(isset($_POST['StudentNotification']))
		{
			
			$model->attributes=$_POST['StudentNotification'];
			if(!empty($_POST['StudentNotification']['student_notification_to']))
	     	        {
			$model->attributes = $_POST['StudentNotification'];
			$to=$model->student_notification_to;
			$stud_tran_id=StudentTransaction::model()->findByAttributes(array('student_transaction_user_id'=>$to))->student_transaction_id;
			$model->student_notification_to=$stud_tran_id;
			}	
			else
		   	{
				$model->student_notification_to=0;
			}
			if(empty($model->student_notification_academic_term_id))
			{
				$model->student_notification_academic_term_id=0;	
			}
 		
			if(empty($model->student_notification_academic_period_id))
			{
				$model->student_notification_academic_period_id=0;	
			}
 			if(empty($model->student_notification_branch_id))
			{
				$model->student_notification_branch_id=0;	
			}

			$startdate = $_POST['StudentNotification']['student_notification_alert_after_date'];
			
			$alertstartdate  = date("Y-m-d", strtotime($startdate));
			$model->student_notification_alert_after_date = $alertstartdate ;
		
			$enddate = $_POST['StudentNotification']['student_notification_alert_before_date'];
			$alertenddate = date("Y-m-d", strtotime($enddate));
			$model->student_notification_alert_before_date = $alertenddate ;
			$expire=$_POST['StudentNotification']['student_notification_expire'];
			$alertexpire = date("Y-m-d", strtotime($expire));
			$model->student_notification_expire = $alertexpire ;

			if($model->save())
				$this->redirect(array('view','id'=>$model->student_notification_id));
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
                    'condition' => 'student_notification_to=:to',
                    'params' => array(
                     ':to'=>Yii::app()->user->getState('stud_id'),
                      ),
			'order'=>'student_notification_id DESC',    
			'limit'=>'30',
                ));
                $notices = StudentNotification::model()->findAll($criteria);
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
		
		$model=new StudentNotification('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentNotification']))
			$model->attributes=$_GET['StudentNotification'];

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
		$model=StudentNotification::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-notification-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       
	public function actionNotify()
	{
		$model=new StudentTransaction('smssearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('notify',array(
			'model'=>$model
		));
	}
	
	public function actionMessageform()
	{
		$notification=new StudentNotification;
		$this->performAjaxValidation($notification);
  		if(!empty($_POST['selectedstudentid'])) {
		     $stud_data =explode(',', $_POST['selectedstudentid']); 
		     	
		     $this->render('message_form',array('list'=>$stud_data,'notification'=>$notification));
	 	}
		else if(isset($_POST['StudentNotification']))
	   	{
		  $notification->attributes = $_POST['StudentNotification'];
		  $stud_ids = $_POST['result']; 
		  //$result = $_SESSION['student_data'];
		  $from=Yii::app()->user->id;	
		  $startdate = $_POST['StudentNotification']['student_notification_alert_after_date'];
		  $alertstartdate  = date("Y-m-d", strtotime($startdate));
		  $notification->student_notification_alert_after_date = $alertstartdate;
		  $enddate = $_POST['StudentNotification']['student_notification_alert_before_date'];
		  $alertenddate = date("Y-m-d", strtotime($enddate));
		  $notification->student_notification_alert_before_date = $alertenddate;

		   foreach ($stud_ids as $item){ 
			    $notification->setIsNewRecord(true);
			    $notification->student_notification_id=null;   
			    $notification->student_notification_from = $from;
			    $notification->student_notification_to=$item;
			    $notification->student_notification_creation_date = new CDbExpression('NOW()');	
			    $notification->student_notification_read = 0;
			    $notification->save();	
			  	
		   }	
		$this->redirect(array('notify'));
		}

		 else {
		   	$this->redirect(array('notify'));	
		   }
	}
	public function actiongetItemName()
        {
            $data=  AcademicTerm::model()->findAll('current_sem=:current and academic_term_period_id=:academic_term_period_id',
		 array(':current'=>1,':academic_term_period_id'=>(int) $_REQUEST['StudentNotification']['student_notification_academic_period_id']));
                  
            $data=CHtml::listData($data,'academic_term_id','academic_term_name');
	    echo "<option value=''>All Semester</option>";
            foreach($data as $value=>$name)
            {
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }

   public function actionAjaxRequest()
    {
	$res = array();
        $list = StudentNotification::model()->findAll(array('condition'=>'student_notification_to = :to AND student_notification_alert_after_date <= :afterdate AND student_notification_alert_before_date >= :beforedate AND student_notification_read = :read', 'params'=> array(':to' => Yii::app()->user->getState('stud_id'), ':afterdate'=>date('Y-m-d'),':beforedate'=>date('Y-m-d'), ':read' => 0)));
	$res['count'] = count($list);

	$menu = null;

	foreach($list as $notice) {
	  $menu .= '<div class="comment_ui">';
          $menu .='<a href='.Yii::app()->request->baseUrl.'/notification/studentNotification/Read?id='.$notice->student_notification_id.'>';
          $menu .='<div style="position: relative;cursor:pointer;">';
          $menu .=$notice->student_notification_title.'</div></a></div>';

	}
	$res['details'] = $menu;
	echo json_encode($res);
       
    }

}
