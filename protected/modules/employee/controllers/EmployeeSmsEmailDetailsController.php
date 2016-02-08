<?php

class EmployeeSmsEmailDetailsController extends EduSecCustom
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


	public function actionMycreate()
	{

		$model=new EmployeeSmsEmailDetails;
		$emp_trans=new EmployeeTransaction;
		$this->performAjaxValidation($model);
		Yii::app()->clientScript->registerScript("message-script", "
		$(document).ready(function() {
		$('input.radio').bind('change', function (){
		    if($(this).val()=='1')
			$('#EmployeeSmsEmailDetails_message_email_text').attr('maxlength','160');
		    else
			 $('#EmployeeSmsEmailDetails_message_email_text').attr('maxlength','');
		});
		});
		", CClientScript::POS_END);
//alert($('#EmployeeSmsEmailDetails_email_sms_status_0').val());	
		if(isset($_POST['EmployeeSmsEmailDetails']))
		{
			$model->attributes=$_POST['EmployeeSmsEmailDetails'];
			//$branch_id=$model->branch_id;
			$dep_id=$model->department_id;
			$sms_email_status=$model->email_sms_status;
			$emp_ids = Yii::app()->db->createCommand()
				 ->select('employee_transaction_id,employee_transaction_employee_id,employee_transaction_department_id')
				 ->from('employee_transaction')			    			   
				 ->where('employee_transaction_department_id='.$dep_id)
				 ->queryAll();

			$count = count($emp_ids);
			
			if($count != 0) {

				//$flag = true;
				if($sms_email_status == 2) {
					foreach($emp_ids as $emp_info_ids)
						$info_id[] = EmployeeInfo::model()->findByPk($emp_info_ids['employee_transaction_employee_id'])->employee_private_email;
						$result = implode(',', $info_id);

						$this->actionBackground($result,$model->message_email_text);
					}
					else {
						foreach($emp_ids as $emp_info_ids)
							$phone_nos[] = EmployeeInfo::model()->findByPk($emp_info_ids['employee_transaction_employee_id'])->employee_private_mobile;
					
						$this->actionBackgroundmsg($phone_nos,$model->message_email_text);
					}}
			else
			{
			  Yii::app()->user->setFlash('no-record', "There is No match Found!");
			  $this->redirect(array('employeeSmsEmailDetails/my_create'));
			}

		}

		$this->render('my_create',array(
			'model'=>$model,
		));
	}
	

	public function actionDoChacked(){
		$model=new EmployeeSmsEmailDetails;
		$model->scenario='selectedsms';
		Yii::app()->clientScript->registerScript("message-script", "
		$(document).ready(function() {
		$('input.radio').bind('change', function (){
		    if($(this).val()=='1')
			$('#EmployeeSmsEmailDetails_message_email_text').attr('maxlength','160');
		    else
			 $('#EmployeeSmsEmailDetails_message_email_text').attr('maxlength','');
		});
		});
		", CClientScript::POS_END);
		$this->performAjaxValidation($model);
		if(isset($_POST['EmployeeSmsEmailDetails'])) {
		   $model->attributes=$_POST['EmployeeSmsEmailDetails'];
		    $emp_ids = $_POST['result']; 
		   foreach ($emp_ids as $item) {
			$num_list[]=EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$item))->employee_private_mobile;
			$email_list[]=EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$item))->employee_private_email;
		   }		

		$message=$model->message_email_text;
		$sms_email_status=$model->email_sms_status;

		if($sms_email_status==1)
		{
			$output = implode(",",$num_list);	
			$smsobj=new SmsApi;
			$r=$smsobj->sendsms($output,$message);
			if(preg_match('/SMS/',$r))
   			{
				echo 'Message sucessfully sent';
				$i=0;
				foreach($emp_ids as $item)
				{			
					$model->employee_sms_email_id=null;				
					$model->employee_id = $item;	
					$model->created_by = Yii::app()->user->id;
					$model->creation_date = new CDbExpression('NOW()');
					$tran=EmployeeTransaction::model()->findByPk($item);
					$department=$tran->employee_transaction_department_id;
					$model->department_id=$department;
					$model->employee_sms_email_details_ack_id="sent";
					$model->setIsNewRecord(true);
					$model->save(false);
					$i++;
				}
			$this->redirect(array('admin'));	
			}
			else
			{
				$this->render('error_form');
	
			}
		}
		if($sms_email_status==2)
		{
				$mailobj=new MailApi;
				$to = implode(",",$email_list);
				
				$mailobj->sendmail($to,$message);

				foreach($emp_ids as $item)
				{
					$model->employee_sms_email_id=null;
					$model->employee_id = $item;	
					$model->created_by = Yii::app()->user->id;
					$model->creation_date = new CDbExpression('NOW()');
					$tran=EmployeeTransaction::model()->findByPk($item);
					$department=$tran->employee_transaction_department_id;
					$model->department_id=$department;
					
					$model->setIsNewRecord(true);

					$model->save(false);
				}
			$this->redirect(array('admin'));	

			}
		}
		else {
		
		  if(!empty($_POST['selectedempid'])) 
		   {
		     $emp_data =explode(',', $_POST['selectedempid']);		
		     $this->render('message_form',array('list'=>$emp_data,'model'=>$model));
	 	   }
		   else {
		   	$this->redirect(array('employeebulksmsemail'));	
		   }
		}
        }	

	public function actionEmployeeBulkSmsEmail()
	{
		$model=new EmployeeTransaction('smssearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeTransaction']))
			$model->attributes=$_GET['EmployeeTransaction'];

		$this->render('select_employee',array(
			'model'=>$model,
			));

	}

	public function actionBackground($result,$msg)
	{
		//$count = count($info_id);

		Yii::import('application.extensions.runactions.components.ERunActions');
			
		require_once "Mail.php";

		if (ERunActions::runBackground())
		{
		
			for($i=0;$i<$count;$i++)
			{
				$mailobj=new MailApi;
				$to = $result;
				
				$mailobj->sendmail($to,$msg);
			}
		}
		else
		{
			$this->redirect(array('admin'));
		}
	}

	public function actionBackgroundmsg($phone_nos,$msg)
	{
		$count = count($phone_nos);

		Yii::import('application.extensions.runactions.components.ERunActions');
			
		//require_once "Mail.php";

		if (ERunActions::runBackground()) {
			$output = implode(",",$phone_nos);
			$smsobj=new SmsApi;
			$r=$smsobj->sendsms($output,$msg);
				if(preg_match('/alert_/',$r))
					echo 'sent';
				
			}
		else
		{
			$this->redirect(array('admin'));
		}
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['EmployeeSmsEmailDetails']))
		{
			$model->attributes=$_POST['EmployeeSmsEmailDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->employee_sms_email_id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	/*	$dataProvider=new CActiveDataProvider('EmployeeSmsEmailDetails');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */

		$model=new EmployeeSmsEmailDetails('search');
		//$this->actionBackground();

		//ERunActions::touchUrl($this->createUrl('site/timeConsumingProcess'));

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeSmsEmailDetails']))
			$model->attributes=$_GET['EmployeeSmsEmailDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EmployeeSmsEmailDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EmployeeSmsEmailDetails']))
			$model->attributes=$_GET['EmployeeSmsEmailDetails'];

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
		$model=EmployeeSmsEmailDetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-sms-email-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
