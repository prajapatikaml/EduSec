<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class MessageOfDayController extends RController
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

	public function actions()
	{
		return array(
		        'toggle'=>'ext.jtogglecolumn.ToggleAction',
		        'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
		);
    	}

	/* Print only message */
	public function actionprint_message($id)
	{
		$this->layout='receipt_layout';
		$model=MessageOfDay::model()->findByPk($id);
		$message = $model->message;
		
		$this->render('print_message',array(
			'message'=>$message,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'admin' page.
	 */
	public function actionCreate()
	{
		$model=new MessageOfDay;
		$this->performAjaxValidation($model);

		if(isset($_POST['MessageOfDay']))
		{
			$model->attributes=$_POST['MessageOfDay'];
			$model->created_by = Yii::app()->user->id;
            		$model->creation_date = new CDbExpression('NOW()');
			if($model->message_of_day_active=='1')
			{
			$model->updateAll(array('message_of_day_active'=>0));
		        $model->message_of_day_active = 1;
			}

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
		$this->performAjaxValidation($model);

		if(isset($_POST['MessageOfDay']))
		{
			$model->attributes=$_POST['MessageOfDay'];
			if($model->message_of_day_active=='1')
			{
			$model->updateAll(array('message_of_day_active'=>0));
		        $model->message_of_day_active = 1;
			}
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
		$model=new MessageOfDay('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MessageOfDay']))
			$model->attributes=$_GET['MessageOfDay'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MessageOfDay('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MessageOfDay']))
			$model->attributes=$_GET['MessageOfDay'];

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
		$model=MessageOfDay::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-of-day-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
