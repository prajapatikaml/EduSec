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
 * Employee controller its content employee related details
 *
 * @package EduSec.modules.report.controllers
 */

namespace app\modules\report\controllers;

use yii\web\Controller;
use Yii;
use app\modules\employee\models\EmpMasterSearch;
use app\modules\student\models\StuMasterSearch;
use app\modules\student\models\StuMaster;
use app\modules\student\models\StuInfo;
use app\models\City;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\NotFoundHttpException;

class EmployeeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    /* Employee Info Dynamic Report */
    public function actionEmpinforeport()
    {
	$selected_list = $query = NULL;
	$employee_data= array();
		
	 if((!empty($_POST['department'])||!empty($_POST['designation'])||!empty($_POST['gender'])||!empty($_POST['city'])||!empty($_POST['category'])) && !empty($_POST['e_info']))
	{
		if(!empty($_POST['department']))
		{
			$query .="emp.emp_master_department_id=".$_POST['department']. " AND ";
		}
		if(!empty($_POST['designation']))
		{
			$query .="emp.emp_master_designation_id=".$_POST['designation']. " AND ";
		}
		if(!empty($_POST['city']))
		{
			$query .="emp.emp_master_emp_address_id=".$_POST['city']. " AND ";
		}
		if(!empty($_POST['category']))
		{
			$query .="emp.emp_master_category_id=".$_POST['category']. " AND ";	
		}
		if(!empty($_POST['gender']))
		{
			$query .="e_info.emp_gender='".$_POST['gender']. "'"." AND ";
		}
		if(!empty($_POST['e_info']))
		{
			$selected_list = $_POST['e_info'];
		}
		
		$selected_list = $_POST['e_info'];		

		$employee_d = new \yii\db\Query();
		$employee_d ->select('*')
			->from('emp_master emp')
			->join('join','emp_info e_info', 'e_info.emp_info_id = emp.emp_master_emp_info_id')
			->join('join','emp_department emp_dep','emp_dep.emp_department_id = emp.emp_master_department_id ')
			->join('join','emp_designation emp_des','emp_des.emp_designation_id = emp.emp_master_designation_id ')
			->join('join','emp_category emp_cat','emp_cat.emp_category_id = emp. 	emp_master_category_id')
			->leftJoin('emp_address eadd', 'eadd.emp_address_id = emp.emp_master_emp_address_id')
			->where($query.'emp.is_status = 0');
	
			  $command = $employee_d->createCommand();
			  $employee_data = $command->queryAll();

		if(empty($employee_data))
		{		
		 \Yii::$app->getSession()->setFlash('emperror',"<i class='fa fa-exclamation-triangle'></i> <b> No Record Found For This Criteria.</b>");		
			return $this->redirect(['empinforeport']);			
		}					
		return $this->render('emp_info_report',[
      			'employee_data'=>$employee_data,'selected_list'=>$selected_list,'query'=>$query,
			]);	
		break;		
	}
	return $this->render('emp_report_view',['selected_list'=>$selected_list, 'query' => $query,]);
	
    }     
	// employee  info report export to pdf and excel file action
	public function actionSelectedEmployeeList()
	{		
		if(!empty($_REQUEST['employeelistexport']))
		{
			$query=null;
			$query= $_SESSION['query'];
			$selected_list=$_SESSION['selected_list'];
			$query1= new \yii\db\Query();
		 $query1-> select('*')
		        ->from('emp_master emp')
			->join('join','emp_info e_info', 'e_info.emp_info_id = emp.emp_master_emp_info_id')
			->join('join','emp_department emp_dep','emp_dep.emp_department_id = emp.emp_master_department_id ')
			->join('join','emp_designation emp_des','emp_des.emp_designation_id = emp.emp_master_designation_id ')
			->join('join','emp_category emp_cat','emp_cat.emp_category_id = emp. 	emp_master_category_id')
			->leftJoin('emp_address eadd', 'eadd.emp_address_id = emp.emp_master_emp_address_id')
			->where($query.'emp.is_status = 0');
			$command=$query1->createCommand();
			$employee_data=$command->queryAll();
			
			$html = $this->renderPartial('emp_info_report_pdf', array(
				'employee_data'=>$employee_data, 
				'selected_list'=>$selected_list,
			));
		
			ob_clean();
			return Yii::$app->pdf->exportData('Employee Info Report','Employee_info_report',$html);		
		}
		else if(!empty($_REQUEST['employeelistexcelexport']))
		{
			$query=null;
			$query= $_SESSION['query'];
			$selected_list=$_SESSION['selected_list'];
			
			$query1= new \yii\db\Query();
			$query1 -> select('*')
			       ->from('emp_master emp')
				->join('join','emp_info e_info', 'e_info.emp_info_id = emp.emp_master_emp_info_id')
				->join('join','emp_department emp_dep','emp_dep.emp_department_id = emp.emp_master_department_id ')
				->join('join','emp_designation emp_des','emp_des.emp_designation_id = emp.emp_master_designation_id ')
				->join('join','emp_category emp_cat','emp_cat.emp_category_id = emp. 	emp_master_category_id')
				->leftJoin('emp_address eadd', 'eadd.emp_address_id = emp.emp_master_emp_address_id')
				->where($query.'emp.is_status = 0');

			$command=$query1->createCommand();
			$employee_data=$command->queryAll();
			
				$file = $this->renderPartial('emp_info_report_excel', array(
					'employee_data'=>$employee_data, 
					'selected_list'=>$selected_list,
				    ));
			$fileName = "Employee_info_report".date('YmdHis').'.xls';	
			$options = ['mimeType'=>'application/vnd.ms-excel'];

			return Yii::$app->excel->exportExcel($file, $fileName, $options);
		}		
		else
		{		
			$query=$_SESSION['query'];
			$selected_list=null;
		}
	}
}
