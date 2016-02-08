<?php
/*****************************************************************************************
 * EduSec is a college management program developed by
 * Rudra Softech, Inc. Copyright (C) 2013-2014.
 ****************************************************************************************/

class AcademicTermController extends RController
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
	 * Get behaviors from eexcelview extension to export data.
	 */

	 public function behaviors()
	    {
		return array(
		    'eexcelview'=>array(
		        'class'=>'ext.eexcelview.EExcelBehavior',
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
	 * Use Jtoggle extension to switch active inactive semester.
	 */
	public function actions()
	{
		return array(
		        'toggle'=>'ext.jtogglecolumn.ToggleAction',
		        'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
		);
    	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'admin' page.
	 */
	public function actionCreate()
	{
		$model=new AcademicTerm;
		$this->performAjaxValidation($model);

		if(isset($_POST['AcademicTerm']) && !empty($_POST['AcademicTerm']['academic_term_start_date']) && !empty($_POST['AcademicTerm']['academic_term_end_date']))
		{
			$model->attributes=$_POST['AcademicTerm'];
			
			$new_start = $_POST['AcademicTerm']['academic_term_start_date'];
			$new_end = $_POST['AcademicTerm']['academic_term_end_date'];
			
			$start = date("Y-m-d", strtotime($new_start));
			$end = date("Y-m-d", strtotime($new_end));
			

			$sem=$_POST['AcademicTerm']['current_sem'];
			$model->current_sem=$sem;
			$model->academic_term_start_date=$start;
			$model->academic_term_end_date=$end;
			$model->academic_term_organization_id = Yii::app()->user->getState('org_id');
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
		$model->academic_term_start_date = date("d-m-Y", strtotime($model->academic_term_start_date));
		$model->academic_term_end_date = date("d-m-Y", strtotime($model->academic_term_end_date));

		if(isset($_POST['AcademicTerm']))
		{
			$model->attributes=$_POST['AcademicTerm'];
			$sem=$_POST['AcademicTerm']['current_sem'];

			$new_start = $_POST['AcademicTerm']['academic_term_start_date'];
			$new_end = $_POST['AcademicTerm']['academic_term_end_date'];

			
			$start = date("Y-m-d", strtotime($new_start));
			$end = date("Y-m-d", strtotime($new_end));
			
			$model->academic_term_start_date=$start;
			$model->academic_term_end_date=$end;
			$model->current_sem=$sem;
			if($model->save())
				$this->redirect(array('view','id'=>$model->academic_term_id));
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
		else if(!Yii::app()->request->isPostRequest) {
			$stud_tran = StudentTransaction::model()->findAll(array('condition'=>'student_academic_term_name_id='.$id));
			
			if(!empty($stud_tran))
			{
				throw new CHttpException(400,'You can not delete this record because it is used in another table.');
			}
			else
			{
				$this->loadModel($id)->delete();
				$this->redirect( array('admin'));
			}
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new AcademicTerm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AcademicTerm']))
			$model->attributes=$_GET['AcademicTerm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AcademicTerm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AcademicTerm']))
			$model->attributes=$_GET['AcademicTerm'];

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
		$model=AcademicTerm::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='academic-term-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Export Data in Excel
	*/
	public function actionAcademicTermExportExcel()
	{
	
	    $this->toExcel($_SESSION['academic_term_records'],
		array(
			'academic_term_name',
			'academic_term_start_date', 	
			'academic_term_end_date',
			'academicTermPeriod.academic_term_period',
			'current_sem',
			'Rel_org.organization_name',
			
		),
		'AcademicTerm',
		array(
		    'creator' => 'Zen',
		),
		'Excel2007'
	    );
	}

	/**
	 * Export Data in PDF
	 */

	public function actionAcademicTermGeneratePdf() 
	{
	   $session=new CHttpSession;
	   $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
             if(isset($session['academic_term_records']))
               {
		 $d = $_SESSION['academic_term_records'];
		 $model = array();

		$model[]=array_keys($d->data[0]->attributes);//headers: cols name

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/academicTerm/academicTermGeneratePdf', array(
			'model'=>$model
		), true);

		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Student Report');
		$pdf->SetSubject('Student Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("AcademicTerm.pdf", "I");
	
	}
	
}
