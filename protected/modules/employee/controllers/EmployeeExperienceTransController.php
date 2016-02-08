<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class EmployeeExperienceTransController extends RController
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
	 * If creation is successful, the browser will be redirected to the 'employeeTransaction/employeeExperience' page.
	 */
	public function actionCreate()
	{
		$model=new EmployeeExperienceTrans;
		$emp_exp=new EmployeeExperience;

		$this->performAjaxValidation(array($model,$emp_exp));

		if(isset($_POST['EmployeeExperience']))
		{
			$emp_exp->attributes=$_POST['EmployeeExperience'];
			$todate = $_POST['EmployeeExperience']['employee_experience_to'];
			$fromdate = $_POST['EmployeeExperience']['employee_experience_from'];
			$from_date = date("Y-m-d", strtotime($fromdate));
			$to_date = date("Y-m-d", strtotime($todate));
			$valid = $emp_exp->validate();

			if($valid)
			{
				
				$datetime1 = date_create($to_date);
				$datetime2 = date_create($from_date);
				$total_exp = date_diff($datetime1,$datetime2);
				$diffday = $total_exp->format('%d');
				$diffmonth = $total_exp->format('%m');
				$diffyear = $total_exp->format('%y');
				$experince = $diffyear.'Y '.$diffmonth.'M '.$diffday.'D';
				$emp_exp->employee_experience = $experince;
				$emp_exp->employee_experience_to = $to_date;
				$emp_exp->employee_experience_from = $from_date;
				$emp_exp->save();
				$model->employee_experience_trans_user_id = $_REQUEST['id'];
				$model->employee_experience_trans_emp_experience_id = $emp_exp->employee_experience_id;
				$model->employee_experience_trans_organization_id=Yii::app()->user->getState('org_id');
				$model->save();
				
				$this->redirect(array('employeeTransaction/employeeExperience','id'=>$model->employee_experience_trans_user_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,'emp_exp'=>$emp_exp,
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
		$emp_exp = EmployeeExperience::model()->findByPk($model->employee_experience_trans_emp_experience_id);

		$this->performAjaxValidation($emp_exp);
		$emp_exp->employee_experience_to = date("d-m-Y", strtotime($emp_exp->employee_experience_to));
		$emp_exp->employee_experience_from = date("d-m-Y", strtotime($emp_exp->employee_experience_from));
		

		if(isset($_POST['EmployeeExperience']))
		{
			$emp_exp->attributes=$_POST['EmployeeExperience'];
			$todate = $_POST['EmployeeExperience']['employee_experience_to'];
			$fromdate = $_POST['EmployeeExperience']['employee_experience_from'];
			$from_date = date("Y-m-d", strtotime($fromdate));
			$to_date = date("Y-m-d", strtotime($todate));
			$valid = $emp_exp->validate();

			if($valid)
			{

				$datetime1 = date_create($to_date);
				$datetime2 = date_create($from_date);
				$total_exp = date_diff($datetime1,$datetime2);
				$diffday = $total_exp->format('%d');
				$diffmonth = $total_exp->format('%m');
				$diffyear = $total_exp->format('%y');
				$experince = $diffyear.'Y '.$diffmonth.'M '.$diffday.'D';
				$emp_exp->employee_experience = $experince;
				$emp_exp->employee_experience_to = $to_date;
				$emp_exp->employee_experience_from = $from_date;
				$emp_exp->save();
				
				$this->redirect(array('employeeTransaction/employeeExperience','id'=>$model->employee_experience_trans_user_id));
			}
				
		}

		$this->render('update',array(
			'model'=>$model,'emp_exp'=>$emp_exp,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	//$emp_exp = EmployeeExperience;	
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();
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
		$model=new EmployeeExperienceTrans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeExperienceTrans']))
			$model->attributes=$_GET['EmployeeExperienceTrans'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployeeExperienceTrans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeExperienceTrans']))
			$model->attributes=$_GET['EmployeeExperienceTrans'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Retune employee experience details list.
	 */
	public function actionEmployeeExperience()
	{
		$model=new EmployeeExperienceTrans('mysearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeExperienceTrans']))
			$model->attributes=$_GET['EmployeeExperienceTrans'];

		$this->render('employeeexperience',array(
			'employeeexperience'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EmployeeExperienceTrans::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-experience-trans-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
