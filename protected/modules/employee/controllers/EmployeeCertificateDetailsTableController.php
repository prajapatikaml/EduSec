<?php

class EmployeeCertificateDetailsTableController extends EduSecCustom
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
		$sql = "DELETE FROM employee_certificate_details_table WHERE  	employee_certificate_details_table_id IN ($allIds)";
		$cmd = Yii::app()->db->createCommand($sql);
		$cmd->execute();

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
		
		$model=new EmployeeCertificateDetailsTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeCertificateDetailsTable']))
			$model->attributes=$_GET['EmployeeCertificateDetailsTable'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	/**
	* This action return the list of the certificate of the employee.
	*/
	public function actionEmployeeCertificates()
	{
		
		$model=new EmployeeCertificateDetailsTable('Employeesearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeCertificateDetailsTable']))
			$model->attributes=$_GET['EmployeeCertificateDetailsTable'];

		$this->render('employeecertificate',array(
			'employeecertificate'=>$model,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=EmployeeCertificateDetailsTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-certificate-details-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
       
}
	
