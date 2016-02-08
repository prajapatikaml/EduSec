<?php

class EmployeeInfoController extends RController
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new EmployeeInfo;
		$user =new User;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeInfo']))
		{
			$model->attributes=$_POST['EmployeeInfo'];
			//$user->attributes=$_POST['User'];
			$model->employee_created_by=Yii::app()->user->id;
			$model->employee_creation_date=new CDbExpression('NOW()');
			if($model->save())
/*
				$user->user_organization_email_id = $user->user_organization_email_id;
				$user->user_password = md5($user->user_organization_email_id.$user->user_organization_email_id);
//				$user->user_organization_id =$_REQUEST['organization_id'];
//				$user->user_role_master_id = 3;
				$user->user_created_by = Yii::app()->user->id;;
				$user->user_creation_date=new CDbExpression('NOW()');
				$user->save(false);
				$employeeTrans = new EmployeeTransaction;
				$employeeTrans->attributes = $model->employee_id;
				$employeeTrans->employee_transaction_employee_id=$model->employee_id;
				$employeeTrans->employee_transaction_user_id=$user->user_id;
				$employeeTrans->employee_transaction_branch_id = $_REQUEST['branch_id'];
				$employeeTrans->employee_transaction_category_id = $_REQUEST['category_id'];
				$employeeTrans->employee_transaction_department_id = $_REQUEST['department_id'];
				$employeeTrans->employee_transaction_designation_id = $_REQUEST['employee_designation_id'];
				$employeeTrans->employee_transaction_nationality_id = $_REQUEST['nationality_id'];
				$employeeTrans->employee_transaction_organization_id = $_REQUEST['organization_id'];
				$employeeTrans->employee_transaction_quota_id = $_REQUEST['quota_id'];
				$employeeTrans->employee_transaction_religion_id = $_REQUEST['religion_id'];
				$employeeTrans->employee_transaction_shift_id = $_REQUEST['shift_id'];
				$employeeTrans->save(false);*/
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->employee_id));
		}

		$this->render('create',array(
			'model'=>$model,'user'=>$user,
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
/*
		$emp_tran = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_employee_id'=>$model->employee_id));
		$user_id = $emp_tran->employee_transaction_user_id;
		$branch_id = $emp_tran->employee_transaction_branch_id;
		$category_id = $emp_tran->employee_transaction_category_id;
		$department_id = $emp_tran->employee_transaction_department_id;
		$emp_desig_id = $emp_tran->employee_transaction_designation_id;
		$nationality_id = $emp_tran->employee_transaction_nationality_id;
		$organization_id = $emp_tran->employee_transaction_organization_id;
		$quota_id = $emp_tran->employee_transaction_quota_id;
		$religion_id = $emp_tran->employee_transaction_religion_id;
		$shift_id = $emp_tran->employee_transaction_shift_id;
		
		
		$user=User::model()->findByPk($user_id);
		$branch_info= Branch::model()->findByPk($branch_id);
		$category_info= Category::model()->findByPk($category_id);
		$department_info= Department::model()->findByPk($department_id);
		$emp_desig_info= EmployeeDesignation::model()->findByPk($emp_desig_id);
		$nationality_info= Nationality::model()->findByPk($nationality_id);
		$organization_info= Organization::model()->findByPk($organization_id);
		$quota_info= Quota::model()->findByPk($quota_id);
		$religion_info= Religion::model()->findByPk($religion_id);
		$shift_info= Shift::model()->findByPk($shift_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
*/

		if(isset($_POST['EmployeeInfo']))
		{
			$model->attributes=$_POST['EmployeeInfo'];
			//$user->attributes=$_POST['User'];
			if($model->save())
				//$employeeTrans = new EmployeeTransaction;
				/*
				$user->user_organization_email_id = $user->user_organization_email_id;
				$user->user_password = md5($user->user_organization_email_id.$user->user_organization_email_id);
				$user->user_organization_id =$_REQUEST['organization_id'];
				$user->user_role_master_id = 3;
				$user->user_created_by = Yii::app()->user->id;
				$user->user_creation_date=new CDbExpression('NOW()');
				$user->save();
				$emp_tran->attributes = $model->employee_id;
				$emp_tran->employee_transaction_employee_id=$model->employee_id;
				$emp_tran->employee_transaction_user_id=$user->user_id;
				$emp_tran->employee_transaction_branch_id = $_REQUEST['branch_id'];
				$emp_tran->employee_transaction_category_id = $_REQUEST['category_id'];
				$emp_tran->employee_transaction_department_id = $_REQUEST['department_id'];
				$emp_tran->employee_transaction_designation_id = $_REQUEST['employee_designation_id'];
				$emp_tran->employee_transaction_nationality_id = $_REQUEST['nationality_id'];
				$emp_tran->employee_transaction_organization_id = $_REQUEST['organization_id'];
				$emp_tran->employee_transaction_quota_id = $_REQUEST['quota_id'];
				$emp_tran->employee_transaction_religion_id = $_REQUEST['religion_id'];
				$emp_tran->employee_transaction_shift_id = $_REQUEST['shift_id'];
				$emp_tran->save();
				*/
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->employee_id));
		}

		$this->render('update',array(
						'model'=>$model,//'user'=>$user,
						/*'employee_transaction_branch_id'=>$branch_info,
						'employee_transaction_category_id'=>$category_info,
						'employee_transaction_department_id'=>$department_info,
						'employee_transaction_designation_id'=>$emp_desig_info,
						'employee_transaction_nationality_id'=>$nationality_info,
						'employee_transaction_organization_id'=>$organization_info,
						'employee_transaction_quota_id'=>$quota_info,
						'employee_transaction_religion_id'=>$religion_info,
						'employee_transaction_shift_id'=>$shift_info,*/
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

	
	public function actionIndex()
	{
/*		$dataProvider=new CActiveDataProvider('EmployeeInfo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new EmployeeInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeInfo']))
			$model->attributes=$_GET['EmployeeInfo'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployeeInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeInfo']))
			$model->attributes=$_GET['EmployeeInfo'];

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
		$model=EmployeeInfo::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
