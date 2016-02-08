<?php

class StateController extends EduSecCustom
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $name;
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
		$model=new State;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['State']))
		{
			$model->attributes=$_POST['State'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->state_id));
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

		if(isset($_POST['State']))
		{
			$model->attributes=$_POST['State'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->state_id));
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
		// we only allow deletion via POST request
		try{
		    $this->loadModel($id)->delete();
		    if(!isset($_GET['ajax']))
			    $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}catch (CDbException $e){
			throw new CHttpException(400,'You can not delete this record because it is used in another table.');
		}
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
/*		$dataProvider=new CActiveDataProvider('State');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */
		$model=new State('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['State']))
			$model->attributes=$_GET['State'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new State('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['State']))
			$model->attributes=$_GET['State'];

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
		$model=State::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='state-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	 
}
