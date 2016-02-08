<?php

class StudentRegistrationInfoController extends Controller
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
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
				'actions'=>array('admin','delete','aprove','studentRegistration'),
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
			'model'=>$this->loadModel($id),'acdmInfoModel'=>new StudentRegistrationAcademicInfo

		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new StudentRegistrationInfo;
		$acdmInfoModel = new StudentRegistrationAcademicInfo;	
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model,$acdmInfoModel);

		if(isset($_POST['StudentRegistrationInfo']) && isset($_POST['StudentRegistrationAcademicInfo']))
		{	
			$model->attributes=$_POST['StudentRegistrationInfo'];
			$dt = serialize($_POST['StudentRegistrationInfo']['student_branch_id']);
			$model->student_branch_id=$dt;
			$model->student_date_of_registration = new CDbExpression('NOW()');
			if($model->student_dob!='')
                    		$model->student_dob = date('Y-m-d',strtotime($model->student_dob));
			
			$model->student_aproved='0';
			$image=CUploadedFile::getInstance($model,'student_photo');

			// Save image with random No. + student_merit_no;
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$rnd = rand(0,9999);
			$fileName = "{$rnd}-{$model->student_merit_no}.".$ext;
			$model->student_photo=$fileName;

			 if(isset($_POST['StudentRegistrationInfo']['student_address_c_line1']) ){
				if($_POST['StudentRegistrationInfo']['stud_address_chkbox']==1){	
				$model->student_address_p_line1=$_POST['StudentRegistrationInfo']['student_address_c_line1'];
				$model->student_address_p_line2=$_POST['StudentRegistrationInfo']['student_address_c_line2'];
				$model->student_address_p_taluka=$_POST['StudentRegistrationInfo']['student_address_c_taluka'];
				$model->student_address_p_district=$_POST['StudentRegistrationInfo']['student_address_c_district'];
				$model->student_address_p_country=$_POST['StudentRegistrationInfo']['student_address_c_country'];
				$model->student_address_p_state=$_POST['StudentRegistrationInfo']['student_address_c_state'];
				$model->student_address_p_city=$_POST['StudentRegistrationInfo']['student_address_c_city'];
				$model->student_address_p_pin=$_POST['StudentRegistrationInfo']['student_address_c_pin'];
				}
			}

			if($model->save(false)) {
				
				$image->saveAs('./college_data/stud_images/'.$fileName);

				// Save data in student_registratoin_academic_info
			for($i=0; $i<count($_POST['StudentRegistrationAcademicInfo']['examination']) ; $i++){
				$a=array();
			    foreach($_POST['StudentRegistrationAcademicInfo'] as $ind=>$va) {
				
				$a[] = $_POST['StudentRegistrationAcademicInfo'][$ind][$i].' ';			
			   }
			$acdmInfoModel->student_registration_academic_id = null;
			$acdmInfoModel->setIsNewRecord(true);
			$acdmInfoModel->examination = $a[0];
	      		$acdmInfoModel->year_of_passing = $a[1];
			$acdmInfoModel->name_of_board  = $a[2];
			$acdmInfoModel->medium = $a[3];
			$acdmInfoModel->class_obtained = $a[4];
			$acdmInfoModel->marks_obtained = $a[5];
			$acdmInfoModel->marks_out_of = $a[6];
			$acdmInfoModel->percentage = $a[7];
			$acdmInfoModel->student_registration_id=$model->student_registration_id; 
			$acdmInfoModel->save(false);
			}	
			$this->redirect(array('view','id'=>$model->student_registration_id));
		}
		}
		$this->render('create',array(
			'model'=>$model,'acdmInfoModel'=>$acdmInfoModel,
		));
	}

	public function actionAprove($id)
	{
		$model= StudentRegistrationInfo::model()->findByPk($id);
		$info = new StudentInfo;
		$stud_trans = new StudentTransaction;
		$user =new User;
		$photo =new StudentPhotos;
		$address=new StudentAddress;
		$lang=new LanguagesKnown;
		$ass_comp = new assignCompanyUserTable;
		$auth_assign = new AuthAssignment;
		$qualification=new StudentAcademicRecordTrans;

		if(isset($_REQUEST['StudentRegistrationInfo']))
		{
			$org_id = $model->organization_id;
	
			if($model->student_status==1){

				$acd = Yii::app()->db->createCommand()
					->select("academic_term_id,academic_term_name,academic_term_period_id")
					->from('academic_term')
					->where('current_sem=1 and academic_term_name =1 and academic_term_organization_id='.$org_id)
					->queryAll();
			
				if(!$acd){
					Yii::app()->user->setFlash('notice','Semester-1 is not an Active semester');
					$this->redirect(array('admin'));
				}
				$info->student_dtod_regular_status = 'Regular';	
			}
			elseif($model->student_status==2){

				$acd = Yii::app()->db->createCommand()
					->select("academic_term_id,academic_term_name,academic_term_period_id")
					->from('academic_term')
					->where('current_sem=1 and academic_term_name =3 and academic_term_organization_id='.$org_id)
					->queryAll();
			
				if(!$acd){
					Yii::app()->user->setFlash('notice','Semester-3 is not an Active semester');
					$this->redirect(array('admin'));
				}	
				$info->student_dtod_regular_status = 'DTOD';
			}
			$info->title = 	$model->student_title;
			$info->student_merit_no = $model->student_merit_no;
			$info->student_first_name = $model->student_first_name;
			$info->student_middle_name =$model->student_middle_name;
			$info->student_last_name = $model->student_last_name;
			$info->student_father_name = $model->student_father_name;
			$info->student_mother_name = $model->student_mother_name;
			$info->student_dob = $model->student_dob;
			$info->student_adm_date =  new CDbExpression('NOW()');
			$info->student_birthplace = $model->student_place_of_birth;
			$info->student_gender = $model->student_gender;
			$info->student_email_id_1 = $model->student_email_id;
			$info->student_mobile_no = $model->student_mobile;
			$info->student_created_by = Yii::app()->user->id;
			$info->student_creation_date = new CDbExpression('NOW()');

			$user->user_organization_email_id = strtolower($info->student_email_id_1);
			$user->user_password =  md5($info->student_email_id_1.$info->student_email_id_1);
			$user->user_created_by =  Yii::app()->user->id;
			$user->user_creation_date = new CDbExpression('NOW()');
			$user->user_organization_id = $org_id;
			$user->user_type = "student";

			$photo->student_photos_path = $model->student_photo;
		
			$address->student_address_c_line1 = $model->student_address_c_line1;
			$address->student_address_c_line2 = $model->student_address_c_line2;
			$address->student_address_c_taluka = $model->student_address_c_taluka;
			$address->student_address_c_district = $model->student_address_c_district;
			$address->student_address_c_country = $model->student_address_c_country;
			$address->student_address_c_city = $model->student_address_c_city;
			$address->student_address_c_pin  = $model->student_address_c_pin ;
			$address->student_address_c_state = $model->student_address_c_state;
			$address->student_address_p_line1 = $model->student_address_p_line1;
			$address->student_address_p_line2 = $model->student_address_p_line2;
			$address->student_address_p_taluka = $model->student_address_p_taluka;
			$address->student_address_p_district = $model->student_address_p_district;
			$address->student_address_p_country = $model->student_address_p_country;
			$address->student_address_p_city = $model->student_address_p_city;
			$address->student_address_p_pin  = $model->student_address_p_pin ;
			$address->student_address_p_state = $model->student_address_p_state;
			$address->student_address_phone = $model->student_phoneno;
			$address->student_address_mobile = $model->student_mobile;

			if($info->save(false)){
				
				$user->save(false);
				$photo->save(false);
				$address->save(false);
				$lang->save(false);		
			
				$stud_trans->student_transaction_user_id = $user->user_id;
				$stud_trans->student_transaction_student_id = $info->student_id;
				//$stud_trans->student_transaction_branch_id = $model->student_branch_id;
				if(!empty($model->student_category_id))
				$stud_trans->student_transaction_category_id = $model->student_category_id;
				$stud_trans->student_transaction_organization_id = $org_id;
				$stud_trans->student_transaction_student_address_id = $address->student_address_id;
				$stud_trans->student_transaction_languages_known_id= $lang->languages_known_id;
				$stud_trans->student_transaction_detain_student_flag='5';
				$stud_trans->student_transaction_student_photos_id = $photo->student_photos_id;
				$stud_trans->student_transaction_branch_id=$_POST['StudentRegistrationInfo']['student_branch_id'];
				$stud_trans->student_academic_term_period_tran_id = $acd[0]['academic_term_period_id']; 
				$stud_trans->student_academic_term_name_id = $acd[0]['academic_term_id'];
				$stud_trans->save(false);

				StudentInfo::model()->updateByPk($stud_trans->student_transaction_student_id, array('student_info_transaction_id'=>$stud_trans->student_transaction_id));					
		
				$org_data = Organization::model()->findByPk($org_id);
				$org_name = $org_data->organization_name;
				$org_arr = explode(' ',$org_name);
				$suffix_lab = '';
				foreach($org_arr as $list)
					$suffix_lab .= $list[0];
				$bizrule = 'return Yii::app()->user->getState("org_id")=='.$org_id.";";
				$var_data = serialize(Yii::app()->user->getState('org_id'));

				$auth_assign->itemname = 'Student of '.$suffix_lab;
				$auth_assign->userid = $user->user_id;
				$auth_assign->bizrule = $bizrule;
				$auth_assign->data = $var_data;
				$auth_assign->save();

				$ass_comp->assign_user_id = $user->user_id;
				$ass_comp->assign_org_id = $org_id;
				$ass_comp->assign_created_by = Yii::app()->user->id;
				$ass_comp->assign_creation_date = new CDbExpression('NOW()');
				$ass_comp->save();
	
				StudentRegistrationInfo::model()->updateByPk($id, 
					array(
						'student_aproved'=>'1',
						));
				$this->redirect(array('admin'));
				}	
		}
		$this->render('aprove',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$acdmInfoModel = StudentRegistrationAcademicInfo::model()->findAll(array('condition'=>'student_registration_id = '.$id));
		
		//print_r($acdmInfoModel);exit;
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		if(isset($_POST['StudentRegistrationInfo']) && ($_POST['StudentRegistrationAcademicInfo']))
		{
			$_POST['StudentRegistrationInfo']['student_photo'] = $model->student_photo;
			$model->attributes=$_POST['StudentRegistrationInfo'];
			if($_POST['StudentRegistrationInfo']['student_dob']!=0000-00-00)
				$model->student_dob = date("Y-m-d", strtotime($_POST['StudentRegistrationInfo']['student_dob']));	
			//print_r($_POST['StudentRegistrationInfo']['student_branch_id']);exit;

			$dt = serialize($_POST['StudentRegistrationInfo']['student_branch_id']);
				$model->student_branch_id=$dt;	
			$image=CUploadedFile::getInstance($model,'student_photo');
			if($model->save(false)){
				
				if(!empty($image))
				$image->saveAs('./college_data/stud_images/'.$model->student_photo);
			
				foreach($acdmInfoModel as $i=>$item) {
					if(isset($_POST['StudentRegistrationAcademicInfo'][$i]))
              					$item->attributes=$_POST['StudentRegistrationAcademicInfo'][$i];
						$item->save();
				}
				
		 if(isset($_POST['StudentRegistrationInfo']['student_address_c_line1']) ){
				if($_POST['StudentRegistrationInfo']['stud_address_chkbox']==1){	
			   StudentRegistrationInfo::model()->updateByPk($id, 
			array(
				'student_address_p_line1'=>$_POST['StudentRegistrationInfo']['student_address_c_line1'],
				'student_address_p_line2'=>$_POST['StudentRegistrationInfo']['student_address_c_line2'],
				'student_address_p_taluka'=>$_POST['StudentRegistrationInfo']['student_address_c_taluka'],
				'student_address_p_district'=>$_POST['StudentRegistrationInfo']['student_address_c_district'],
				'student_address_p_country'=>$_POST['StudentRegistrationInfo']['student_address_c_country'],
				'student_address_p_state'=>$_POST['StudentRegistrationInfo']['student_address_c_state'],
				'student_address_p_city'=>$_POST['StudentRegistrationInfo']['student_address_c_city'],
				'student_address_p_pin'=>$_POST['StudentRegistrationInfo']['student_address_c_pin'],
			));
			}
		}
		$this->redirect(array('view','id'=>$model->student_registration_id));
		}
	}	
		$this->render('update',array(
			'model'=>$model,'acdmInfoModel'=>$acdmInfoModel,
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
			$model=$this->loadModel($id);
			$acdmInfoModel = StudentRegistrationAcademicInfo::model()->findAll(array('condition'=>'student_registration_id = '.$id));
			if($model->student_photo)
				//delete image from directory
				@unlink('./college_data/stud_images/'.$model->student_photo);

			foreach($acdmInfoModel as $info)
			{
				$info->delete();
			}
			$model->delete();
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
		$model=new StudentRegistrationInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentRegistrationInfo']))
			$model->attributes=$_GET['StudentRegistrationInfo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new StudentRegistrationInfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['StudentRegistrationInfo']))
			$model->attributes=$_GET['StudentRegistrationInfo'];

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
		$model=StudentRegistrationInfo::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-registration-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionStudentRegistration(){
		$model=new StudentRegistrationInfo();
		$acdmInfoModel = new StudentRegistrationAcademicInfo;	
		if(isset($_POST['StudentRegistrationInfo'])){
			$this->redirect(array('create','c_id'=>$_POST['StudentRegistrationInfo']['organization_id']));
		}
			$this->render('studentRegistration',array(
			'model'=>$model,
		));
	}
}
