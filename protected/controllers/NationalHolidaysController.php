<?php

class NationalHolidaysController extends EduSecCustom
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new NationalHolidays;
		$emp_attend = new Employee_attendence;
		$model->national_holiday_by_user_id = Yii::app()->user->id;
            	$model->national_holiday_by_date = new CDbExpression('NOW()');
	
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['NationalHolidays']))
		{
		   $model->attributes=$_POST['NationalHolidays'];
                   $old_date = $_POST['NationalHolidays']['national_holiday_date'];
		   $date = date("Y-m-d", strtotime($old_date));

		   $model->national_holiday_date = $date;
		   if($model->save())
		   {	
		      $emp_data = EmployeeTransaction::model()->findAll();	
		      $empdate=Employee_attendence::model()->findAll(array('condition'=>'date="'.$date.'"'));
		
		      if(empty($empdate))
		      {	
			foreach($emp_data as $empd)
			{
			   $emp_attend->employee_attendence_id=null;
			   $emp_attend->setIsNewRecord(true);
                           $emp_attend->employee_id = $empd['employee_transaction_id'];
			   $emp_attend->date = $date;
			   $emp_attend->attendence = 'PH';
			   $emp_attend->time1 = '00:00:00';
			   $emp_attend->time2 = '00:00:00';
			   $emp_attend->time3 = '00:00:00';
			   $emp_attend->time4 = '00:00:00';
			   $emp_attend->time5 = '00:00:00';
			   $emp_attend->time6 = '00:00:00';
			   $emp_attend->time7 = '00:00:00';
			   $emp_attend->time8 = '00:00:00';
			   $emp_attend->time9 = '00:00:00';
			   $emp_attend->time10 = '00:00:00';
			   $emp_attend->total_hour = '00:00:00';
			   $emp_attend->overtime_hour = '00:00:00';
			   $emp_attend->csvfile = null;
			   $emp_attend->save();				
			 }
		       }
			$this->redirect(array('admin'));
		    }
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionAddholiday()
	{
		//$model=new NationalHolidays;
		  $emp_attend =  new Employee_attendence;
		  $current_date = date("Y-m-d");
		  $old_date = $_REQUEST['date'];
		  $date = date("Y-m-d", strtotime($old_date));
		
		  if($date <= $current_date)
		  {
			$this->render('error',array(
			
			));
			exit;
		  }
		  $data = NationalHolidays::model()->findByAttributes(array('national_holiday_date'=>$date));

		if(!empty($data)) {
			$model = $this->loadModel($data->national_holiday_id);
		}
		else
			$model=new NationalHolidays;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(!empty($_POST['NationalHolidays']))
		{
		    $model->attributes=$_POST['NationalHolidays'];
		    $model->national_holiday_by_user_id = Yii::app()->user->id;
		    $model->national_holiday_by_date = new CDbExpression('NOW()');
		    $old_date = $_REQUEST['date'];
		    $date = date("Y-m-d", strtotime($old_date));
		    $model->national_holiday_date = $date;
		    if($model->save())
		    {
			$emp_data = EmployeeTransaction::model()->findAll();		
			$empdate=Employee_attendence::model()->findAll(array('condition'=>'date="'.$date.'"'));
			if(empty($empdate))
			{	
			   foreach($emp_data as $empd)
			   {
			      $emp_info=EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$empd['employee_transaction_id']));
			      $join_date=$emp_info->employee_joining_date;
			      if($date>$join_date)
			      {
				//$info[]=$empd['employee_transaction_id'];
				$emp_attend->employee_attendence_id=null;
				$emp_attend->setIsNewRecord(true);
				$emp_attend->employee_id = $empd['employee_transaction_id'];
				$emp_attend->date = $date;
				$emp_attend->attendence = 'PH';
				$emp_attend->time1 = '00:00:00';
				$emp_attend->time2 = '00:00:00';
				$emp_attend->time3 = '00:00:00';
				$emp_attend->time4 = '00:00:00';
				$emp_attend->time5 = '00:00:00';
				$emp_attend->time6 = '00:00:00';
				$emp_attend->time7 = '00:00:00';
				$emp_attend->time8 = '00:00:00';
				$emp_attend->time9 = '00:00:00';
				$emp_attend->time10 = '00:00:00';
				$emp_attend->total_hour = '00:00:00';
				$emp_attend->overtime_hour = '00:00:00';
				$emp_attend->csvfile = null;
				$emp_attend->save();	
			      }			
			    }
			}
			$this->redirect(array('/dashboard'));
			}
		}

		$this->render('add_holiday',array(
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
	   $old_date = $model->national_holiday_date;

	   // Uncomment the following line if AJAX validation is needed
	    $this->performAjaxValidation($model);
		
	    $current_date = date("Y-m-d");
		
	    if($model->national_holiday_date <= $current_date)
	    {
		$this->render('error',array(
		));
	    }
	    else
	    {
		$model->national_holiday_date = date("d-m-Y", strtotime($model->national_holiday_date));
		if(isset($_POST['NationalHolidays']))
		{
		  $model->attributes=$_POST['NationalHolidays'];
  		  $model->national_holiday_date = date('Y-m-d',strtotime($model->national_holiday_date));
		  if($model->save())
		  {
		     $empdate=Employee_attendence::model()->findAll(array('condition'=>'date="'.$old_date.'"'));
		     if(!empty($empdate))
		     {
			Employee_attendence::model()->updateAll(array('date'=>$model->national_holiday_date), 'date =:date' ,array(':date'=>$old_date));
		     }
		  }
		   $this->redirect(array('admin'));
	         }
		$this->render('update',array(
				'model'=>$model,
			));
	    }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$old_date = $model->national_holiday_date;
		Employee_attendence::model()->deleteAll(array('condition'=>'date="'.$old_date.'"'));
		$model->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new NationalHolidays('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['NationalHolidays']))
			$model->attributes=$_GET['NationalHolidays'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionassignNationalHoliday()
        {
	    $model=new EmployeeTransaction('search');
	    $model->unsetAttributes();  // clear any default values
	    if(isset($_GET['EmployeeTransaction']))
		$model->attributes=$_GET['EmployeeTransaction'];
	  
	    if(isset($_REQUEST['id']))   
	    {
		$id=$_REQUEST['id'];   
		$holi_att = new Employee_attendence;
		$holi_att->employee_id=$id;
		$holi_att->attendence='PH';

		$join_date=EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$_REQUEST['id'] ))->employee_joining_date;
		//echo $join_date;exit;
	       
		$holi_date = NationalHolidays::model()->findAll(array('condition'=>'national_holiday_date >'."'$join_date'"));
		foreach($holi_date as $h)
		{
		    $holi_att->setIsNewRecord(true);
		    $holi_att->employee_attendence_id = NULL;   
		    $holi_att->date=$h['national_holiday_date'];
		    $holi_att->save();
		}
		Yii::app()->user->setFlash('success','Holidays Assinged Successfully.');		
		$this->redirect('assignNationalHoliday');
	     }	
		 $this->render('assign_national_holiday',array(
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
		$model=NationalHolidays::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='national-holidays-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
