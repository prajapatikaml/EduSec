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
?>
<div class="grid-view user-data">
<?php
if(!empty($employee_data))
{
	$emp_info = new EmpInfo();
	echo "</br></br><h3>Employee List</h3>";		
	$i = 1;
	foreach($employee_data as $t=>$sd)
	{ 
		 echo "<h3>".$sd['emp_first_name']." ".$sd['emp_last_name']."</h3>";
	  	 echo "<table>";
		
		echo '<tr>';
		echo "<td class='label'>Sr.No</td><td>".$i."</td>";
		
		foreach($selected_list as $s)
		{
			if($s=='emp_department_name'){
			echo "<tr><td class='label'>Department</td><td>".EmpDepartment::findOne($sd['emp_master_department_id'])->emp_department_name."</td></tr>";
			}
			else if($s == 'emp_designation_name'){
				if($sd['emp_master_designation_id']!= null)
					echo "<tr><td class='label'>Designation </td><td class='text-center'>".EmpDesignation::findOne($sd['emp_master_designation_id'])->emp_designation_name."</td></tr>";
				else
					echo "<tr><td> &nbsp;</td></tr>";
			}
			else if($s=='emp_cadd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					echo "<tr><td class='label'>Local Address</td>";
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
					echo "<td>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_cadd." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
					
				}
				else
					echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='emp_padd')
			{	
				if($sd['emp_master_emp_address_id']!=0)
				{
					echo "<tr><td class='label'>International Address</td>";
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city))
					{
						$add_c = "<br/>".City::findOne(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd_state))
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
				echo "<td>".EmpAddress::findOne($sd['emp_master_emp_address_id'])->emp_padd." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
				}
				else  {
				    echo "<td>&nbsp;</td></tr>";
				  }				
			}
			else if($s=='emp_category_name')
			{
				echo "<tr><td class='label'>Category Name </td>";
				if($sd['emp_master_category_id'] !=0)
				echo "<td>".Category::findOne($sd['emp_master_category_id'])->emp_category_name."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='city')
			{
				echo "<tr><td class='label'>City</td>";
				if($sd['emp_master_emp_address_id'] !=0)
				{
					$add = EmpAddress::findOne($sd['emp_master_emp_address_id']);
					if($add->emp_cadd_city != null)
					  echo "<td>".City::findOne($add->emp_cadd_city)->city_name."</td></tr>";			
					else
					  echo "<td>&nbsp;</td></tr>";
				}
				else
				echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='emp_guardian_mobile_no')
			{
				echo "<tr><td class='label'>Guardian No </td>";
					echo "<td>".($sd[$s])."</td></tr>";
				
			}
			else if($s=='emp_bloodgroup')
				echo "<tr><td class='label'>Blood Group</td><td>".$sd[$s]."</td></tr>";
			else
				echo "<tr><td class='label'>".Html::ActiveLabel($emp_info,$s)." </td><td>".$sd[$s]."</td></tr>";
	
		  }		
		echo "</table>";
		echo "<h2> &nbsp; </h2>";
	$i++;		
	}
	

}
else
	echo  "<h1 style=\"color:red;text-align:center;margin-top:10%;margin-right:60%\">No Record To Display</h1>";
?>
</div>
