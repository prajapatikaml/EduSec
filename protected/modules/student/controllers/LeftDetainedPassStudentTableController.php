<?php

class LeftDetainedPassStudentTableController extends RController
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
	 public function behaviors()
	 {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
		    ),
		);
	 }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
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
		$model=new LeftDetainedPassStudentTable;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['LeftDetainedPassStudentTable']))
		{
			$model->attributes=$_POST['LeftDetainedPassStudentTable'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdatestudentstatus($id)
	{
		$status_model = $this->loadModel($id);
		$model=new LeftDetainedPassStudentTable;
		$stud_id  = StudentTransaction::model()->findByPk($status_model->student_id);
		$acd_name = AcademicTerm::model()->findByPk($stud_id->student_academic_term_name_id);
		$current = AcademicTerm::model()->findByAttributes(array('academic_term_name'=>$acd_name->academic_term_name,'current_sem'=>1,'academic_term_organization_id'=>Yii::app()->user->getState('org_id')));
				

		if(isset($_POST['LeftDetainedPassStudentTable']))	
		{
		 
		   if($_POST['LeftDetainedPassStudentTable']['status_id']==2)
		   {
		   	
			if(!empty($current) && $stud_id->student_academic_term_name_id !=$current->academic_term_id)
			{
		   	   $model->student_id = $stud_id->student_transaction_id;
		   	   $model->status_id = 2;
		   	   $model->left_detained_pass_student_cancel_date = NULL;
		   	   $model->academic_term_period_id = $current->academic_term_period_id;
		   	   $model->sem = $current->academic_term_id;
		   	   $model->creation_date = new CDbExpression('NOW()');
		   	   $model->created_by = Yii::app()->user->id;
		   	   $model->oraganization_id = Yii::app()->user->getState('org_id');
		   	   $model->save(false);

			   $stud_id->student_academic_term_period_tran_id = $current->academic_term_period_id;
			   $stud_id->student_academic_term_name_id = $current->academic_term_id;
			   $stud_id->save(false);
			   
		   	   Yii::app()->user->setFlash('success','Detain Successfully');
			}
			else
			{
			   Yii::app()->user->setFlash('error','You can not detain this student again in this sem!');
			}
			$this->redirect(array('/student/leftDetainedPassStudentTable/admin'));
		      }
		      else if($_POST['LeftDetainedPassStudentTable']['status_id']==6)
		      {
			if(!empty($current) && $stud_id->student_academic_term_name_id !=$current->academic_term_id)
			{
			$stud_id->student_transaction_detain_student_flag =$_POST['LeftDetainedPassStudentTable']['status_id'];
		
			$stud_id->student_academic_term_period_tran_id = $current->academic_term_period_id;
			$stud_id->student_academic_term_name_id = $current->academic_term_id;
			$stud_id->save(false);
			Yii::app()->user->setFlash('success','Rejoin Successfully');
			}
			else
				Yii::app()->user->setFlash('error','Sorry, You can not rejoin this student in this sem!');
			$this->redirect(array('/student/leftDetainedPassStudentTable/admin'));

		   }
		else if($_POST['LeftDetainedPassStudentTable']['status_id']==5)
		{
		
			if(!empty($current) && $stud_id->student_academic_term_name_id ==$acd_name->academic_term_id)
			{
			$stud_id->student_transaction_detain_student_flag =5;
		
			$stud_id->student_academic_term_period_tran_id = $current->academic_term_period_id;
			$stud_id->student_academic_term_name_id = $current->academic_term_id;
			if($stud_id->save(false))
				$status_model->delete();
			Yii::app()->user->setFlash('success','Regular Successfully');
			}
			else
				Yii::app()->user->setFlash('error','Sorry, You can not make regular this student in this sem!');
			$this->redirect(array('/student/leftDetainedPassStudentTable/admin'));

		}

		
		}
		$this->render('updateStudentStatus',array(
			'status_model'=>$status_model,
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

		if(isset($_POST['LeftDetainedPassStudentTable']))
		{
			StudentTransaction::model()->updateByPk($model->student_id, array('student_transaction_detain_student_flag'=>$_POST['LeftDetainedPassStudentTable']['status_id']));

			$model->attributes=$_POST['LeftDetainedPassStudentTable'];
			if($model->save())
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
		/*$dataProvider=new CActiveDataProvider('LeftDetainedPassStudentTable');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$model=new LeftDetainedPassStudentTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftDetainedPassStudentTable']))
			$model->attributes=$_GET['LeftDetainedPassStudentTable'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LeftDetainedPassStudentTable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftDetainedPassStudentTable']))
			$model->attributes=$_GET['LeftDetainedPassStudentTable'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionCancelstudentlist()
	{
		$model=new LeftDetainedPassStudentTable('cancelstudentlist');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LeftDetainedPassStudentTable']))
			$model->attributes=$_GET['LeftDetainedPassStudentTable'];

		$this->render('cancel_student_list',array(
			'model'=>$model,
		));
	}
	public function actionLeftClearStudent()
	{
		$model=new StudentTransaction('leftStudentSearch');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];
			//print_r($_GET['StudentTransaction']);exit;

		$this->render('leftClearStudent',array(
			'model'=>$model,
		));
	}
	public function actionCanceladmission()
	{
		$model=new StudentTransaction('leftStudentSearch');
		
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];
			//print_r($_GET['StudentTransaction']);exit;

		$this->render('cancel_admission',array(
			'model'=>$model,
		));
	}
	public function actionUpdatestatus()
	{
		//echo $_REQUEST['id'];exit;	
		$stud_id  = StudentTransaction::model()->findByPk($_REQUEST['id']);
		$status_model = new LeftDetainedPassStudentTable;
		if(isset($_POST['update_status_student']))
		{
			$status_model->attributes=$_POST['LeftDetainedPassStudentTable'];	
			$status_model->student_id = $stud_id->student_transaction_id;

			$status_model->status_id = $status_model->status_id;
			if($status_model->left_detained_pass_student_cancel_date == "")
			{
				$status_model->left_detained_pass_student_cancel_date = NULL;	
			}
			else
			{
				$cancel_date = $status_model->left_detained_pass_student_cancel_date;
				$date = date("Y-m-d", strtotime($cancel_date));
				$status_model->left_detained_pass_student_cancel_date = $date;
			}
			$status_model->academic_term_period_id = $stud_id->student_academic_term_period_tran_id;
			$status_model->sem = $stud_id->student_academic_term_name_id;
			$status_model->creation_date = new CDbExpression('NOW()');
			$status_model->created_by = Yii::app()->user->id;
			$status_model->oraganization_id = Yii::app()->user->getState('org_id');
			$status_model->save(false);
			$stud_id->student_transaction_detain_student_flag = $status_model->status_id;
			$stud_id->save(false);
			$this->redirect(array('leftDetainedPassStudentTable/admin'));
		}
		
		$model=new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];
			$this->render('update_status',array(
			'model'=>$model,'status_model'=>$status_model,
		));
	}
	public function actionCancelstudent()
	{
		$stud_id  = StudentTransaction::model()->findByPk($_REQUEST['id']);
		$status_model = new LeftDetainedPassStudentTable;
		$this->performAjaxValidation($status_model);
		if(isset($_POST['update_status_student']))
		{
			$status_model->attributes=$_POST['LeftDetainedPassStudentTable'];	
			$status_model->student_id = $stud_id->student_transaction_id;
			$status_model->status_id = $status_model->status_id;
			if($status_model->left_detained_pass_student_cancel_date == "")
			{
				$status_model->left_detained_pass_student_cancel_date = NULL;	
			}
			else
			{
				$cancel_date = $status_model->left_detained_pass_student_cancel_date;
				$date = date("Y-m-d", strtotime($cancel_date));
				$status_model->left_detained_pass_student_cancel_date = $date;
			}
			$status_model->academic_term_period_id = $stud_id->student_academic_term_period_tran_id;
			$status_model->sem = $stud_id->student_academic_term_name_id;
			$status_model->creation_date = new CDbExpression('NOW()');
			$status_model->created_by = Yii::app()->user->id;
			$status_model->oraganization_id = Yii::app()->user->getState('org_id');
			$status_model->save(false);
			$stud_id->student_transaction_detain_student_flag = $status_model->status_id;
			$stud_id->save(false);
			$this->redirect(array('leftDetainedPassStudentTable/cancelstudentlist'));
		}
		
		$model=new StudentTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentTransaction']))
			$model->attributes=$_GET['StudentTransaction'];
			$this->render('cancel_student',array(
			'model'=>$model,'status_model'=>$status_model,
		));
	}


	public function actionRejoin()
	{
		//echo $_REQUEST['id'];exit;
		$stud_id  = StudentTransaction::model()->findByPk($_REQUEST['id']);
		$status_model = new LeftDetainedPassStudentTable;
		
		Yii::app()->clientScript->registerScript("address1-script", "
			    $('#LeftDetainedPassStudentTable_status_id').change(function () {
					
					if($('#LeftDetainedPassStudentTable_status_id option:selected').text()=='Rejoin'){
					$('#LeftDetainedPassStudentTable_left_detained_pass_student_cancel_date').attr('disabled', true);			
					}
					else
					{
						$('#LeftDetainedPassStudentTable_left_detained_pass_student_cancel_date').attr('disabled', false);	
					}
					
				});
			", CClientScript::POS_END);
		if(isset($_POST['update_status_student']))
		{
			
			$status_model->attributes=$_POST['LeftDetainedPassStudentTable'];
		
			$acd_name = AcademicTerm::model()->findByPk($stud_id->student_academic_term_name_id)->academic_term_name;
		
			$current = AcademicTerm::model()->findByAttributes(array('academic_term_name'=>$acd_name,'current_sem'=>1,'academic_term_organization_id'=>Yii::app()->user->getState('org_id')));
		
			$stud_id->student_transaction_detain_student_flag =$status_model->status_id;
		
			$stud_id->student_academic_term_period_tran_id = $current->academic_term_period_id;
			$stud_id->student_academic_term_name_id = $current->academic_term_id;
			$stud_id->save();

			$this->redirect(array('/student/studentTransaction/admin'));
		}
		
			$this->render('update_status',array(
			'status_model'=>$status_model,
		));
	}

	public function actionDetainAgain()
	{
		//echo $_REQUEST['id'];exit;
		$stud_id  = StudentTransaction::model()->findByPk($_REQUEST['id']);
		$status_model = new LeftDetainedPassStudentTable;
		
		
		$acd_name = AcademicTerm::model()->findByPk($stud_id->student_academic_term_name_id);
		
		$current = AcademicTerm::model()->findByAttributes(array('academic_term_name'=>$acd_name->academic_term_name,'current_sem'=>1,'academic_term_organization_id'=>Yii::app()->user->getState('org_id')));
	if(!empty($current) && $stud_id->student_academic_term_name_id !=$acd_name->academic_term_id)
		{
		
		   $status_model->student_id = $stud_id->student_transaction_id;
		   $status_model->status_id = 2;
		   $status_model->left_detained_pass_student_cancel_date = NULL;
		   $status_model->academic_term_period_id = $current->academic_term_period_id;
		   $status_model->sem = $current->academic_term_id;
		   $status_model->creation_date = new CDbExpression('NOW()');
		   $status_model->created_by = Yii::app()->user->id;
		   $status_model->oraganization_id = Yii::app()->user->getState('org_id');
		
		   $status_model->save(false);
		   Yii::app()->user->setFlash('success','Detain Successfully');
		}
		else
		{
		   Yii::app()->user->setFlash('error','You can not detain this student again in this sem!');
		}
		

		$this->redirect(array('/student/leftDetainedPassStudentTable/admin'));
		
		
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=LeftDetainedPassStudentTable::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='left-detained-pass-student-table-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	

	
}
