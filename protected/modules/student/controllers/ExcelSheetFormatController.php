<?php

class ExcelSheetFormatController extends RController
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GeneratePdf','GenerateExcel'),
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
	}*/

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
		$model=new ExcelSheetFormat;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ExcelSheetFormat']))
		{
			$model->attributes=$_POST['ExcelSheetFormat'];
			$model->excel_sheet_path=CUploadedFile::getInstance($model,'excel_sheet_path');
			if(!empty($model->excel_sheet_path))
			{
			$model->excel_sheet_path->saveAs(Yii::getPathOfAlias('webroot').'/excel_sheet_format/'.$model->excel_sheet_path);
			$model->created_by = Yii::app()->user->id;
			$model->creation_date = new CDbExpression('NOW()');
			$model->excel_sheet_format_org_id = Yii::app()->user->getState('org_id');
			}
			else
			{
				$this->redirect(array('create'));	
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->excel_sheet_format_id));
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

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ExcelSheetFormat']))
		{
			$model->attributes=$_POST['ExcelSheetFormat'];
			
			$model->excel_sheet_path=CUploadedFile::getInstance($model,'excel_sheet_path');
			if(!empty($model->excel_sheet_path))
			{
				$model->excel_sheet_path->saveAs(Yii::getPathOfAlias('webroot').'/excel_sheet_format/'.$model->excel_sheet_path);
				$model->created_by = Yii::app()->user->id;
				$model->creation_date = new CDbExpression('NOW()');
				$model->excel_sheet_format_org_id = Yii::app()->user->getState('org_id');
			}
			else
			{
				$this->redirect(array('update','id'=>$model->excel_sheet_format_id));	
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->excel_sheet_format_id));
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
                $model=new ExcelSheetFormat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ExcelSheetFormat']))
			$model->attributes=$_GET['ExcelSheetFormat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new ExcelSheetFormat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ExcelSheetFormat']))
			$model->attributes=$_GET['ExcelSheetFormat'];

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
		$model=ExcelSheetFormat::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='excel-sheet-format-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['ExcelSheetFormat_records']))
               {
                $d=$_SESSION['ExcelSheetFormat_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              
		
		Yii::app()->request->sendFile("ExcelSheetFormat.xlsx",
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.tcpdf.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');	
             if(isset($session['ExcelSheetFormat_records']))
               {
                $d=$_SESSION['ExcelSheetFormat_records'];
		 $model = array();

		if($d->data)
			$model[]=array_keys($d->data[0]->attributes);//headers: cols name
			else
			{
				$this->render('no_data_found',array('last_page'=>$_SERVER['HTTP_REFERER'],));
				exit;			
			}

		foreach ($d->data as $item) {
		    $model[] = $item->attributes;
		}
		//print_r($model);exit;
               }
              


		$html = $this->renderPartial('exportGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		ob_clean();
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('ExcelSheetFormat Report');
		$pdf->SetSubject('ExcelSheetFormat Report');
		//$pdf->SetKeywords('example, text, report');
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
		$pdf->Output("ExcelSheetFormat.pdf", "I");
	}
}
	
