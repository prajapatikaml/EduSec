<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class StudentDocsTransController extends RController
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
		$model=new StudentDocsTrans;
		$stud_doc=new StudentDocs;

		$this->performAjaxValidation(array($model,$stud_doc));
		if(isset($_POST['StudentDocs']))
		{
		 $stud_doc->attributes=$_POST['StudentDocs'];
  		 $stud_doc->student_docs_path = CUploadedFile::getInstance($stud_doc,'student_docs_path');
			$valid = $stud_doc->validate();
			if($valid)
			{
			 $stud_doc->student_docs_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/stud_docs/' .$stud_doc->student_docs_path);
			$date = $_POST['StudentDocs']['student_docs_submit_date'];
			$submit_date = date("Y-m-d", strtotime($date));
			$stud_doc->student_docs_submit_date = $submit_date;
			
			$stud_doc->save();
		
			 $model->student_docs_trans_user_id = $_REQUEST['id'];
			 $model->student_docs_trans_stud_docs_id = $stud_doc->student_docs_id;
			
			 $model->save();

			$this->redirect(array('studentTransaction/studentdocs','id'=>$model->student_docs_trans_user_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,'stud_doc'=>$stud_doc,
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

		if(isset($_POST['StudentDocsTrans']))
		{
			$model->attributes=$_POST['StudentDocsTrans'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->student_docs_trans_id));
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
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('StudentDocsTrans');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentDocsTrans('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$model->attributes=$_GET['StudentDocsTrans'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionStudentDocs()
	{
		$model=new StudentDocsTrans('mysearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentDocsTrans']))
			$model->attributes=$_GET['StudentDocsTrans'];

		$this->render('studentdocstrans',array(
			'studentdocstrans'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=StudentDocsTrans::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-docs-trans-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
