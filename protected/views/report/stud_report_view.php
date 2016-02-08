<?php
$this->breadcrumbs=array('Report' => array(),
	'Student Info',
);
?>
<h1>Student Report</h1>
<div class="operation">
<?php
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_list;
echo CHtml::link('Back', array('report/StudInfoReport'),array('class'=>'btnback')); 
echo CHtml::link('Excel', array('report/SelectedList', 'studentlistexcelexport'=> 'studentlistexcel'), array('class'=>'btnblue')); 
?>
</div>
<?php
if($stud_data)
{
?>	

<?php	$student_info=new StudentInfo;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$city=new City;
	echo '<div class="portlet box blue" style="min-width: 100%;width:auto;">';
	echo '<i class="icon-reorder"></i>';
	echo '<div class="portlet-title">Student List</div>';

	echo "<table cellpadding='0' cellspacing='0' border='0' class='dynamic-report'>";
        echo "<thead>";
	echo "<tr><th style='text-align:center;'>No.</th>";
	
	foreach($selected_list as $s)
	{
		if($s=='sem')
			echo "<th style='text-align:center;'>Semester</th>";
		else if($s=='student_address_c_line1')
			echo "<th style='text-align:center;width: 400px;'>Current Address</th>";
		else if($s=='student_email_id_1')
			echo "<th style='text-align:center;width: 250px;'>Collge Email ID</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='student_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($student_info,$s)."</th>";	
	}
	echo "</tr></thead>";
	$i = 1;
	$m=1;

	foreach($stud_data as $t=>$sd)
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
		foreach($selected_list as $s)
		{
			if($s=='sem') {
				if(isset($sd['student_academic_term_name_id']))
				echo "<td style='text-align:center;'>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td>";
				else
				echo "<td style='text-align:center;'>N/A</td>";
			}
			else if($s=='student_address_c_line1')
			{	
				if($sd['student_transaction_student_address_id']!=0 && isset(StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1))
					echo "<td style='text-align:center;width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2."</td>";
				else
					echo "<td style='text-align:center;'>-</td>";
			}
			else if($s=='city')
			{
				if($sd['student_transaction_student_address_id']!=0)
				{
					$add = StudentAddress::model()->findByPk($sd['student_transaction_student_address_id']);
					if($add->student_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->student_address_c_city)->city_name."</td>";			
					else
					echo "<td style='text-align:center;'>-</td>";				
				}
				else
					echo "<td style='text-align:center;'>-</td>";				
			}
			else if($s=='student_email_id_1')
			{
			echo "<td style='text-align:center; width:250px;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}

			else if($s=='student_adm_date')
			{
			echo "<td style='text-align:center; width:107px;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}
			else if($s=='course_name')
			{
				echo "<td style='text-align:center;'>".CourseMaster::model()->findByPk($sd['student_transaction_course_id'])->course_name."</td>";
			}

			else	
			{
			    $res = StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s;
			    if(!empty($res))
			    echo "<td style='text-align:center;'>".$res."</td>";
			    else
			    echo "<td style='text-align:center;'>-</td>";
			}

		}
		$i++;
		echo "</tr>";
		$m++;
	}
	
echo "</table></div>";

}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
