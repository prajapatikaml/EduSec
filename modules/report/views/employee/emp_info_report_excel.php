
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\City;
use app\models\State;
use app\models\Country;
use yii\web\Controller;
use app\modules\employee\models\EmpInfo;
use app\modules\employee\models\EmpAddress;
use app\modules\employee\models\EmpMaster;
use app\modules\employee\models\EmpDepartment;
use app\modules\employee\models\EmpDesignation;

$this->title = Yii::t('app', 'Employee Info Report');
$this->params['breadcrumbs'][] = $this->title;

?>
<?php

if(!empty($employee_data))
{
	$cnt = count($selected_list)+1;
	$emp_info = new EmpInfo();
	echo "<table border='1' >";
	echo "<tr ><th colspan=".$cnt."> <center> <h4 >Employee Info Report </h4> </center></th> </tr> ";
	echo "<tr ><th >SI No.</th>";

	foreach($selected_list as $s)
	{
		if($s=='emp_department_name')
			echo "<th style='align:center; valign:'middle';' >Department</th>";
		else if($s=='emp_designation_name')
			echo "<th style='align:center; valign:'middle';'>Designation</th>";
		else if($s=='emp_cadd')
			echo "<th style='align:center; valign:'middle';'>Local </br>Address</th>";
		else if($s=='emp_padd')
			echo "<th style='align:center; valign:'middle';'>International</br>Address</th>";
		else if($s=='emp_category_name')
			echo "<th style='align:center; valign:'middle';'>Category</th>";
		else if($s=='city')
			echo "<th style='align:center; valign:'middle';'>City</th>";
		else if($s=='emp_bloodgroup')
			echo "<th style='align:center; valign:'middle';'>Blood</br> Group</th>";
		else if($s=='emp_joining_date')
			echo "<th style='align:center; valign:'middle';'>Joining</br> Date </th>";
		else if($s == 'emp_guardian_mobile_no')
			echo "<th class='text-center'>Guardian <br>No</th>";
		else if($s=='emp_email_id')
			echo "<th style='align:center; valign:'middle';'>".Html::activeLabel($emp_info,$s)."<br></th>";
		else
			echo "<th style='align:center; valign:'middle';'>".Html::activeLabel($emp_info,$s)."</br> </th>";
		
	}

	echo "</tr>";
	$i = 1;
	foreach($employee_data as $t=>$sd)
	{ 	
		 if(($i%2) == 0)
		 {
			$bgcolor = "#FFFFFF";
		 }
		 else
		 {
			$bgcolor = "#E3E3E3";
		 } 
		echo '<tr align=center bgcolor='.$bgcolor.'>';
		echo "<td style='align:center; valign:'middle';'>".$i."</td>";
		foreach($selected_list as $s)
		{
			if($s=='emp_department_name')
				echo "<td style='align:center; valign:'middle';'>".EmpDepartment::findOne($sd['emp_master_department_id'])->emp_department_name."</td>";
			else if($s == 'emp_designation_name'){
				if($sd['emp_master_designation_id']!= null)
					echo "<td class='text-center'>".EmpDesignation::findOne($sd['emp_master_designation_id'])->emp_designation_name."</td>";
				else
					echo "<td > &nbsp;</td>";
			}
			else if($s=='city')
			{
				if($sd['emp_master_emp_address_id'] !=0)
				{
					$add = EmpAddress::findOne($sd['emp_master_emp_address_id']);
					if($add->emp_cadd_city != null)
					echo "<td style='align:center; valign:'middle';'>".City::findOne($add->emp_cadd_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='emp_designation_name'){
				if($sd['emp_master_designation_id']!= null)
					echo "<td style='align:center; valign:'middle';'>".EmpDesignation::findOne($sd['emp_master_designation_id'])->emp_designation_name."</td>";
				else
					echo "<td> &nbsp;</td>";
			}
			else if($s=='emp_category_name'){
				echo "<td style='align:center; valign:'middle';'>".EmpCategory::findOne($sd['emp_master_category_id'])->emp_category_name."</td>";	
			}			
		        else if($s=='emp_cadd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_city))
					{
						$add_c = "<br/>".City::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_state))
					{
						$add_s = State::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_country))
					{
						$add_co = Country::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='align:center; valign:'middle';''>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd." ".$add_c." ".$add_s." ".$add_co."</td>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='emp_padd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city))
					{
						$add_c = "<br/>".City::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd_state))
					{
						$add_s = State::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_country))
					{
						$add_co = Country::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_country)->country_name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='align:center; valign:'middle';'>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd." ".$add_c." ".$add_s." ".$add_co."</td>";
				}
				else  {
				echo "<td >&nbsp;</td>";
				  }				
			}			
			else if($s=='emp_joining_date')
			{
				$jdate=EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s;
				echo "<td style='text-align:center;width:250px;'>".date('d-m-Y',strtotime($jdate))."</td>";	
			}
			else if($s=='emp_dob')
			{
				$bdate=EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s;
				echo "<td style='text-align:center;width:250px;'>".date('d-m-Y',strtotime($bdate))."</td>";	
			}
			else if($s=='emp_email_id')
			{
				echo "<td style='text-align:center;width:250px;'>".Empinfo::findOne($sd['emp_master_emp_info_id'])->$s."</td>";	
			}
			else
			{
				echo "<td style='align:center; valign:'middle';'>".EmpInfo::findOne($sd['emp_master_emp_info_id'])->$s."</td>";
			}
		}
		$i++;
		echo "</tr>";
	}
	
echo "</table></div>";
}
else
	echo  "<h1 style=\"color:red;text-align:center;margin-top:10%;margin-right:60%\">No Record To Display</h1>";
