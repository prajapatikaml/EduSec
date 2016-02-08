<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class StudentPaidFeesDetailsController extends RController
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
	public function actionCreate($id)
	{
		
		$course = StudentTransaction::model()->findByPk($id)->student_transaction_course_id;
		$cDetails = CourseMaster::model()->findByPk($course);
		
		$model=new StudentPaidFeesDetails;
		$this->performAjaxValidation($model);

		if(isset($_POST['StudentPaidFeesDetails']))
		{
			$model->attributes=$_POST['StudentPaidFeesDetails'];
			$model->student_paid_student_id = $id;
			$model->student_paid_course_id = $course;
			$model->student_paid_date = new CDbExpression('NOW()');
			$model->student_paid_to = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model, 'cDetails'=>$cDetails,
		));
	}

	/**
	 * Display student list grid to select student to take a fees.
	 */
	public function actionTakeFees()
	{
		$model = new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('takeFees',array(
			'stud_model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['StudentPaidFeesDetails']))
		{	
			$model->attributes=$_POST['StudentPaidFeesDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_paid_fees_id));
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
			$this->loadModel($id)->delete();
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else if(!Yii::app()->request->isPostRequest) {
			$this->loadModel($id)->delete();
			$this->redirect(array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new StudentPaidFeesDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentPaidFeesDetails']))
			$model->attributes=$_GET['StudentPaidFeesDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentPaidFeesDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentPaidFeesDetails']))
			$model->attributes=$_GET['StudentPaidFeesDetails'];

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
		$model=StudentPaidFeesDetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-paid-fees-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
