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
	$org = Organization::model()->findAll();
	$org_data=$org[0];
?>

<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Student Report</span>
    	<div class="operation">
	  <?php echo CHtml::link('Back', array('documentsearch'), array('class'=>'btnback'));?>	
	</div>
    </div>
	<div class="portlet-body" >
<?php	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";

	$student_info=new StudentInfo;
	$sem=new AcademicTerm;
	$add=new StudentAddress;
	$city=new City;
	
	
	echo "</br>";
	
	echo "<tr align=center><th align=center>Sr No.</th>";
	foreach($selected_list as $s)
	{
		
		if($s=='sem')
			echo "<th>Semester</th>";
		else if($s=='student_address_c_line1')
			echo "<th>Current Address</th>";
		else if($s=='student_address_p_line1')
			echo "<th>Permenent Address</th>";
		else if($s=='category_name')
			echo "<th>Category</th>";
		else if($s=='city')
			echo "<th>City</th>";
		else if($s=='student_bloodgroup')
			echo "<th>Blood Group</th>";
		//else if($s=='division_code')
			//echo "<th>Division Name</th>";
		else if($s=='batch_name')
			echo "<th>Batch </th>";
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
		echo "<tr align=center>";
		echo "<td align=center>".$i."</td>";
		foreach($selected_list as $s)
		{
			
			if($s=='batch_name'){
				if($sd['student_transaction_batch_id']==0)
					echo "<td style='text-align:center;'><i>Not Set</i></td>";
				else
				echo "<td style='text-align:center;'>".Batch::model()->findByPk($sd['student_transaction_batch_id'])->$s."</td>";
			}
			//else if($s=='sem')
			//	echo "<td>".AcademicTerm::model()->findByPk($sd['student_academic_term_name_id'])->academic_term_name."</td>";
			else if($s=='student_address_c_line1')
			{	
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
					echo "<td style='text-align:center;width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line1."<br>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_c_line2."<br>".$add_c."<br>".$add_s."<br>".$add_co."</td>";
					
				}
				else
					echo "<td style='text-align:center;'>&nbsp;</td>";
			}
			else if($s=='student_address_p_line1')
			{	
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
				echo "<td style='text-align:center; width:400px;'>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line1."<br>".StudentAddress::model()->findByPk($sd['student_transaction_student_address_id'])->student_address_p_line2."<br>".$add_c."<br>".$add_s."<br>".$add_co."</td>";
				}
				else  {
				echo "<td>&nbsp;</td>";
				  }
				
			}
			else if($s=='category_name')
			{
				if($sd['student_transaction_category_id']!=0)
				echo "<td>".Category::model()->findByPk($sd['student_transaction_category_id'])->category_name."</td>";
				else
				echo "<td style='text-align:center;'><i>Not Set</i></td>";
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
</div>
