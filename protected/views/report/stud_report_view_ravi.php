<style>
#scrollarea{
  position:fixed !important;

}


</style>

<title>Student List</title>
<?php
$this->breadcrumbs=array('Report',
	'Student Info',
	
);

?>

<?php
echo CHtml::link('GO BACK',Yii::app()->createUrl('report/StudInfoReport'),array('title'=>'GO BACK')); 

echo "&nbsp;";
$_SESSION['query']=$query;
$_SESSION['selected_list']=$selected_list;

$pdfimage = CHtml::image('../images/pdf.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($pdfimage,Yii::app()->createUrl('report/SelectedList',array('studentlistexport'=>'studentlistpdf')),array('title'=>'Export to PDF','target'=>'_blank')); 

echo "&nbsp;";
$excelimage = CHtml::image('../images/excel.png', 'No Image', array('height'=>'40','width'=>40));

echo CHtml::link($excelimage,Yii::app()->createUrl('report/SelectedList',array('studentlistexcelexport'=>'studentlistexcel')),array('title'=>'Export to Excel','target'=>'_blank')); 
?>
<br><br>

<?php
if($stud_data)
{
?>	
<div style= "float:left;max-height:700px;width:auto;max-width:1060px; overflow-x:scroll; overflow-y:scroll; ">	
<?php	$student_info=new StudentInfo;

	$quota=new Quota;
	$branch1=new Branch;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$cat=new Category;
	$city=new City;
	
	echo "<table align=left style=\"width:200px; font: 10pt Arial,Helvetica,sans-serif; \" class=\"table_data\" >";
	echo "<th colspan=\"12\" style=\"font-size: 18px; color: rgb(255, 255, 255);\">";
	echo "Student List";
        echo "</th>";
	echo "<tr class=\"table_header\" ><th>SI No.</th>";
	
	foreach($selected_list as $s)
	{
		if($s=='quota_name')
			echo "<th style='text-align:center;'>Quota</th>";
		else if($s=='branch_name')
			echo "<th style='text-align:center;'>Branch</th>";
		else if($s=='sem')
			echo "<th style='text-align:center;'>Semester</th>";
		else if($s=='student_address_c_line1')
			echo "<th style='text-align:center;'>Current Address</th>";
		else if($s=='student_address_p_line1')
			echo "<th style='text-align:center;'>Permenent Address</th>";
		else if($s=='category_name')
			echo "<th style='text-align:center;'>Category</th>";
		else if($s=='city')
			echo "<th style='text-align:center;'>City</th>";
		else if($s=='student_bloodgroup')
			echo "<th style='text-align:center;'>Blood Group</th>";
		else if($s=='division_code')
			echo "<th style='text-align:center;'>Division Name</th>";
		else
			echo "<th style='text-align:center;'>".CHtml::activeLabel($student_info,$s)."</th>";	
	}
	echo "</tr>";
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
			if($s=='quota_name')
				echo "<td style='text-align:center;'>".Quota::model()->findByPk($sd['student_transaction_quota_id'])->quota_name."</td>";
			else if($s=='branch_name')
				echo "<td style='text-align:center;'>".Branch::model()->findByPk($sd['student_transaction_branch_id'])->branch_name."</td>";
			else if($s=='division_code')
				echo "<td style='text-align:center;'>".Division::model()->findByPk($sd['student_transaction_division_id'])->$s."</td>";
			else if($s=='sem')
				echo "<td style='text-align:center;'>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td>";
			else if($s=='student_address_c_line1')
			{	
				if($sd['student_transaction_student_address_id']!=0)
					echo "<td style='text-align:center;min-width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2."</td>";
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='student_address_p_line1')
			{	
				if($sd['student_transaction_student_address_id']!=0)
				echo "<td style='text-align:center; min-width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line1." ".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line2."</td>";
				else
				echo "<td>&nbsp;</td>";
				
			}
			else if($s=='category_name')
			{
				if($sd['student_transaction_category_id'])
				echo "<td style='text-align:center;'>".Category::model()->findByPk($sd['student_transaction_category_id'])->category_name."</td>";
				else
				echo "<td>&nbsp;</td>";
			}
			else if($s=='city')
			{
				if($sd['student_transaction_student_address_id']!=0)
				{
					$add = StudentAddress::model()->findByPk($sd['student_transaction_student_address_id']);
					if($add->student_address_c_city != null)
					echo "<td style='text-align:center;'>".City::model()->findByPk($add->student_address_c_city)->city_name."</td>";			
					else
					echo "<td>&nbsp;</td>";				
				}
				else
					echo "<td>&nbsp;</td>";				
			}
			else	
			{		echo "<td style='text-align:center;'>".StudentInfo::model()->findByPk($sd['student_transaction_student_id'])->$s."</td>";
			}

		}
		$i++;
		echo "</tr>";
		$m++;
	}
	
echo "</table>";
echo "</div>";
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>
