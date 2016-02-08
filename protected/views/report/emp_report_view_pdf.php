<style>
table, th, td {
  vertical-align: middle;
}
th, td, caption {
  padding: 4px 0 10px;
  text-align: center;
}

</style>
<?php
if($emp_data)
{
	echo "</br></br><h1>Employee List</h1>";
	
	//echo CHtml::label('student first name','student_first_name');
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	$cat=new Category;
	$city=new City;
	$dept = new Department;
	
	//echo "</br></br><h1>Student List of ".Branch::model()->findByPk($branch)->branch_name." (".AcademicTermPeriod::model()->findByPk($acdm_period)->academic_term_period.")</h1>";
	echo "</br>";
	
	$i=1;
	foreach($emp_data as $t=>$sd)
	{ 
	   echo "<h3>".$sd['employee_first_name']."</h3>";
	   echo "<table border=\"1\">";
		
 	foreach($selected_emp_list as $s)
		{
 
		if($s=='department_name')
			echo "<tr><td>Department</td><td>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td></tr>";

		else if($s=='employee_address_c_line1')
			echo "<tr><td>Current Address</td><td>".$sd[$s]."</td></tr>";
		else if($s=='employee_address_p_line1')
			echo "<tr><td>Permenent Address</td><td>".$sd[$s]."</td></tr>";
		else if($s=='category_name')
			{
				echo "<tr><td>Category Name </td>";
				if($sd['employee_transaction_category_id'] !=0)
				echo "<td>".Category::model()->findByPk($sd['employee_transaction_category_id'])->category_name."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
			}
		else if($s=='city')
			{
				echo "<tr><td>City</td>";
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
			echo "<tr><td>Blood Group</td><td>".$sd[$s]."</td></tr>";
		else if($s=='employee_refer_designation')
			echo "<tr><td>Designation</td><td>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td></tr>";
		else
			echo "<tr><td>".CHtml::activeLabel($emp_info,$s)." </td><td>".$sd[$s]."</td></tr>";
		
		
		 
		
		  }
		
		echo "</table><h1>&nbsp;</h1>";
		
	$i++;		
	}
        
	
	

}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
