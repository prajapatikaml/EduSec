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
 * Student controller its content student related details
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

class StudentController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionStuinforeport()
    {
	$selected_list = $query = NULL;
	$student_data = array();
	$model = new StuMaster();
	$info = new StuInfo();
	$course = $batch = $section = null;
	  	
	if( !empty($_POST['s_info']) && !empty($_POST['StuMaster']['stu_master_course_id'])||
	   (!empty($_POST['StuMaster']['report_batch_id']) || 
	    !empty($_POST['StuMaster']['report_section_id']) || 
            !empty($_POST['StuMaster']['report_city']) ||
            !empty($_POST['StuInfo']['stu_gender']) 
	   ) 
	  )
	{
		if (Yii::$app->request->isAjax) {
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validateMultiple([$model,$info]);
        }
		if(!empty($_POST['StuMaster']['stu_master_course_id']))
		{
			$query .="stu.stu_master_course_id=".$_POST['StuMaster']['stu_master_course_id']. " AND ";
		}
		if(!empty($_POST['StuMaster']['report_batch_id']))
		{
			$query .="stu.stu_master_batch_id=".$_POST['StuMaster']['report_batch_id']." AND ";		
		}
		
		if(!empty($_POST['StuMaster']['report_section_id']))
		{
			$query .="stu.stu_master_section_id=".$_POST['StuMaster']['report_section_id']. " AND ";			
		}
		if(!empty($_POST['StuMaster']['report_city']))
		{
			$query .="add.stu_cadd_city=".$_POST['StuMaster']['report_city']. " AND ";	
		}
		if(!empty($_POST['StuInfo']['stu_gender']))
		{
			$query .="s_info.stu_gender='".$_POST['StuInfo']['stu_gender']."' AND ";
			
		}
		if(!empty($_POST['s_info']))
		{
			$selected_list=$_POST['s_info'];  
		}
		echo $model->validate();

		$query1= new \yii\db\Query();
		$query1 -> select('*')
	       -> from('stu_master stu')
	       -> join('join','stu_info s_info','s_info.stu_info_id = stu.stu_master_stu_info_id')
			->join('join','stu_address add', 'add.stu_address_id = stu.stu_master_stu_address_id')
			->where($query.'stu.is_status = 0');

		$command=$query1->createCommand();
		$student_data=$command->queryAll();		
		if(empty($student_data)){	
			 \Yii::$app->getSession()->setFlash('studerror',"<i class='fa fa-exclamation-triangle'></i> <b> No Record For This Criteria.</b>");		
				return $this->redirect(['stuinforeport']);
		}		
		return $this->render('stu_info_report',[
      				'student_data'=>$student_data,'selected_list'=>$selected_list,'query'=>$query,
			]);	
	break;		
	}
	return $this->render('stu_report_view',
			['model'=>$model,'info'=>$info,
			'query'=>$query,'selected_list'=>$selected_list, 
		]);
    }

	// student info report export to pdf and excel
	public function actionSelectedStudentList()
	{		
		if(!empty($_REQUEST['studentlistexport']))
		{
			$query= $_SESSION['query'];
			$selected_list=$_SESSION['selected_list'];
			$query1= new \yii\db\Query();
			$query1-> select('*')
			       -> from('stu_master stu')
			       -> join('join','stu_info s_info','s_info.stu_info_id = stu.stu_master_stu_info_id')
			       ->join('join','stu_address add', 'add.stu_address_id = stu.stu_master_stu_address_id')
			       ->where($query.'stu.is_status = 0');
			$command=$query1->createCommand();
			$student_data=$command->queryAll();
			
			$html = $this->renderPartial('stu_info_report_pdf', array(
				'student_data'=>$student_data, 
				'selected_list'=>$selected_list,
			));
			
			ob_clean();
			return Yii::$app->pdf->exportData('Student Info Report','Student_info_report',$html);		
		}
		else if(!empty($_REQUEST['studentlistexcelexport']))
		{
			
			$query= $_SESSION['query'];
			$selected_list=$_SESSION['selected_list'];
			$query1= new \yii\db\Query();
			$query1 -> select('*')
			        -> from('stu_master stu')
			        -> join('join','stu_info s_info','s_info.stu_info_id = stu.stu_master_stu_info_id')
				->join('join','stu_address add', 'add.stu_address_id = stu.stu_master_stu_address_id')
				->where($query.'stu.is_status = 0');
				$command=$query1->createCommand();
				$student_data=$command->queryAll();
			
			$file = $this->renderPartial('stu_info_report_excel', array(
					'student_data'=>$student_data, 
					'selected_list'=>$selected_list,
				    ));
			$fileName = "Student_info_report".date('YmdHis').'.xls';	
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
