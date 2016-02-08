<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class CourseMasterController extends RController
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
	 * With course unit details.
	 */
	public function actionView()
	{
		$lesson = new UnitDetailTable('unitwisesearch');
		$unit = new CourseUnitTable('coursewisesearch');
		$this->render('view',array(
		  'model'=>$this->loadModel($_REQUEST['id']), 'unit'=>$unit, 'lesson'=>$lesson,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'admin' page.
	 */
	public function actionCreate()
	{
		$model=new CourseMaster;

		$this->performAjaxValidation($model);

		if(isset($_POST['CourseMaster']))
		{
			$model->attributes=$_POST['CourseMaster'];
			$model->course_created_by = Yii::app()->user->id;
			$model->course_creation_date = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('view','id'=>$model->course_master_id));

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
		$this->performAjaxValidation($model);

		if(isset($_POST['CourseMaster']))
		{
			$model->attributes=$_POST['CourseMaster'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->course_master_id));
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
			$stud_tran = StudentTransaction::model()->findAll(array('condition'=>'student_transaction_course_id='.$id));
			if(!empty($stud_tran))
			{
				throw new CHttpException(400,'You can not delete this record because it is used in another table.');
			}
			else
			{
				$this->loadModel($id)->delete();
				CourseUnitTable::model()->deleteAll("course_unit_master_id = :courseId", array(':courseId'=>$id));
				UnitDetailTable::model()->deleteAll("unit_detail_course_id = :courseId", array(':courseId'=>$id));
		$this->redirect(array('admin'));

			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new CourseMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CourseMaster']))
			$model->attributes=$_GET['CourseMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CourseMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CourseMaster']))
			$model->attributes=$_GET['CourseMaster'];

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
		$model=CourseMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='course-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
