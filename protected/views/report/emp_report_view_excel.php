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
//	print_r($selected_list);
	//echo CHtml::label('student first name','student_first_name');
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	$city=new City;
	$dept = new Department;
	
	echo "</br>";
	echo "<table border=\"1\">";
	echo "<tr class=\"table_header\"><th>Sr No.</th>";
	foreach($selected_emp_list as $s)
	{
		if($s=='employee_address_c_line1')
			echo "<th>Current Address</th>";
		else if($s=='city')
			echo "<th>City</th>";
		else if($s=='employee_bloodgroup')
			echo "<th>Blood Group</th>";
		else
			echo "<th>".CHtml::activeLabel($emp_info,$s)." </th>";
	}

	echo "</tr>";
	$i = 1;
	$m=1;
	foreach($emp_data as $t=>$sd)
	{ 
		//echo $sd['student_transaction_quota_id'];
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		echo "<tr class=".$class.">";
		echo "<td>".$i."</td>";
		foreach($selected_emp_list as $s)
		{
			if($s=='department_name')
				echo "<td>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td>";

			else if($s=='city')
			{
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";
				}
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='employee_refer_designation')
				echo "<td>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td>";
			else	
			{		
				echo "<td>".$sd[$s]."</td>";
			}

		}
		$i++;
		$m++;
		echo "</tr>";
	}
	
echo "</table>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
