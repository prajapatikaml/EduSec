<?php

class ParentLoginController extends EduSecCustom
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ParentLogin;

		// comment the following line if AJAX validation is not needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['ParentLogin']))
		{
			$model->attributes=$_POST['ParentLogin'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->parent_id));
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

		if(isset($_POST['ParentLogin']))
		{
			$model->attributes=$_POST['ParentLogin'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->parent_id));
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
                $model=new ParentLogin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ParentLogin']))
			$model->attributes=$_GET['ParentLogin'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		
		$model=new ParentLogin('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ParentLogin']))
			$model->attributes=$_GET['ParentLogin'];

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
		$model=ParentLogin::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='parent-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
              if(isset($session['ParentLogin_records']))
               {
                $d=$_SESSION['ParentLogin_records'];
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
              
		
		Yii::app()->request->sendFile("ParentLogin.xlsx",
			$this->renderPartial('exportGridtoReport', array(
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
             if(isset($session['ParentLogin_records']))
               {
                $d=$_SESSION['ParentLogin_records'];
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
		$pdf->SetTitle('ParentLogin Report');
		$pdf->SetSubject('ParentLogin Report');
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
		$pdf->Output("ParentLogin.pdf", "I");
	}
}
	
