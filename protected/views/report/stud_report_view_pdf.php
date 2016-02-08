<style>
	th{text-align:left;font-weight:normal;color:#990a10;width:110px;border:0.4px solid #74b9f0;height:24px;}
	.title{color:seagreen;}
	td{border:0.4px solid #74b9f0;height:24px;}
	.label{text-align:left;font-weight:normal;color:#990a10;width:110px;height:24px;}	
</style>
<?php 

if($stud_data)
{

	echo "</br></br><h1>Students List</h1>";	
	$student_info=new StudentInfo;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$city=new City;
	echo "</br>";
	foreach($stud_data as $t=>$sd)
	{
		echo "</br><h1>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->student_first_name."</h1>";
 
		//echo "<table border=\"1\" >";
		echo "<table>";
		$i = 1;
	
		foreach($selected_list as $s)
		{
			
			if($s=='batch_name')
			{
			
				echo "<tr><td class=\"label\">Batch Name</td>";
				if($sd['student_transaction_batch_id']==0)
					echo "<td style='text-align:center;'><i>Not Set</i></td></tr>";
				else
				echo "<td style='text-align:center;'>".Batch::model()->findByPk($sd['student_transaction_batch_id'])->$s."</td></tr>";
			}
			/*else if($s=='sem')
			{
				echo "<tr><td class=\"label\">Semester</td>";
				echo "<td>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td></tr>";
			} */
			else if($s=='student_address_c_line1')
			{	
				echo "<tr><td class=\"label\">Local Address </td>";
				if($sd['student_transaction_student_address_id']!=0)
				{
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_city))
					{
						$add_c = "<br/>".City::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_state))
					{
						$add_s = State::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_country))
					{
						$add_co = Country::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_country)->name;	
					}
					else
					{
						$add_co = '';
					}					
					echo "<td style='text-align:center;width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td></tr>";
			}
			else if($s=='student_address_p_line1')
			{	
				echo "<tr><td class=\"label\">International Address </td>";
				if($sd['student_transaction_student_address_id']!=0)
				{
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_city))
					{
						$add_c = "<br/>".City::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_city)->city_name.", ";	
					}
					else
					{
						$add_c = '';
					}
					
					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_state))
					{
						$add_s = State::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_state)->state_name.", ";	
					}
					else
					{
						$add_s = '';
					}

					if(!empty(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_country))
					{
						$add_co = Country::model()->findByPk(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_country)->name;	
					}
					else
					{
						$add_co = '';
					}
				echo "<td style='text-align:center; width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line2." ".$add_c." ".$add_s." ".$add_co."</td></tr>";
				}
				else  {
				echo "<td>&nbsp;</td></tr>";
				  }
				
			}
			else if($s=='category_name')
			{
				echo "<tr><td class=\"label\">Category Name </td>";
				if($sd['student_transaction_category_id'])
				echo "<td>".Category::model()->findByPk($sd['student_transaction_category_id'])->category_name."</td></tr>";
				else
				echo "<td>&nbsp;</td></tr>";
			}
			else if($s=='city')
			{
				echo "<tr><td class=\"label\">City</td>";
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
			{	echo "<tr><td class=\"label\">".CHtml::activeLabel($student_info,$s)."</td>";
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
