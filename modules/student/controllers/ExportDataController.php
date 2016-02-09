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
 * Student export data controller use as export/convert data PDF/Excel
 *
 * @package EduSec.modules.student.controllers
 */

namespace app\modules\student\controllers;

use yii\web\Controller;
use Yii;
use app\modules\student\models\StuDocs;
use app\modules\student\models\StuMaster;
use app\modules\student\models\StuInfo;
use app\modules\student\models\StuAddress;
use app\modules\student\models\StuCategory;
use app\modules\course\models\Courses;
use app\modules\course\models\Batches;
use app\modules\course\models\Section;
use app\modules\student\models\StuGuardians;
use app\models\Nationality;

class ExportDataController extends Controller
{
	public function actionStudentProfilePdf($sid)
	{
		$nationality = $stuAdd =  [];

		$stuMaster = StuMaster::findOne($sid);
		$stuDocs = StuDocs::find()->where(['stu_docs_stu_master_id' => $sid])->join('join','document_category dc', 'dc.doc_category_id = stu_docs_category_id AND dc.is_status <> 2')->all();
		$stuInfo = StuInfo::find()->where(['stu_info_stu_master_id' => $sid])->one();
		$stuCourse = Courses::findOne($stuMaster->stu_master_course_id);
		$stuBatch = Batches::findOne($stuMaster->stu_master_batch_id);
		$stuSection = Section::findOne($stuMaster->stu_master_section_id);
		$stuGuard = StuGuardians::findAll(['guardia_stu_master_id' => $sid]);
		$sDocs = new StuDocs;
		
		if($stuMaster->stu_master_nationality_id !== null)
			$nationality = Nationality::findOne($stuMaster->stu_master_nationality_id)->nationality_name;

		if($stuMaster->stu_master_stu_address_id !== null)
			$stuAdd = StuAddress::findOne($stuMaster->stu_master_stu_address_id);
		 
		$html = $this->renderPartial('/stu-master/stuprofilepdf',
			[
				'stuDocs' => $stuDocs,
				'stuMaster' => $stuMaster,
				'stuInfo' => $stuInfo,	
				'nationality' => $nationality,
				'stuBatch' => $stuBatch,
				'stuCourse' => $stuCourse,
				'stuSection' => $stuSection,
				'stuAdd' => $stuAdd,
				'stuGuard' => $stuGuard,
				'sDocs' => $sDocs,
			]);
		$fName = $stuInfo->stu_first_name."_".$stuInfo->stu_last_name."_".date('Ymd-His');
		return Yii::$app->pdf->exportData('Student Report',$fName,$html);
	}
}
