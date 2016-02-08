<?php

class PhotoGalleryController extends EduSecCustom
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

	public function actions()
	{
		return array(
		        'toggle'=>'ext.jtogglecolumn.ToggleAction',
		        'switch'=>'ext.jtogglecolumn.SwitchAction', // only if you need it
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
		$model=new PhotoGallery;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['PhotoGallery']))
		{
			$model->attributes=$_POST['PhotoGallery'];
			$model->created_by = Yii::app()->user->id;
            		$model->creation_date = new CDbExpression('NOW()');
			
			$model->photo_path = CUploadedFile::getInstance($model,'photo_path');
			$valid_photo = $model->validate();
			
			if($valid_photo)
			{
				$ext= substr(strrchr($model->photo_path,'.'),1);
				if($ext!=null)
				{				
					$model->photo_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/'.$model->photo_path);
				}
				Yii::import("ext.EPhpThumb.EPhpThumb");
				$thumb=new EPhpThumb();
				$thumb->init(); //this is needed
				$thumb->create(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/'.$model->photo_path)->resize(100,150)->save(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/album_thumbs/'.$model->photo_path);
				if($model->save(false))
				$this->redirect(array('admin'));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$old_model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['PhotoGallery']))
		{
			$model->attributes=$_POST['PhotoGallery'];
			$model->photo_path = CUploadedFile::getInstance($model,'photo_path');
			if($model->photo_path == null)
			{
				
				$valid_photo = true;

			}
			else
			{
				$valid_photo = $model->validate();
			}
			
			if($valid_photo)
			{
				if($model->photo_path==null)
					$model->photo_path = $old_model->photo_path;
				else
				{
		
					$ext= substr(strrchr($model->photo_path,'.'),1);
					if($ext!=null)
					{				
						$model->photo_path->saveAs(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/'.$model->photo_path);
					}
					//following thing done for deleting previously uploaded photo
					$photo = $old_model->photo_path;
					$dir1 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/';
					if($dh = opendir($dir1))
					{
						if(file_exists($dir1.$photo)){
						chmod($dir1.$photo, 0777);
						unlink($dir1.$photo);		
						}		
					}
					closedir($dh);
					$dir2 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/album_thumbs/';
					if($dh = opendir($dir2))
					{
						if(file_exists($dir2.$photo))
						unlink($dir2.$photo);
					}
					$dir3 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/thumbs/';
					if($dh = opendir($dir3))
					{
						if(file_exists($dir3.$photo))
						unlink($dir3.$photo);
					}
					
					Yii::import("ext.EPhpThumb.EPhpThumb");
					$thumb=new EPhpThumb();
					$thumb->init(); //this is needed
					$thumb->create(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/'.$model->photo_path)->resize(100,150)->save(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/album_thumbs/'.$model->photo_path);
				}
				if($model->save(false))
				$this->redirect(array('admin'));
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->photo_id));
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
			$photo = PhotoGallery::model()->findByPk($id)->photo_path;
			$dir1 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/';
			if($dh = opendir($dir1))
			{
				if(file_exists($dir1.$photo)){
				chmod($dir1.$photo, 0777);
				unlink($dir1.$photo);		
				}		
			}
			closedir($dh);
			$dir2 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/album_thumbs/';
			if($dh = opendir($dir2))
			{
				if(file_exists($dir2.$photo))
				unlink($dir2.$photo);
			}
			$dir3 = Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/thumbs/';
			if($dh = opendir($dir3))
			{
				if(file_exists($dir3.$photo))
				unlink($dir3.$photo);
			}
			$this->loadModel($id)->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionMultiupload()
	{
		$model=new PhotoGallery;

		// Uncomment the following line if AJAX validation is needed
		 //$this->performAjaxValidation($model);


		$this->render('multiple_photo_upload',array(
			'model'=>$model,
		));
	}
	public function actionUpload()
{
 	$model=new PhotoGallery;
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 
        $folder=Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif","exe","mov","mp4");//array("jpg","jpeg","gif","exe","mov" and etc...

        $sizeLimit = 100 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
 
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

	Yii::import("ext.EPhpThumb.EPhpThumb");
	$thumb=new EPhpThumb();
	$thumb->init(); //this is needed
	$thumb->create(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/'.$fileName)->resize(100,150)->save(Yii::getPathOfAlias('webroot').'/college_data/gallery/album1/album_thumbs/'.$fileName);

 	$model->created_by = Yii::app()->user->id;
	$model->photo_desc = "No description";
        $model->creation_date = new CDbExpression('NOW()');
	$model->photo_path = $fileName;
	$model->display_status = 0;
	$model->save(false);
        echo $return;// it's array
}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PhotoGallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PhotoGallery']))
			$model->attributes=$_GET['PhotoGallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function actionViewalbum()
	{
		$photos = PhotoGallery::model()->findAll();
	     	$imags = CHtml::listData($photos,'photo_id','photo_path');
	     	$description = CHtml::listData($photos,'photo_id','photo_desc');
		$this->render('view_album',array('imags'=>$imags,'desc'=>$description));	
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=PhotoGallery::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='photo-gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
