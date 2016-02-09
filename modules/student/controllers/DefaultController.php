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
 * Student default controller use as a student modules dashboard
 *
 * @package EduSec.modules.student.controllers
 */

namespace app\modules\student\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
	$fYearWiseAdm = [];
	//Year wise admission count
	$stuYearAdm = (new \yii\db\Query())
		    ->select(["CONCAT(DATE_FORMAT(si.stu_admission_date, '%Y'), ' (', COUNT(sm.stu_master_id), ')') AS 'yearDisp'", 'DATE_FORMAT(si.stu_admission_date, "%Y") as "year"']) 
		    ->from('stu_master sm')
		    ->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
		    ->where(['sm.is_status' => '0'])
		    ->groupBy(['DATE_FORMAT(si.stu_admission_date, "%Y")'])
		    ->orderBy('YEAR(si.stu_admission_date) DESC')
		    ->limit('3')
		    ->all();

	foreach($stuYearAdm as $k=>$v) {
		$yearResults = $mothCount = [];
		for($i=1; $i<=12; $i++) {
		    $monthCountTmp = (new \yii\db\Query())->from('stu_master sm')
			->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
			->where(['YEAR(si.stu_admission_date)' => $v['year'], 'MONTH(si.stu_admission_date)' => $i, 'is_status'=>0])->count();
		    $mothCount[] = $monthCountTmp;
		}
		$yearResults = ['name'=>$v['yearDisp'], 'data'=>$mothCount];
		$fYearWiseAdm[] = $yearResults;	
	}

	//Course wise student count
	$stuCount = (new \yii\db\Query())
		    ->select(["CONCAT(cs.course_name, ' (', COUNT( stu_master_id ), ')') AS '0'", 'COUNT(stu_master_id) AS "1"']) 
		    ->from('stu_master sm')
		    ->join('JOIN', 'courses cs', 'cs.course_id = sm.stu_master_course_id')
		    ->where(['sm.is_status' => '0', 'cs.is_status' => '0'])
		    ->groupBy('stu_master_course_id')
		    ->all();

	//Recently added student list
	$stuLast = (new \yii\db\Query())
		    ->select(['sm.stu_master_id', 'stu_unique_id', "CONCAT(si.stu_first_name, ' ', si.stu_last_name) AS 'stu_name'", 'cs.course_name', 'b.batch_name', 'DATE_FORMAT(sm.created_at, "%d-%m-%Y") AS cDate']) 
		    ->from('stu_master sm')
		    ->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
		    ->join('JOIN', 'courses cs', 'cs.course_id = sm.stu_master_course_id')
		    ->join('JOIN', 'batches b', 'b.batch_id = sm.stu_master_batch_id')
		    ->where(['sm.is_status' => '0'])
		    ->orderBy('stu_master_id DESC')
		    ->limit(10)
		    ->all();

        return $this->render('index', ['fYearWiseAdm'=>$fYearWiseAdm, 'stuCount'=>$stuCount, 'stuLast'=>$stuLast]);
    }
}
