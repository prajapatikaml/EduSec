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
	$quota=new Quota;
	$branch1=new Branch;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$cat=new Category;
	$city=new City;
	echo "</br>";
	foreach($stud_data as $t=>$sd)
	{
		echo "</br><h1>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->student_first_name."</h1>";
 
		echo "<table border=\"1\" >";
		$i = 1;
	
		foreach($selected_list as $s)
		{
			if($s=='quota_name')
			{
				echo "<tr><td>Quota</td>";
				echo "<td>".Quota::model()->findByPk($sd['student_transaction_quota_id'])->quota_name."</td></tr>";
				
			}
			else if($s=='branch_name')
			{
				echo "<tr><td>Branch</td>";
				echo "<td>".Branch::model()->findByPk($sd['student_transaction_branch_id'])->branch_name."</td></tr>";
			}
			else if($s=='division_code')
			{
				echo "<tr><td>Division Name</td>";
				echo "<td>".Division::model()->findByPk($sd['student_transaction_division_id'])->$s."</td></tr>";
			}
			else if($s=='batch_code')
			{
				echo "<tr><td>Batch Name</td>";
				if($sd['student_transaction_batch_id']==0)
					echo "<td style='text-align:center;'><i>Not Set</i></td></tr>";
				else
				echo "<td style='text-align:center;'>".Batch::model()->findByPk($sd['student_transaction_batch_id'])->$s."</td></tr>";
			}
			else if($s=='sem')
			{
				echo "<tr><td>Semester</td>";
				echo "<td>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td></tr>";
			}
			else if($s=='student_address_c_line1')
			{	
				echo "<tr><td>Current Address </td>";
				if($sd['student_transaction_student_address_id']!=0)
					echo "<td>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2."</td></tr>";
				else
					echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='student_address_p_line1')
			{	
				echo "<tr><td>Permanent Address </td>";
				if($sd['student_transaction_student_address_id']!=0)
				echo "<td>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line2."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
				
			}
			else if($s=='category_name')
			{
				echo "<tr><td>Category Name </td>";
				if($sd['student_transaction_category_id'])
				echo "<td>".Category::model()->findByPk($sd['student_transaction_category_id'])->category_name."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='city')
			{
				echo "<tr><td>City</td>";
				if($sd['student_transaction_student_address_id']!=0)
				{
					$add = StudentAddress::model()->findByPk($sd['student_transaction_student_address_id']);
					if($add->student_address_c_city != null)
					echo "<td>".City::model()->findByPk($add->student_address_c_city)->city_name."</td></tr>";			
					else
					echo "<td>&nbsp;</td></tr>";				
				}
				else
					echo "<td>&nbsp;</td></tr>";				
			}
			else	
			{	echo "<tr><td>".CHtml::activeLabel($student_info,$s)."</td>";
				echo "<td>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td></tr>";
			}

		}
		$i++;
			echo "</table>";
			echo "<h1>&nbsp;</h1>";
			echo "</br>";
	}
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
