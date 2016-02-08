<?php

class AcademicTermPeriodController extends RController
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
				'users'=>array('@'),
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
		$model=new AcademicTermPeriod;
	
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['AcademicTermPeriod']))
		{
			$model->attributes=$_POST['AcademicTermPeriod'];
			
			//$model->academic_terms_period_organization_id = Yii::app()->user->getState('org_id');
			$model->academic_terms_period_created_by = Yii::app()->user->id;
            		$model->academic_terms_period_creation_date = new CDbExpression('NOW()');
			if($model->save())
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->academic_terms_period_id));
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

		if(isset($_POST['AcademicTermPeriod']))
		{
			$model->attributes=$_POST['AcademicTermPeriod'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->academic_terms_period_id));
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
		$academic_term_p = AcademicTermPeriod::model()->findAll(array('condition'=>'academic_terms_period_id='.$id));
		if(!empty($academic_term_p))
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
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*
		$dataProvider=new CActiveDataProvider('AcademicTermPeriod');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$model=new AcademicTermPeriod('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AcademicTermPeriod']))
			$model->attributes=$_GET['AcademicTermPeriod'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AcademicTermPeriod('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AcademicTermPeriod']))
			$model->attributes=$_GET['AcademicTermPeriod'];

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
		$model=AcademicTermPeriod::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='academic-term-period-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAcademicTermPeriodExportExcel()
	{
	
	    $this->toExcel($_SESSION['academic_term_period_records'],
		array(
			'academic_terms_period_id',
			'academic_term_period',
			//'Rel_org.organization_name',
			//'Rel_user.user_organization_email_id',
		),
		'AcademicPeriod',
		array(
		    'creator' => 'Zen',
		),
		'Excel2007'
	    );
	}
	    public function actionAcademicTermPeriodGeneratePdf() 
	    {
	   $session=new CHttpSession;
	   $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');
		
             if(isset($session['academic_term_period_records']))
               {
                //$model=$session['City_records'];
		 $d = $_SESSION['academic_term_period_records'];
		 $model = array();

		$model[]=array_keys($d->data[0]->attributes);//headers: cols name

			foreach ($d->data as $item)
			{
			    $model[] = $item->attributes;
			}
	         }
		           
		$html = $this->renderPartial('/academicTermPeriod/academicTermPeriodGeneratePdf', array(
			'model'=>$model
		), true);
		//$session->close();
		
		//die($html);
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Report');
		$pdf->SetSubject('Report');
		$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
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
		$pdf->Output("AcademicPeriod.pdf", "I");
	
	}
		
}
