<?php

class EmployeeAttendenceController extends EduSecCustom
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
	* This action is used for single month attendence report of the employee.
	*/
	public function actionSinglemonthattendence()
	{
		$model=new Employee_attendence;
		$model->scenario = 'singlemonthattendence';		
		$this->performAjaxValidation($model);

		$this->render('monthattendence',array(
				'model'=>$model,
		));
	}
	/**
	* This action is used to find monthwise employee attendence 
	* by selecting employee name and month. 
	*/
	public function actionMonthlyempattendance()
	{
		$model=new Employee_attendence('month_empattendance');
		
		if(!empty($_POST['user_id1']))
		{
			$emp_id = $_POST['user_id1'];
			$month = $_POST['Employee_attendence']['month'];
			
			$this->render('monthlyempattendance',array(
				'model'=>$model,'emp_id'=>$emp_id,'month'=>$month,
			));
			
		}
		else
		{
			$this->render('monthlyempattendance',array(
				'model'=>$model,
			));
		}
	}
	/**
	* This action is used to update a singe day single employee 
	* update the attendence of the employee.
	*/
	public function actionEmployeeupdate($id)
	{
		$model=$this->loadModel($id);
		$old=$this->loadModel($id);

		Yii::app()->clientScript->registerScript("address-script", "
			    $('#Employee_attendence_attendence').change(function () {
					
					if($('#Employee_attendence_attendence option:selected').text()=='Absent'){
					$('#Employee_attendence_time1').val('00:00:00');
					$('#Employee_attendence_time2').val('00:00:00');
					$('#Employee_attendence_time1').attr('disabled', true);	
					$('#Employee_attendence_time2').attr('disabled', true);
								
					}
					else
					{
						$('#Employee_attendence_time1').attr('disabled', false);	
						$('#Employee_attendence_time2').attr('disabled', false);
								

					}
				});
			", CClientScript::POS_END);
		if(!empty($_POST['Employee_attendence']['attendence']))
		{
			$att = $_POST['Employee_attendence']['attendence'];
			if(!empty(LeaveMaster::model()->findByPk($att)->leave_master_category))
				$leave_name = LeaveMaster::model()->findByPk($att)->leave_master_category;
			else
				$leave_name = $att;
			$model->attributes=$_POST['Employee_attendence'];
			$model->attendence = $leave_name;
	
			if($_POST['Employee_attendence']['attendence'] == 'LWP')
			{
				$model->attendence = "LWP";
				$model->time1 = "00:00:00";
				$model->time2 = "00:00:00";
				$model->total_hour = "00:00:00";
				$model->overtime_hour = "00:00:00";
				
			}
			else
			{
				
				$model->time1 = date("H:i", strtotime($_POST['Employee_attendence']['time1']));
				$model->time2 = date("H:i", strtotime($_POST['Employee_attendence']['time2']));
			}
			$model->save();
			$this->redirect(array('admin'));

		}
		$this->render('employeeupdate',array(
			'model'=>$this->loadModel($id),
		));
	}
	/** 
	* This action is developed for single employee attendence update.
	*/
	public function actionSingleemployeeupdate($id)
	{
		$model=$this->loadModel($id);
		$old=$this->loadModel($id);

		Yii::app()->clientScript->registerScript("address-script", "
			    $('#Employee_attendence_attendence').change(function () {
					
					if($('#Employee_attendence_attendence option:selected').text()=='Absent'){
					$('#Employee_attendence_time1').val('00:00:00');
					$('#Employee_attendence_time2').val('00:00:00');
					$('#Employee_attendence_time1').attr('disabled', true);	
									
					$('#Employee_attendence_time2').attr('disabled', true);
													
					}
					else
					{
						$('#Employee_attendence_time1').attr('disabled', false);	
						$('#Employee_attendence_time2').attr('disabled', false);
								

					}
				});
			", CClientScript::POS_END);
		if(!empty($_POST['Employee_attendence']['attendence']))
		{
			$model->attributes=$_POST['Employee_attendence'];
			$model->attendence = $_POST['Employee_attendence']['attendence'];
			$emp_id = $model->employee_id;
			$date = $model->date;
			$month = date("n",strtotime($date));
		
			if($_POST['Employee_attendence']['attendence'] == 'LWP')
			{		
				$model->time1 = "00:00:00";
				$model->time2 = "00:00:00";
				$model->total_hour = "00:00:00";
				$model->overtime_hour = "00:00:00";
			}
			else
			{
				$model->time1 = $_POST['Employee_attendence']['time1'];
				$model->time2 = $_POST['Employee_attendence']['time2'];
			}
			$model->save();
			/*$this->render('monthlyempattendance',array(
				'model'=>$model,'emp_id'=>$emp_id,'month'=>$month,
			));*/
			$this->redirect(array('monthlyempattendance','emp_id'=>$emp_id,'month'=>$month));

		}
		else
		{
			$this->render('singleemployeeupdate',array(
				'model'=>$model,
			));
		}
	}
	/**
	* This action is used to upload the employee attendence by excel sheet.
	*/
	public function actionAttendenceimport()
	{
		$this->render('attendence_import');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate()
	{
		$model=new Employee_attendence;

		// Uncomment the following line if AJAX va$this->redirect(/home/dev/Desktop/attendence.php);
		 $this->performAjaxValidation($model);

		if(isset($_POST['Employee_attendence']))
		{
			$model->attributes=$_POST['Employee_attendence'];
			if($model->validate())
			{
			$model->csvfile=CUploadedFile::getInstance($model,'csvfile');
			$date = date('c');
			$newfname="sheet".$date.".xlsx";
			if($model->csvfile != null) 
			{
				
				$model->csvfile->saveAs(Yii::getPathOfAlias('webroot'). '/college_data/csv_docs/' . $model->csvfile=$newfname);
				$this->redirect(array('attendenceimport', 'date'=>$date));
			}		
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
		}
	/**
	* This action is used to display all the employee attendence.
	*/	
	public function actionempattendence()
	{
		$model=new Employee_attendence('emp_search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee_attendence']))
		
	$model->attributes=$_GET['Employee_attendence'];

		$this->render('emp_attendence',array(
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
		$old_model=$this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Employee_attendence']))
		{
			$model->attributes=$_POST['Employee_attendence'];
			$newfname="Book1.csv";			
			if($model->csvfile==null)
				$model->csvfile = $old_model->csvfile;
			if($model->save())
			{
				if(CUploadedFile::getInstance($model,'csvfile') != null) 
					$model->csvfile->saveAs(Yii::getPathOfAlias('webroot'). '/college_data/csv_docs/' . $model->csvfile=$newfname);
				$this->redirect(array('view','id'=>$model->employee_attendence_id));
			}
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

		$model=new Employee_attendence('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee_attendence']))
		$model->attributes=$_GET['Employee_attendence'];

		$this->render('admin',array(
			'model'=>$model,
		));

		/*dataProvider=new CActiveDataProvider('Employee_attendence');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Employee_attendence('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Employee_attendence']))
		
	$model->attributes=$_GET['Employee_attendence'];

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
		$model=Employee_attendence::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='employee-attendence-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 
}
