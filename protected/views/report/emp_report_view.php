<?php
$this->breadcrumbs=array('Report' => array(),
	'Employee Info',
	
);?>
<h1>Employee Report</h1>
<div class="operation">
<?php
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_emp_list;
echo CHtml::link('Back',array('report/EmployeeInfoReport'),array('class'=>'btnback'));  
echo CHtml::link('Excel',array('report/SelectedEmployeeList', 'employeelistexcelexport'=> 'employeelistexcel'),array('class'=>'btnblue'));
?>
</div>
<?php
if($emp_data)
{
?>

<?php	
	$emp_info=new EmployeeInfo;
	$add=new EmployeeAddress;
	$city=new City;
	$dept = new Department;
	echo '<div class="portlet box blue" style="min-width: 100%;width:auto;">';
	echo '<i class="icon-reorder"></i>';
	echo '<div class="portlet-title">Employee List</div>';

	echo "<table cellpadding='0' cellspacing='0' border='0' class='dynamic-report' >";
	echo "<thead>";
	echo "<tr><th style='text-align:center;'>No.</th>";
	foreach($selected_emp_list as $s)
	{
		if($s=='department_name')
			echo "<th style='text-align:center;'>Department</th>";
		else if($s=='employee_address_c_line1')
			echo "<th style='text-align:center;width: 400px;'>Current Address</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='employee_bloodgroup_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='employee_refer_designation')
			echo "<th style='text-align:center;'>Designation</th>";
		else if($s=='employee_private_email')
			echo "<th style='text-align:center;width: 270px;'>".CHtml::activeLabel($emp_info,$s)."</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($emp_info,$s)." </th>";
		
		
		
	}

	echo "</tr></thead>";
	$i = 1;
	$m=1;
	foreach($emp_data as $t=>$sd)
	{ 
		
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}
		echo "<tr class=".$class.">";
		echo "<td style='text-align:center;'>".$i."</td>";
		foreach($selected_emp_list as $s)
		{
			if($s=='department_name')
				echo "<td style='text-align:center;'>".Department::model()->findByPk($sd['employee_transaction_department_id'])->department_name."</td>";
			else if($s=='category_name')
			{
				if($sd['employee_transaction_category_id'] !=0)
				echo "<td style='text-align:center;'>".Category::model()->findByPk($sd['employee_transaction_category_id'])->category_name."</td>";
				else
				echo "<td>-</td>";
			}
			else if($s=='city')
			{
				if($sd['employee_transaction_emp_address_id'] !=0)
				{
					$add = EmployeeAddress::model()->findByPk($sd['employee_transaction_emp_address_id']);
					if($add->employee_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->employee_address_c_city)->city_name."</td>";			
					else
					echo "<td>-</td>";
				}
				else
				echo "<td>-</td>";
			}
			else if($s=='employee_refer_designation')
				echo "<td style='text-align:center;'>".EmployeeDesignation::model()->findByPk($sd['employee_transaction_designation_id'])->employee_designation_name."</td>";
			else	
			{	
				if($s=='employee_address_c_line1')
					echo "<td style='text-align:center;width:400px;'>";
				else if($s=='employee_private_email')
					echo "<td style='text-align:center;width:250px;'>";
				else
					echo "<td style='text-align:center;'>";
				echo !empty($sd[$s]) ? $sd[$s]  : "-" ."</td>";
			}

		}
		$i++;
		$m++;
		echo "</tr>";
	}
	
echo "</table></div>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
