<?php

class StudentArchiveTableController extends RController
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
	 */
/*	public function accessRules()
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
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
*/
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$test=new StudentDocsTrans;
		$docs_model=new StudentDocsTrans('mysearch');
		$stu_record=new StudentAcademicRecordTrans('mysearch');
		$docs_model->unsetAttributes();  // clear any default values
		$stu_record->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$docs_model->attributes=$_GET['StudentDocsTrans'];
		
		if(isset($_GET['StudentAcademicRecordTrans']))
			$stu_record->attributes=$_GET['StudentAcademicRecordTrans'];

		
		$this->render('view',array(
			'model'=>$this->loadModel($id),'docs_model'=>$docs_model,'test'=>$test,'stu_record'=>$stu_record,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentArchiveTable;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['StudentArchiveTable']))
		{
			$model->attributes=$_POST['StudentArchiveTable'];
				
			$model->student_archive_creation_date = new CDbExpression('NOW()');
			$model->student_archive_created_by = Yii::app()->user->id;
			if($model->save())
				$this->redirect(array('admin'));
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

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['StudentArchiveTable']))
		{
			$model->attributes=$_POST['StudentArchiveTable'];
			if($model->save())
				$this->redirect(array('admin'));
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
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
		/*$dataProvider=new CActiveDataProvider('StudentArchiveTable');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new StudentArchiveTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentArchiveTable']))
			$model->attributes=$_GET['StudentArchiveTable'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentArchiveTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentArchiveTable']))
			$model->attributes=$_GET['StudentArchiveTable'];

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
		$model=StudentArchiveTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-archive-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
