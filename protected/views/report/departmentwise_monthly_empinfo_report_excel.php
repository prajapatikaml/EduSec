<?php	
	$months = array();
	$year=date('Y');
	for( $i = 1; $i <= 12; $i++ ) 
	{
	    $months[ $i ] = strftime( '%B', mktime( 0, 0, 0, $i, 1 ) );
	}
?>
<?php
$year = date('Y');
if(isset($month))
{
$month_value = $month;

$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
$colspan=$num+9;
$col=$num+6;
if($employee_data )
{
	$emp_info=new EmployeeInfo;
	$org = Organization::model()->findAll();
	$org_data=$org[0];
	$dept=Department::model()->findbyPk($employee_data[0]['employee_transaction_department_id'])->department_name;
	$type=EmployeeInfo::model()->findbyPk($employee_data[0]['employee_id'])->employee_type;
	
	$m=0;
	
	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";

    	echo "<tr><th colspan=2 ><b> Month </b> </th> <th align=left colspan=".$colspan."> <b>".date("F", mktime(0,0,0,$month))."</b></th></tr>";	

	echo "<tr><th ><br><br>SI No.</th>";

	echo "<th colspan=2><br><br> Employee Name </th>";

	for($i = 1; $i<=$num; $i++) {
		   print '<th style=width:10px;>'.$i.'</th>';
		}
	echo "<th> Total <br>No.of<br> Days </th>";
	echo "<th> Total <br>No.of <br>Days<br> Present </th>";
	echo "<th> Total <br>CL <br>Taken </th>";
	echo "<th> Total <br>DL<br> Taken </th>";
	echo "<th> Total <br>SL <br>Taken </th>";
	echo "<th> Total <br>LWP<br> Taken </th>";
	
	
	echo "</tr>";
	foreach($employee_data as $emp)
	{
	      echo '<tr>';
		   echo '<td align=center>';
		   echo ++$m;
		   echo '</td>';	 
		
		echo "<td colspan=2>";
			   echo $emp['title'].$emp['employee_first_name'].' '.$emp['employee_last_name'];
		echo "</td>";
			
		for($j = 1; $j<=$num; $j++)
		{
			if(strlen($j) == 1)
			$j = "0".$j;
			$date = $j.'-'.$month_value.'-'.date('Y');
			$attend_date = date("Y-m-d", strtotime($date));	
			$emp_no=0;$a = 1;
			$result1 = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND day(date)='.$j.' AND year(date)='.$year));			
			if(count($result1) !=0)		
			{	
				print "<td align=center>";
				foreach($result1 as $result)
				{
				$myclass = $result->attendence == 'P' ? 'green' : 'red'; 
					if($a == count($result1))
						print "<b >"."<font color=".$myclass.">".$result->attendence."</font>"."</b>";
					else
					print "<b >"."<font color=".$myclass.">".$result->attendence."</font>"."</b>";
				$a+=1;				
				}
				print "</td>";				
			}
			else
			{
				print '<td align=center> -- </td>'; 
			}
		$emp_no++;	
		}	
		
		$all_attendance = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year));

		$present_attendance = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "P"'));

		$present_cl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "CL"'));
		$present_dl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "DL"'));
		$present_sl = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "SL"'));
		$present_lwp = Employee_attendence::model()->findAll(array('condition'=>'month(date)='.$month_value.' AND employee_id='.$emp['employee_id'].' AND year(date)='.$year.' AND attendence = "LWP"'));
		
		$cl=count($present_cl);
		$dl=count($present_dl);
		$sl=count($present_sl);
		$lwp=count($present_lwp);
		$present=count($present_attendance);
		$total=count($all_attendance);

		$percentage=0;
		if($total!=0)
		   $percentage = ($present*100)/$total;

		print "<td align=center>"; echo $total; print "</td>";
		print "<td align=center>"; echo $present; print "</td>";
		print "<td align=center>"; echo $cl;	print "</td>";
		print "<td align=center>"; echo $dl;	print "</td>";
		print "<td align=center>"; echo $sl;	print "</td>";
		print "<td align=center>"; echo $lwp; print "</td>";
		
		echo "</tr>";
	}
	echo "</table>";

}

}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>

