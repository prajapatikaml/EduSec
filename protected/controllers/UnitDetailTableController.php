<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class UnitDetailTableController extends RController
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
		$model=new UnitDetailTable;
		$this->performAjaxValidation($model);

		if(isset($_POST['UnitDetailTable']))
		{
			$model->attributes=$_POST['UnitDetailTable'];
			$model->unit_detail_unit_master_id = $_REQUEST['courseid'];
			$model->unit_detail_course_id = $_REQUEST['unit_id'];
			$model->unit_detail_created_by = Yii::app()->user->id;
			$model->unit_lec_date = date('Y-m-d',strtotime($_POST['UnitDetailTable']['unit_lec_date']));
			$model->unit_detail_creation_date = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('/courseUnitTable/view','id'=>$_REQUEST['unit_id']));
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
		$model->unit_lec_date = date('d-m-Y',strtotime($model->unit_lec_date));
		$this->performAjaxValidation($model);

		if(isset($_POST['UnitDetailTable']))
		{
			$model->attributes=$_POST['UnitDetailTable'];
			$model->unit_lec_date = date('Y-m-d',strtotime($_POST['UnitDetailTable']['unit_lec_date']));
			if($model->save())
				$this->redirect(array('view','id'=>$model->unit_detail_id));
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
		if(!Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$lesson = $this->loadModel($id);
			$unit_id = $lesson->unit_detail_unit_master_id;
			$lesson->delete();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			$this->redirect(array('/courseUnitTable/view','id'=>$unit_id));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new UnitDetailTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UnitDetailTable']))
			$model->attributes=$_GET['UnitDetailTable'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new UnitDetailTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UnitDetailTable']))
			$model->attributes=$_GET['UnitDetailTable'];

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
		$model=UnitDetailTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='unit-detail-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
