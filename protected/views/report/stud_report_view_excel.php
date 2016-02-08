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

if($stud_data)
{
	echo "</br></br><h1>Student List</h1>";
//	
	$student_info=new StudentInfo;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$city=new City;
	
	echo "</br>";
	echo "<table border=\"1\" >";
	echo "<tr class=\"table_header\"><th>Sr No.</th>";
	foreach($selected_list as $s)
	{
		if($s=='sem')
			echo "<th>Semester</th>";
		else if($s=='student_address_c_line1')
			echo "<th>Current Address</th>";
		else if($s=='city')
			echo "<th>City</th>";
		else if($s=='student_bloodgroup')
			echo "<th>Blood Group</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($student_info,$s)."</th>";
		
		
		
	}
	echo "</tr>";
	$i = 1;
	$m=1;
	//print_r($stud_data); exit;
	foreach($stud_data as $t=>$sd)
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
		foreach($selected_list as $s)
		{
			if($s=='sem') {
			   if($sd['student_academic_term_name_id'] != 0)
				echo "<td>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td>";
			   else
				echo "<td><i>Not Set</i></td>";

			}
			else if($s=='student_address_c_line1')
			{	echo "<td>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2."</td>";
			}
			else if($s=='city')
			{
				$add = StudentAddress::model()->findByPk($sd['student_transaction_student_address_id']);
				if($add->student_address_c_city !=0)
				echo "<td>".City::model()->findByPk($add->student_address_c_city)->city_name."</td>";
				else
				echo "<td style='text-align:center;'><i>Not Set</i></td>";
			}
			else	
			{		echo "<td>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}

		}
		$i++;
		echo "</tr>";
		$m++;
	}
	
echo "</table>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
