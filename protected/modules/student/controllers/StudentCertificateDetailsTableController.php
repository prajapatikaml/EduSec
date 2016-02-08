<?php

class StudentCertificateDetailsTableController extends EduSecCustom
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
			'rights',  // perform access control for CRUD operations
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
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		if(!empty($_POST['certiid']))
		{
		$certidelete = $_POST['certiid'];
		$allIds = (is_array($certidelete)) ? implode(",",$certidelete) : $certidelete;
		$sql = "DELETE FROM student_certificate_details_table WHERE student_certificate_details_table_id IN ($allIds)";
		$cmd = Yii::app()->db->createCommand($sql);
		$cmd->execute();

		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionStudentCertificate()
	{
		$model=new StudentCertificateDetailsTable('Studentsearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentCertificateDetailsTable']))
			$model->attributes=$_GET['StudentCertificateDetailsTable'];

		$this->render('studentcertificate',array(
			'studentcertificate'=>$model,
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new StudentCertificateDetailsTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentCertificateDetailsTable']))
			$model->attributes=$_GET['StudentCertificateDetailsTable'];

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
		$model=StudentCertificateDetailsTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-certificate-details-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       
}
	
