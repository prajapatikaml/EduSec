<style>
	th{text-align:left;font-weight:normal;color:#990a10;width:110px;border:0.4px solid #74b9f0;height:24px;}
	.title{color:seagreen;}
	td{border:0.4px solid #74b9f0;height:24px;}
	.label{text-align:left;font-weight:normal;color:#990a10;width:110px;height:24px;}	
</style>
<?php
if($emp_data)
{
	echo "</br></br><h1>Employee List</h1>";
	
	//echo CHtml::label('student first name','student_first_name');
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	//$cat=new Category;
	$city=new City;
	$dept = new Department;
	
	//echo "</br></br><h1>Student List of ".Branch::model()->findByPk($branch)->branch_name." (".AcademicTermPeriod::model()->findByPk($acdm_period)->academic_term_period.")</h1>";
	echo "</br>";
	
	$i=1;
	foreach($emp_data as $t=>$sd)
	{ 
	   echo "<h3>".$sd['employee_first_name']."</h3>";
	   echo "<table>";
		
 	foreach($selected_emp_list as $s)
		{
 
		if($s=='department_name')
			echo "<tr><td class='label'>Department</td><td>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td></tr>";

		else if($s=='employee_address_c_line1')
			{	
				if($sd['employee_transaction_emp_address_id']!=0)
				{
					echo "<tr><td class='label'>Local Address</td>";
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_city))
					{
						$add_c = "<br/>".City::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_state))
					{
						$add_s = State::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_country))
					{
						$add_co = Country::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_country)->name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='text-align:center;width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line1." ".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_c_line2." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td></tr>";
			}
			else if($s=='employee_address_p_line1')
			{	
				if($sd['employee_transaction_emp_address_id']!=0)
				{
					echo "<tr><td class='label'>International Address</td>";
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_city))
					{
						$add_c = "<br/>".City::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_state))
					{
						$add_s = State::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_country))
					{
						$add_co = Country::model()->findByPk(EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_country)->name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='text-align:center; width:400px;'>".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line1." ".EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id'])->employee_address_p_line2." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
				}
				else  {
				echo "<td>&nbsp;</td></tr>";
				  }
				
			}
		else if($s=='category_name')
			{
				echo "<tr><td class='label'>Category Name </td>";
				if($sd['employee_transaction_category_id'] !=0)
				echo "<td>".Category::model()->findByPk($sd['employee_transaction_category_id'])->category_name."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
			}
		else if($s=='city')
			{
				echo "<tr><td class='label'>City</td>";
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td></tr>";			
					else
					echo "<td>&nbsp;</td></tr>";
				}
				else
				echo "<td>&nbsp;</td></tr>";
			}
		else if($s=='employee_bloodgroup_bloodgroup')
			echo "<tr><td class='label'>Blood Group</td><td>".$sd[$s]."</td></tr>";
		else if($s=='employee_refer_designation')
			echo "<tr><td class='label'>Designation</td><td>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td></tr>";
		else if($s=='employee_type'){
			$ty = ($sd[$s]==1) ? "Teaching" : "Non-teaching";
			echo "<tr><td class='label'>Type</td><td>".$ty."</td></tr>";
		}
		else
			echo "<tr><td class='label'>".CHtml::activeLabel($emp_info,$s)." </td><td>".$sd[$s]."</td></tr>";
		
		
		 
		
		  }
		
		echo "</table><h1>&nbsp;</h1>";
		
	$i++;		
	}
        
	
	

}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
