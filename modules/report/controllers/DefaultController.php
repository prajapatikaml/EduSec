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
 * Default controller use as a report dashboard
 *
 * @package EduSec.modules.report.controllers
 */

namespace app\modules\report\controllers;
use yii\web\JsExpression;
use yii\web\Controller;
use Yii;
use app\modules\student\models\StuMaster;
use app\modules\employee\models\EmpMaster;
use app\modules\course\models\Courses;
use app\modules\student\models\StuInfo;
use app\modules\student\models\StuCategory;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use \app\modules\student\models\StuStatus;

class DefaultController extends Controller
{
    public function actionIndex()
    {
	$fYearWiseAdm = [];
	/**
	* @Start Display Category Wise Student Details Graph
	*/
	$stuCateDataTmp = StuCategory::find()->where(['is_status'=>0])->asArray()->all();	
	foreach($stuCateDataTmp as $cv) {
		$stuCatWiseDisp[] = $cv['stu_category_name'];
		$maleCount = (new \yii\db\Query())->from('stu_master sm')
		    ->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
		    ->where(['sm.is_status' => '0', 'si.stu_gender'=>'Male',  'sm.stu_master_category_id'=>$cv['stu_category_id']])->count();

		$femaleCount = (new \yii\db\Query())->from('stu_master sm')
		    ->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
		    ->where(['sm.is_status' => '0', 'si.stu_gender'=>'Female',  'sm.stu_master_category_id'=>$cv['stu_category_id']])->count();	
	
		$stuCatWiseDataMale[] = $maleCount;
		$stuCatWiseDataFemale[] = $femaleCount;
	}
	$stuCatWiseDisp[] = 'Not Set';
	$stuCatWiseDataMale[] = (new \yii\db\Query())->from('stu_master sm')
			->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
			->where(['sm.is_status'=>0, 'sm.stu_master_category_id'=>NULL, 'si.stu_gender'=>'Male'])->count();
	$stuCatWiseDataFemale[] = (new \yii\db\Query())->from('stu_master sm')
			->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
			->where(['sm.is_status'=>0, 'sm.stu_master_category_id'=>NULL, 'si.stu_gender'=>'Female'])->count();
	

    /**
	 * @Start Display Student Status Wise Details in combine graph
	 */
	$dataRegTmp = $courseData = [];
	$stuRegStat = StuMaster::find()->where(['is_status'=>0, 'stu_master_stu_status_id'=>0])->count();
	$stuStatusWise[] = ['name'=>"Default ($stuRegStat)", 'y'=>$stuRegStat, 'color'=>'#77C730'];

	$courseDataTmp = Courses::find()->where(['is_status'=>0])->asArray()->limit(10)->orderBy('course_id DESC')->all();
	$stuStatusDataTmp = StuStatus::find()->where(['is_status'=>0])->orderBy('stu_status_id')->asArray()->all();

	foreach($courseDataTmp as $v) {
		$stuCourseRegStat = StuMaster::find()->where(['is_status'=>0, 'stu_master_stu_status_id'=>0, 'stu_master_course_id'=>$v['course_id']])->count();
		$dataRegTmp[] = $stuCourseRegStat;
		$courseData[] = $v['course_name'];
	}
	$stuStatusData[] = ['name'=>"Default ($stuRegStat)", 
			  'type'=>'column',
			  'data'=>$dataRegTmp,
			  'color'=>'#77C730',
			];
	//print_r($stuStatusData); exit;

	foreach($stuStatusDataTmp as $k=>$sv) 
	{
		$dataTmp = [];
		foreach($courseDataTmp as $v) {
			$stuCourseStat = StuMaster::find()->where(['is_status'=>0, 'stu_master_course_id'=>$v['course_id'], 'stu_master_stu_status_id'=>$sv['stu_status_id']])->count();
			
			$dataTmp[] = $stuCourseStat;
		}

		$stuStatusWiseCount = StuMaster::find()->where(['is_status'=>0, 'stu_master_stu_status_id'=>$sv['stu_status_id']])->count();
		$stuStatusData[] = ['name'=>$sv['stu_status_name']."($stuStatusWiseCount)", 
				       'type'=>'column',
				       'data'=>$dataTmp,
					
				 ];
		$stuStatusWise[] = ['name'=>$sv['stu_status_name'].' ('.$stuStatusWiseCount.')',
				    'y'=>$stuStatusWiseCount,
				    'color'=>new JsExpression('Highcharts.getOptions().colors['.($k).']')
				];
		
	}

	/**
	* @Start Gender Wise Data Display For Student
	*/
	$stuGenWise = (new \yii\db\Query())
		    ->select(["CONCAT(IFNULL(si.stu_gender, 'Not Set'), ' (', COUNT( stu_master_id ), ')') AS '0'", 'COUNT(stu_master_id) AS "1"']) 
		    ->from('stu_master sm')
		    ->join('JOIN', 'stu_info si', 'si.stu_info_stu_master_id = sm.stu_master_id')
		    ->where(['sm.is_status' => '0'])
		    ->groupBy('si.stu_gender')
		    ->orderBy('si.stu_gender ASC')
		    ->all();
	if($stuGenWise)
	    $stuGenWise[0][0] = "Not Set".$stuGenWise[0][0];


	/**
	* @Start Gender Wise Data Display For Employee
	*/
	$empGenWise = (new \yii\db\Query())
		    ->select(["CONCAT(IFNULL(ei.emp_gender, 'Not Set'), ' (', COUNT( emp_master_id ), ')') AS '0'", 'COUNT(emp_master_id) AS "1"']) 
		    ->from('emp_master em')
		    ->join('JOIN', 'emp_info ei', 'ei.emp_info_emp_master_id = em.emp_master_id')
		    ->where(['em.is_status' => '0'])
		    ->groupBy('ei.emp_gender')
		    ->orderBy('ei.emp_gender ASC')
		    ->all();
	if($empGenWise)
	$empGenWise[0][0] = "Not Set".$empGenWise[0][0];


	/**
	* @Start Year wise employee joining
	*/
	$empYearWiseJoin = $depDisp = [];
	$empYearJoin = (new \yii\db\Query())
		    ->select(["CONCAT(DATE_FORMAT(ei.emp_joining_date, '%Y'), ' (', COUNT(em.emp_master_id), ')') AS 'yearDisp'", 'DATE_FORMAT(ei.emp_joining_date, "%Y") as "year"']) 
		    ->from('emp_master em')
		    ->join('JOIN', 'emp_info ei', 'ei.emp_info_emp_master_id = em.emp_master_id')
		    ->where(['em.is_status' => '0'])
		    ->groupBy(['DATE_FORMAT(ei.emp_joining_date, "%Y")'])
		    ->orderBy('YEAR(ei.emp_joining_date) DESC')
		    ->limit('3')
		    ->all();

	foreach($empYearJoin as $k=>$v) {
		$yearResults = $deptCount =  $depDisp = [];
		$deptData = \app\modules\employee\models\EmpDepartment::find()->where(['is_status'=>0])->limit(10)->orderBy('emp_department_id DESC')->asArray()->all();
		foreach($deptData as $k=>$dv) {
		    $deptCountTmp = (new \yii\db\Query())->from('emp_master em')
			->join('JOIN', 'emp_info ei', 'ei.emp_info_emp_master_id = em.emp_master_id')
			->where(['YEAR(ei.emp_joining_date)' => $v['year'], 'emp_master_department_id' => $dv['emp_department_id'], 'is_status'=>0])->count();
		    $deptCount[] = $deptCountTmp;
		    $depDisp[] = $dv['emp_department_alias'];
		}
		$yearResults = ['name'=>!empty($v['yearDisp']) ? $v['yearDisp'] : "Not Set", 'data'=>$deptCount];
		$empYearWiseJoin[] = $yearResults;	
	}
        return $this->render('index', ['stuCatWiseDataMale'=>$stuCatWiseDataMale,
				       'stuCatWiseDataFemale'=>$stuCatWiseDataFemale,
				       'stuCatWiseDisp'=>$stuCatWiseDisp,
				       'stuStatusWise'=>$stuStatusWise,
				       'stuGenWise'=>$stuGenWise,
				       'empYearWiseJoin'=>$empYearWiseJoin,
				       'depDisp'=>$depDisp,
				       'courseData'=>$courseData,
				       'stuStatusData'=>$stuStatusData,
				       'empGenWise'=>$empGenWise,
				]
			);
    }
    

   
}

