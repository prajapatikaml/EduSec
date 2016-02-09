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
 * Default controller use as a employee dashboard.
 *
 * @package EduSec.modules.employee.controllers
 */
namespace app\modules\employee\controllers;

use yii\web\Controller;
use app\modules\employee\models\EmpMaster;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {
	$empDesignWise = [];
	if(Yii::$app->session->get('stu_id'))
		return $this->redirect(['/employee/emp-master/index']);

	//Department wise employee display
	$empDepWise = (new \yii\db\Query())
		    ->select(["CONCAT(dp.emp_department_name, ' (', COUNT( emp_master_id ), ')') AS '0'", 'COUNT(emp_master_id) AS "1"']) 
		    ->from('emp_master em')
		    ->join('JOIN', 'emp_department dp', 'dp.emp_department_id = em.emp_master_department_id')
		    ->where(['em.is_status' => '0', 'dp.is_status' => '0'])
		    ->groupBy('em.emp_master_department_id')
		    ->all();

	//Recently added student list
	$empRecent = (new \yii\db\Query())
		    ->select(['em.emp_master_id', 'emp_unique_id', "CONCAT(ei.emp_first_name, ' ', ei.emp_last_name) AS 'emp_name'", 'dp.emp_department_name', 'DATE_FORMAT(em.created_at, "%d-%m-%Y") AS cDate']) 
		    ->from('emp_master em')
		    ->join('JOIN', 'emp_info ei', 'ei.emp_info_emp_master_id = em.emp_master_id')
		    ->join('JOIN', 'emp_department dp', 'dp.emp_department_id = em.emp_master_department_id')
		    ->where(['em.is_status' => '0'])
		    ->orderBy('emp_master_id DESC')
		    ->limit(10)
		    ->all();

	/**
	* @Start Designation wise employee display
	*/
	$empDesignWise = (new \yii\db\Query())
		    ->select(["CONCAT(ds.emp_designation_name, ' (', COUNT( emp_master_id ), ')') AS '0'", 'COUNT(emp_master_id) AS "1"']) 
		    ->from('emp_master em')
		    ->join('JOIN', 'emp_designation ds', 'ds.emp_designation_id = em.emp_master_designation_id')
		    ->where(['em.is_status' => '0'])
		    ->groupBy('emp_master_designation_id')
		    ->all();
	$empDesignWiseNull = EmpMaster::find()->where(['is_status'=>0, 'emp_master_designation_id'=>NULL])->count();
	if(!empty($empDesignWiseNull)) {
		$empDesignWise[] = ['name'=>'Not Set ('.($empDesignWiseNull).')', 'y'=>$empDesignWiseNull, 'sliced'=>true, 'selected'=>true, 'color'=>'#F45B5B'];
	}

        return $this->render('index', ['empDepWise'=>$empDepWise, 'empRecent'=>$empRecent, 'empDesignWise'=>$empDesignWise]);
    }
}
