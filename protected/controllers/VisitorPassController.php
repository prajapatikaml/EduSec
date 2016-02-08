<?php

class VisitorPassController extends RController
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

	public function actionNew_view($id)
	{
		$this->render('new_view',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new VisitorPass;
		
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['VisitorPass']))
		{
		
			$model->attributes=$_POST['VisitorPass'];
			$model->In_Out_Status=1;
			$model->visitor_pass_organization_id = Yii::app()->user->getState('org_id');
			$model->in_date_time=new CDbExpression('NOW()');
			$model->photo=CUploadedFile::getInstance($model,'photo');
			if($model->photo == null)
			{
				
				$valid_photo = true;

			}
			else
			{
				$valid_photo = $model->validate();
			}
			if($valid_photo)
			{
			
					if($model->photo!=null)
					{
							$newfname;
							
							$ext= substr(strrchr($model->photo,'.'),1);
							if($ext!=null)
							{				
								
								$newfname = $model->visitor_name.'.'.$ext;
								$model->photo->saveAs(Yii::getPathOfAlias('webroot').'/visitors_photo/' . $model->photo=$newfname);
							}
						$model->save();
						Yii::import("ext.EPhpThumb.EPhpThumb");
						$thumb=new EPhpThumb();
				                $thumb->init(); //this is needed
						$thumb->create(Yii::getPathOfAlias('webroot').'/visitors_photo/'.$model->photo)->resize(150,150)->save(Yii::getPathOfAlias('webroot').'/visitors_photo/'.$model->photo);
					}
					else
					{
						$model->photo = "no_image" ;
						$model->save();	
					}
					$this->redirect('admin');
				}
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

	// for update Actual_Out_Time and In_Out_Status
	public function actionmyupdate($id)
	{
			$model=$this->loadModel($id);
			$model->In_Out_Status=0;
			$model->Actual_Out_Time=new CDbExpression('NOW()');
			$model->save();
			$this->redirect(array('admin'));

	}
	public function actionUpdate($id)
	{

		$model=$this->loadModel($id);
		$old_model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['VisitorPass']))
		{
			$model->attributes=$_POST['VisitorPass'];
			
			$model->photo=CUploadedFile::getInstance($model,'photo');
			
			if($model->photo == null)
			{
				
				$valid_photo = true;

			}
			else
			{
				$valid_photo = $model->validate();
			}
			if($valid_photo)
			{
			
				if($model->photo==null)
					$model->photo = $old_model->photo;
				else
				{
				
					$newfname;
							
					$ext= substr(strrchr($model->photo,'.'),1);
					if($ext!=null)
					{				
						
						$newfname = $model->visitor_name.'.'.$ext;
						$model->photo->saveAs(Yii::getPathOfAlias('webroot').'/visitors_photo/' . $model->photo=$newfname);
					}
					Yii::import("ext.EPhpThumb.EPhpThumb");
						$thumb=new EPhpThumb();
				                $thumb->init(); //this is needed
						$thumb->create(Yii::getPathOfAlias('webroot').'/visitors_photo/'.$model->photo)->resize(150,150)->save(Yii::getPathOfAlias('webroot').'/visitors_photo/'.$model->photo);
					
				}
				$model->save();
			
				$this->redirect(array('new_view','id'=>$model->pass_no));
			
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
/*		$dataProvider=new CActiveDataProvider('VisitorPass');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		)); */
		$model=new VisitorPass('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VisitorPass']))
			$model->attributes=$_GET['VisitorPass'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new VisitorPass('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VisitorPass']))
			$model->attributes=$_GET['VisitorPass'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionTotal_visitors()
	{
		$model=new VisitorPass('total_visitor');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['VisitorPass']))
			$model->attributes=$_GET['VisitorPass'];

		$this->render('total_visitors',array(
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
		$model=VisitorPass::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='visitor-pass-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
