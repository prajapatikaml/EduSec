<?php 
if(isset($yr)&& isset($month))
{
$leave=array();
$month_value = $month;
$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 
$colspan=$num+9;

 $leave=Yii::app()->db->createCommand()
                    ->select('leave_master_category,leave_master_id')
                    ->from('leave_master lm')
                    ->queryAll();
if($employee)
{
	$m=0;

$org = Organization::model()->findAll();
	$org_data=$org[0];
	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<tr><th colspan=15 ><big> Employee Leave Report For Month- ".date("F", mktime(0,0,0,$month)).'-'.$yr."</big></th></tr>";	
	echo "<tr><th  > <b>SI No.</b></th>";
	echo "<th colspan=3> <b> Employee Name </b></th>";
	foreach($leave as $lv)
 	{		
		echo "<th>".$lv['leave_master_category']."</th>";
	}	
	echo "</tr></thead>";
	foreach($employee as $emp)
	{
	   echo '<tr align=center>';
	   echo '<td>';
	   echo ++$m;
	   echo '</td>';
	   echo "<td colspan=3 align=left>";

	echo $emp['title'].''.$emp['employee_first_name'].' '.$emp['employee_last_name'].' ( '.$emp['employee_name_alias'].' )';
	   echo "</td>";
	$org = Yii::app()->user->getState('org_id');
	foreach($leave as $lv)
	{
	$count=0;
	$totalLeave=EmployeeLeaveApplication::model()->findAll(array('condition'=>
	'(month(employee_leave_application_leave_start_date)='.$month_value.' OR month(employee_leave_application_leave_end_date)='.$month_value.') AND (year(employee_leave_application_leave_start_date)='.$yr.' OR year(employee_leave_application_leave_end_date)='.$yr.') AND employee_leave_application_employee_code='.$emp['employee_id'].' AND employee_leave_application_leave_code='.$lv['leave_master_id'].' AND employee_leave_application_status_2=2'
	 ));
	 foreach($totalLeave as $leave_app)
	 {
	       $startdate_month=date_format(new DateTime($leave_app->employee_leave_application_leave_start_date), 'm');
	       $enddate_month=date_format(new DateTime($leave_app->employee_leave_application_leave_end_date), 'm');
		if($startdate_month==$enddate_month)
			$count+=$leave_app->employee_leave_application_days;
		else
                {
		    $month_days=cal_days_in_month(CAL_GREGORIAN,$month_value, $yr);
                    $start_date=date_format(new DateTime($leave_app->employee_leave_application_leave_start_date), 'd');
		    $count+=$month_days-$start_date;		    	 			
		}			
	 } 		
		echo"<td>". $count."</td>";
	}	
	   echo "</tr>";
   	}
	echo "</table>";
  }
}
else
{
	print  "<h1 style=\"color:red;text-align:center\">No Record To Display</h1>";
} ?>








