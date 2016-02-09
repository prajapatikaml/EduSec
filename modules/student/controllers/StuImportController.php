<?php

/*****************************************************************************************
 * EduSec  Open Source Edition is a School / College management system developed by
 * RUDRA SOFTECH. Copyright (C) 2010-2015 RUDRA SOFTECH.

 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see http://www.gnu.org/licenses. 

 * You can contact RUDRA SOFTECH, 1st floor Geeta Ceramics, 
 * Opp. Thakkarnagar BRTS station, Ahmedbad - 382350, India or
 * at email address info@rudrasoftech.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * RUDRA SOFTECH" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by RUDRA SOFTECH".
 *****************************************************************************************/
/**
 * StuMasterController implements the CRUD actions for StuMaster model.
 *
 * @package EduSec.modules.student.controllers
 */

namespace app\modules\student\controllers;

use Yii;
use arogachev\excel\import\basic\Importer;
use yii\web\UploadedFile;
use PHPExcel;
use PHPExcel_IOFactory;
use yii\helpers\Html;
use app\modules\student\models\StuMaster;
use app\modules\student\models\StuInfo;
use app\modules\student\models\StuCategory;
use app\modules\student\models\StuAddress;
use app\modules\course\models\Courses;
use app\modules\course\models\Batches;
use app\modules\course\models\Section;
use app\models\AuthAssignment;
use app\models\Nationality;
use app\models\City;
use app\models\State;
use app\models\Country;
use app\models\User;

class StuImportController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$model = new StuMaster();		
		$model->scenario = 'import-student';
		$importResults = [];

		if ($model->load(Yii::$app->request->post())) {			
			$model->importFile = UploadedFile::getInstance($model, 'importFile');
			if($model->saveImportFile()) {
				$importResults = $this->importStuData($model);
				//print_r($importResults); exit;
			}			
		}

        return $this->render('index', [
			'model' => $model,
			'importResults' => $importResults,
		]);
    }

	public function importStuData($model)
	{
		$dispResults = []; 
		$totalSuccess = 0;
		
		$objPHPExcel = PHPExcel_IOFactory::load($model->importFilePath.$model->importFile);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		
		//print_r($sheetData); exit;
		unset($sheetData[1]);

		//start import student row by row
		foreach($sheetData as $k => $line){
			//print_r($line); exit;
			if(!array_filter($line))
				continue;
				 
			$line = array_map('trim', $line);
			$line = array_map(function($value) { return empty($value) ? NULL : $value; }, $line);
			
			$stuMaster = new StuMaster();
			$stuInfo = new StuInfo();
			$stuInfo->scenario = 'import-stu';
			$stuAddress = new StuAddress();
			$user = new User();		
			$auth_assign = new AuthAssignment();

			//set student info attributes
			$stuInfo->stu_unique_id = $stuInfo->getUniqueId();	// Student Unique Id
			$stuInfo->stu_title = $this->valueReplace($line['A'], $stuInfo->getTitleOptions()); //Title Name 
			$stuInfo->stu_first_name = $line['B']; //First Name
			$stuInfo->stu_last_name = $line['C']; //Last Name 
			$stuInfo->stu_dob = Yii::$app->dateformatter->getDateFormat($line['D']); //Date of Birth
			$stuInfo->stu_admission_date = Yii::$app->dateformatter->getDateFormat($line['H']); //Student Admission Date
			$stuInfo->stu_gender = $this->valueReplace($line['I'], $stuInfo->getGenderOptions()); // Gender
			$stuInfo->stu_email_id = $line['J']; // Email ID
			$stuInfo->stu_mobile_no = $line['K']; // Mobile No
			
			//set student master attribute
			$stuMaster->stu_master_course_id = $this->valueReplace($line['E'], Courses::getStuCourse()); // Course
			$stuMaster->stu_master_batch_id = $this->valueReplace($line['F'], Batches::getStuBatches()); // Batch 			
			$stuMaster->stu_master_section_id = $this->valueReplace($line['G'], Section::getStuSection()); // Section	
			$stuMaster->stu_master_category_id = $this->valueReplace($line['L'], StuCategory::getStuCategoryId()); //Admission Category
			
			$stuMaster->stu_master_nationality_id = $this->valueReplace($line['M'], Nationality::getNationality()); //Nationality

			//set student address attribute
			$stuAddress->stu_cadd = $line['N']; //Current Address
			$stuAddress->stu_cadd_city = $this->valueReplace($line['O'], City::getAllCity()); //City
			$stuAddress->stu_cadd_state = $this->valueReplace($line['P'], State::getAllState()); //State
			$stuAddress->stu_cadd_country = $this->valueReplace($line['Q'], Country::getAllCountry()); //Country
			$stuAddress->stu_cadd_pincode = $line['R']; //Pincode
			$stuAddress->stu_cadd_house_no = $line['S']; //House No
			$stuAddress->stu_cadd_phone_no = $line['T']; //Phone No
	
			//set user login info attributes
			$uniq_id = $stuInfo->getUniqueId();
			$login_id = \app\models\Organization::find()->one()->org_stu_prefix.$uniq_id;

			$user->user_login_id = $login_id; //user login id
			$user->user_password = md5($user->user_login_id.$user->user_login_id); //user password
			$user->user_type = "S"; //user type
			$user->created_by = Yii::$app->getid->getId();	//created by		
			$user->created_at = new \yii\db\Expression('NOW()'); //created at

			if($user->validate() && $stuInfo->validate() && $stuAddress->validate())
			{				
				$transaction = Yii::$app->db->beginTransaction();
				try{
					if($stuInfo->save() && $user->save() && $stuAddress->save()){
						
						$stuMaster->stu_master_stu_info_id = $stuInfo->stu_info_id;
						$stuMaster->stu_master_user_id = $user->user_id;
						$stuMaster->stu_master_stu_address_id = $stuAddress->stu_address_id;
						$stuMaster->created_by = Yii::$app->getid->getId();
						$stuMaster->created_at = new \yii\db\Expression('NOW()');
						if($stuMaster->save()){
							
							$stuInfo->stu_info_stu_master_id = $stuMaster->stu_master_id;
							if($stuInfo->save(false)){
								$auth_assign->item_name = 'Student';
								$auth_assign->user_id = $user->user_id;
								$auth_assign->created_at = date_format(date_create(),'U');
								$auth_assign->save(false);
								$transaction->commit();
								$totalSuccess+=1;
								$dispResults[] = array_merge($line, ['type' => 'S', 'stuMasterId' => $stuMaster->stu_master_id, 'message' => 'Success']);
							}
						}else{
							$dispResults[] = array_merge($line, ['type' => 'E', 'message' => Html::errorSummary($stuMaster)]);							
						}
					} // end stuInfo, user, StuAddress
					$transaction->rollback();
				}
				catch(\Exception $e){
					$transaction->rollBack();
					$dispResults[] = array_merge($line, ['type' => 'E', 'message' => $e->getMessage()]);
				}					
			}else{
				$dispResults[] = array_merge($line, [
						'type' => 'E', 
						'message' => Html::errorSummary([$user,  $stuInfo, $stuMaster, $stuAddress]),
					]);
			}  //end validated if	
		} //end foreach
		return ['dispResults' => $dispResults, 'totalSuccess' => $totalSuccess];
	}

	protected function valueReplace($value, $arrayData)
    {
    	if(empty($value) || empty($arrayData)) {
    		return null;
    	} else {
    		$key = array_search(strtolower($value), array_map('strtolower', $arrayData));
    		return ($key) ? $key : NULL;
    	}    
    }
	
	public function actionDownloadFile($id)
    {
    	$path = null;
		$selectLang = \Yii::$app->language;
		
    	if($id=='SSF') {
			if($selectLang == 'en')
    			$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_en.xlsx';
			else if($selectLang == 'gu')
				$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_gu.xlsx';
			else if($selectLang == 'hi')
				$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_hi.xlsx';
			else if($selectLang == 'fr')
				$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_fr.xlsx';
			else if($selectLang == 'es')
				$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_es.xlsx';
			else
				$path = Yii::getAlias('@webroot').'/data/import_files/sample_files/student_import_en.xlsx';
    	}
    
		if(file_exists($path)) {
			return \Yii::$app->response->sendFile($path);
		}
		else
			throw new NotFoundHttpException('The requested file does not exist.');	
    }
}
