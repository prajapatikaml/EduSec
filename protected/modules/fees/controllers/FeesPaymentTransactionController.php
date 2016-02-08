<?php

class FeesPaymentTransactionController extends Controller
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
			'accessControl', // perform access control for CRUD operations
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
		$model=new FeesPaymentTransaction;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentTransaction']))
		{
			$model->attributes=$_POST['FeesPaymentTransaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fees_payment_transaction_id));
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['FeesPaymentTransaction']))
		{
			$model->attributes=$_POST['FeesPaymentTransaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->fees_payment_transaction_id));
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
			$model=$this->loadModel($id);
			$model->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('create','id'=>$model->fees_payment_student_id));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FeesPaymentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FeesPaymentTransaction']))
			$model->attributes=$_GET['FeesPaymentTransaction'];

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
		$model=FeesPaymentTransaction::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && ($_POST['ajax']==='fees-payment-transaction-form' || $_POST['ajax']==='course-wise-fees-report'))
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAddfees()
	{
		$model = new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];

		$this->render('add_fees_student_list',array(
			'stud_model'=>$model,
		));
	}
	public function actionPayfeescash()
	{
		$model=new FeesPaymentTransaction;	
		if(isset($_POST['FeesPaymentTransaction']))
		{ 
		$model->attributes=$_POST['FeesPaymentTransaction'];
		$model->fees_payment_received_date=new CDbExpression('NOW()');
		$model->fees_payment_user_id = Yii::app()->user->id;
		$model->fees_payment_type = 'Cash';
		$receipt_no = Yii::app()->db->createCommand()
				->select('MAX(fees_payment_receipt_no) as receipt_id')
				->from('fees_payment_transaction')
				->queryRow();
		$model->fees_payment_receipt_no = $receipt_no['receipt_id']+1;
		$model->fees_payment_student_id = $_REQUEST['id'];
		$academic=StudentTransaction::model()->findByPk($_REQUEST['id']);
		$model->fees_payment_batch_id = $academic->student_transaction_batch_id;
		$model->fees_student_academic_term_id= $academic->academic_term_id;
		$model->fees_student_academic_term_period_id=$academic->academic_term_period_id;
		$model->fees_student_course_id=$academic->course_id;
		if($model->save())
		$this->redirect(array('create','id'=>$model->fees_payment_student_id));
		}
		$this->render('payfeescash',array(
			'model'=>$model,
		));
	}
	public function actionUpadatefeescash($fees_id)
	{
		$model=$this->loadModel($fees_id);
		if(isset($_POST['FeesPaymentTransaction']))
		{ 
		$model->attributes=$_POST['FeesPaymentTransaction'];
		if($model->save())
			$this->redirect(array('create','id'=>$model->fees_payment_student_id));
		}
		$this->render('updatefeescash',array(
			'model'=>$model,
		));
	}
	public function actionPayfeescheque()
	{
		$model=new FeesPaymentTransaction;
		$model->scenario="feespaycheque";
		if(isset($_POST['FeesPaymentTransaction']))
		{ 
		$model->attributes=$_POST['FeesPaymentTransaction'];
		
		$model->fees_payment_received_date=new CDbExpression('NOW()');
		$model->fees_payment_user_id = Yii::app()->user->id;
		$model->fees_payment_type = 'Cheque';
		$receipt_no = Yii::app()->db->createCommand()
				->select('MAX(fees_payment_receipt_no) as receipt_id')
				->from('fees_payment_transaction')
				->queryRow();
		$model->fees_payment_receipt_no = $receipt_no['receipt_id']+1;
		$model->fees_payment_student_id = $_REQUEST['id'];
		$model->fees_payment_cheque_date = date('Y-m-d', strtotime($_POST['FeesPaymentTransaction']['fees_payment_cheque_date']));
		$academic=StudentTransaction::model()->findByPk($_REQUEST['id']);
		$model->fees_payment_batch_id = $academic->student_transaction_batch_id;
		$model->fees_student_academic_term_id= $academic->academic_term_id;
		$model->fees_student_academic_term_period_id=$academic->academic_term_period_id;
		$model->fees_student_course_id=$academic->course_id;
		if($model->save())
			$this->redirect(array('create','id'=>$model->fees_payment_student_id));
		}
		$this->render('payfeescheque',array(
			'model'=>$model
		));
	}
	public function actionUpdatefeescheque($fees_id)
	{
		$model=$this->loadModel($fees_id);
		$model->scenario="feespaycheque";
		if(isset($_POST['FeesPaymentTransaction']))
		{ 
		$model->fees_payment_cheque_date = date('Y-m-d', strtotime($_POST['FeesPaymentTransaction']['fees_payment_cheque_date']));
		if($model->save())
			$this->redirect(array('create','id'=>$model->fees_payment_student_id));
		}
		$this->render('updatefeescheque',array(
			'model'=>$model
		));
	}
	public function actionStudentFeesReport()
	{
		$model = array();
		$info_model = array();
		if(!empty($_POST['roll_no']))
		{						
			$info_model= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_roll_no="'.$_POST['roll_no'].'"')
					->queryAll();

			$model=FeesPaymentTransaction::model()->findAll('fees_payment_student_id='.$info_model[0]['student_transaction_id']);
			if(empty($info_model))
			{
				Yii::app()->user->setFlash('no-student-found', "No student found with this Roll No.");
				$this->redirect(array('StudentFeesReport'));	
			}
		}
		if(isset($_REQUEST['excel'])) {
				 Yii::app()->request->sendFile(date('YmdHis').'.xls',
				    $this->renderPartial('student_fees_report_excel', array('roll_no'=>$_REQUEST['roll_no']
				    ), true)
				);
		}
		$this->render('student_fees_report',array(
				'model'=>$model,'info_model'=>$info_model,
				));	
	}
	public function actionCourseWiseFeesReport() //done by hirenb
	{
		$model=new FeesPaymentTransaction;
		$model->scenario = 'courseWiseFeesReport';
		$this->performAjaxValidation($model);
		$status=false;
		$student_data = array();
		$query = NULL;
		if(!empty($_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']) || !empty($_REQUEST['FeesPaymentTransaction']['fees_student_course_id']))
		{
			$status=true;
			 if(!empty($_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']))
			{
				$query.="st.student_transaction_batch_id=".$_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']." AND ";
			}
			/*
			if(!empty($_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_id']))
			{
				$query.="st.academic_term_id = ".$_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_id']." AND ";
			}  */
			
			$query_final = $query."st.course_id = ". $_REQUEST['FeesPaymentTransaction']['fees_student_course_id']."";


			$student_data = Yii::app()->db->createCommand()
		        ->select('st.*, si.student_roll_no, si.student_first_name, si.student_last_name,si.student_middle_name')
		        ->from('student_transaction st')
		        ->join('student_info si','si.student_info_transaction_id = st.student_transaction_id')
		        ->where($query_final.' order by si.student_roll_no')
		        ->queryAll();	
		}
		
		//start export PDF and Excel by hiren
		if(!empty($_REQUEST['exp_batch_id']) || !empty($_REQUEST['exp_course_id']))
		{
			
			if(!empty($_REQUEST['exp_batch_id']))
			{
				$query.="st.student_transaction_batch_id=".$_REQUEST['exp_batch_id']." AND ";
			}
			
			if(!empty($_REQUEST['exp_sem_id']))
			{
				$query.="st.academic_term_id = ".$_REQUEST['exp_sem_id']." AND ";
			}
			
			$query_final = $query." st.course_id = ".$_REQUEST['exp_course_id']."";
		
			$exp_stu_data = Yii::app()->db->createCommand()
		        ->select('st.*, si.student_roll_no, si.student_first_name, si.student_last_name,si.student_middle_name')
		        ->from('student_transaction st')
		        ->join('student_info si','si.student_info_transaction_id = st.student_transaction_id')
		        ->where($query_final.' order by si.student_roll_no')
		        ->queryAll();	
		}
		if(isset($_REQUEST['PDF']))
		{
			$pdf = new ExportToPdf;
			$filename="StudentFeesReport_".date('YmdHis').".pdf";
			$html = $this->renderPartial('course_wise_fees_report_pdf', array('exp_stu_data'=>$exp_stu_data), true);
			$pdf->exportData('Couser Wise Student Fees Report',$filename,$html);
		}
		if(isset($_REQUEST['excel']))
		{
			Yii::app()->request->sendFile(date('YmdHis').'.xls',
				    $this->renderPartial('course_wise_fees_report_excel', array('exp_stu_data'=>$exp_stu_data), true)
				);
		}		

		$this->render('course_wise_fees_report',array(
				'model'=>$model,'status'=>$status,'student_data'=>$student_data
				));
			
	}
	
}
