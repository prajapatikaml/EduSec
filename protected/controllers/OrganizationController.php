<?php

class OrganizationController extends RController
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
				'users'=>array('sadmin@hansaba.com'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('sadmin@hansaba.com'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('sadmin@hansaba.com'),
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
		$model=new Organization;
		
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(!empty($_POST['Organization']['organization_name']) && !empty($_POST['Organization']['address_line1']) && !empty($_POST['Organization']['city']) && !empty($_POST['Organization']['state']) && !empty($_POST['Organization']['country']) && !empty($_POST['Organization']['pin']) && !empty($_POST['Organization']['phone']) && !empty($_POST['Organization']['no_of_semester']) && !empty($_POST['Organization']['email']))
		{
			
			$model->attributes=$_POST['Organization'];
			$model->email = strtolower($_POST['Organization']['email']);
			$model->organization_created_by=Yii::app()->user->id;
			$model->organization_creation_date=new CDbExpression('NOW()');

			ob_start();

			if(!empty($_FILES['Organization']['tmp_name']['logo']))
           	 	{
				
				$file = CUploadedFile::getInstance($model,'logo');
				$model->file_type = $file->type;
				$fp = fopen($file->tempName, 'r');
				$content = fread($fp, filesize($file->tempName));
				fclose($fp);
				if($model->file_type == "image/png") {
				$src_img = imagecreatefrompng($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
                                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagepng($dst_img);                                
                                ob_start();
                                imagepng($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
			}
			if($model->file_type == "image/jpg" || $model->file_type == "image/jpeg") {
				$src_img = imagecreatefromjpeg($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
                                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagejpeg($dst_img);                                
                                ob_start();
                                imagepng($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
			}
			if($model->file_type == "image/gif") {
				$src_img = imagecreatefromgif($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
                                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagepng($dst_img);                                
                                ob_start();
                                imagecreatefromgif($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
			}
                                $model->logo = $image_string;
            		}
			
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->organization_id));
				//$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}


	
	/**+

	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Organization']))
		{
			$model->attributes=$_POST['Organization'];
			
			$model->email = strtolower($_POST['Organization']['email']);
			ob_start();

				if(empty($_FILES['Organization']['tmp_name']['logo']))
           	 		{
				
					$model->logo = $old_model->logo;
            			}
				else
				{
					$file = CUploadedFile::getInstance($model,'logo');
					$model->file_type = $file->type;
					$fp = fopen($file->tempName, 'r');
					$content = fread($fp, filesize($file->tempName));
					fclose($fp);
			if(!empty($_FILES['Organization']['tmp_name']['logo']))
           	 	{
				
				$file = CUploadedFile::getInstance($model,'logo');
				$model->file_type = $file->type;
				$fp = fopen($file->tempName, 'r');
				$content = fread($fp, filesize($file->tempName));
				fclose($fp);
				
			if($model->file_type == "image/png") {
				$src_img = imagecreatefrompng($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagepng($dst_img);                                
                                ob_start();
                                imagepng($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
			}
			if($model->file_type == "image/jpeg" || $model->file_type =="image/jpg") {
				$src_img = imagecreatefromjpeg($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
                                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagejpeg($dst_img);                                
                                ob_start();
                                imagejpeg($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
			}
			if($model->file_type == "image/gif") {
				$src_img = imagecreatefromgif($file->tempName);
                                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
                                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
                                imagegif($dst_img);                                
                                ob_start();
                                imagegif($dst_img);
                                $image_string = ob_get_contents();
                                ob_end_flush();
				
			}
				$model->logo = $image_string;
				}			                

		}
			$model->save(false);
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
		/*
		$dataProvider=new CActiveDataProvider('Organization');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		$model=new Organization('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Organization']))
			$model->attributes=$_GET['Organization'];

		$this->render('admin',array(
			'model'=>$model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Organization('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Organization']))
			$model->attributes=$_GET['Organization'];

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
		$model=Organization::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='organization-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	 public function actionUpdateStates()
	    {
		    
		    $data = State::model()->findAll(array('condition'=>'country_id='.(int) $_REQUEST['Organization']['country']));
		    $data = CHtml::listData($data,'state_id','state_name');
		    echo "<option value=''>Select State</option>";
		    foreach($data as $value=>$name)
			{
		        echo CHtml::tag('option', 
				array('value'=>$value),CHtml::encode($name),true);
	 		}
		    
	    }
	 
	    public function actionUpdateCities()
	    {
		    $data = City::model()->findAll('state_id=:state_id', array(':state_id'=>(int) $_REQUEST['Organization']['state']));
		    $data = CHtml::listData($data,'city_id','city_name');
		    //echo "<option value=''>Select City</option>";
		    foreach($data as $value=>$name)
			echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	    }
}
