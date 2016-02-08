<?php
class LanguagesController extends EduSecCustom
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
		$model=new Languages;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Languages']))
		{
			$model->attributes=$_POST['Languages'];
			$model->languages_created_by=Yii::app()->user->id;
			$model->languages_created_date=new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->languages_id));
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

		if(isset($_POST['Languages']))
		{
			$model->attributes=$_POST['Languages'];
			if($model->save())
				$this->redirect(array('admin'));//$this->redirect(array('view','id'=>$model->languages_id));
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
		$languae_known = LanguagesKnown::model()->findAll(array('condition'=>'languages_known1='.$id.' OR  languages_known2='.$id.' OR languages_known3='.$id.' OR languages_known4='.$id));

		if(!empty($languae_known))
		{
			throw new CHttpException(400,'You can not delete this record because it is used in another table.');
		}	
        	else
		{	
			$this->loadModel($id)->delete();
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
		$model=new Languages('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Languages']))
			$model->attributes=$_GET['Languages'];

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
		$model=Languages::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='languages-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	 

}
