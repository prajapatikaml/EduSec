<?php

class BatchController extends EduSecCustom
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
		$model=new Batch;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Batch']))
		{
			//print $_REQUEST['courseId']; exit;
			$model->attributes=$_POST['Batch'];
			//print_r($model->attributes); exit;
			$batchname = $model->batch_name;
			if($_POST['Batch']['batch_start_date'] !=null && $_POST['Batch']['batch_start_date']!=0000-00-00)
			{
			$model->batch_start_date = date('Y-m-d', strtotime($model->batch_start_date));
			}
			else
			{
			$model->batch_start_date = '';
			}
			if($_POST['Batch']['batch_end_date'] !=null && $_POST['Batch']['batch_end_date']!=0000-00-00)
			{
			$model->batch_end_date = date('Y-m-d', strtotime($model->batch_end_date));
			}
			else
			{
			$model->batch_end_date = '';
			}
			$model->batch_created_by=Yii::app()->user->id;
			$model->batch_creation_date=new CDbExpression('NOW()');
			//$model->academic_term_id=$_POST['Batch']['academic_term_id'];
			if($model->save()) {
			   if(isset($_REQUEST['courseId']))
				$this->redirect(array('/course/'.$_REQUEST['courseId']));
			   else
				$this->redirect(array('admin'));
			}
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

		if(isset($_POST['Batch']))
		{
			$model->attributes=$_POST['Batch'];
			$batchname = $model->batch_name;
			if($_POST['Batch']['batch_start_date'] !=null && $_POST['Batch']['batch_start_date']!=0000-00-00)
			{
			$model->batch_start_date = date('Y-m-d', strtotime($model->batch_start_date));
			}
			else
			{
			$model->batch_start_date = '';
			}
			if($_POST['Batch']['batch_end_date'] !=null && $_POST['Batch']['batch_end_date']!=0000-00-00)
			{
			$model->batch_end_date = date('Y-m-d', strtotime($model->batch_end_date));
			}
			else
			{
			$model->batch_end_date = '';
			}
			//$model->academic_term_id=$_POST['Batch']['academic_term_id'];
			if($model->save() && isset($_REQUEST['flag']))
				$this->redirect(array('course/'.$_POST['Batch']['course_id']));
			else
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
			$st_tran = StudentTransaction::model()->findAll(array('condition'=>'student_transaction_batch_id='.$id));
			$count = count(Batch::model()->findAll(array('condition'=>'batch_id='.$id)));
			if(!empty($st_tran))
			{
				throw new CHttpException(400,'You can not delete this record because it is used in another table.');
			}	
			else
			{
			    if($count == 1)
				{
				  throw new CHttpException(400,'You can\'t Delete this Record because Course must have minimum one Batch.');
				}
				else {	
				$this->loadModel($id)->delete();
				   }
			}
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Batch('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Batch']))
			$model->attributes=$_GET['Batch'];

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
		$model=Batch::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='batch-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
