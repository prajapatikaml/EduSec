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
 * @package EduSec.modules.employee.controllers
 */

namespace app\modules\employee\controllers;
use yii\web\Controller;
use Yii;
use app\modules\employee\models\EmpDocs;
use app\modules\employee\models\EmpMaster;
use app\modules\employee\models\EmpAddress;
use app\modules\employee\models\EmpInfo;
use app\models\Nationality;

class ExportDataController extends Controller
{
	public function actionEmployeeProfilePdf($eid) 
	{
		$nationality = $empAdd = [];

		$empMaster = EmpMaster::findOne($eid);
		$empDocs = EmpDocs::find()->where(['emp_docs_emp_master_id'=>$eid])->join('join','document_category dc', 'dc.doc_category_id = emp_docs_category_id AND dc.is_status <> 2')->all();
		$empInfo = EmpInfo::find()->where(['emp_info_emp_master_id'=>$eid])->one();
		
		if($empMaster->emp_master_nationality_id !== null)
			$nationality = Nationality::findOne($empMaster->emp_master_nationality_id)->nationality_name;

		if($empMaster->emp_master_emp_address_id !== null)
			$empAdd = EmpAddress::findOne($empMaster->emp_master_emp_address_id);
		 
		$html = $this->renderPartial('/emp-master/empprofilepdf',
			[
				'empDocs'=>$empDocs,
				'empMaster'=>$empMaster,
				'empInfo'=>$empInfo,	
				'nationality'=>$nationality,
				'empAdd'=>$empAdd,
			]);
		$fName = $empInfo->emp_first_name."_".$empInfo->emp_last_name."_".date('Ymd_His');
		return Yii::$app->pdf->exportData('Employee Profile',$fName,$html);
	}
	
}
