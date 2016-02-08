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

$m=0;
$month_value = $month;

$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 


 $branch_model=Branch::model()->findByPk($branch);
 $acd_model = AcademicTerm::model()->findByPk($sem);
 $org = Organization::model()->findAll();
 $org_data=$org[0];

	$acd = Yii::app()->db->createCommand()
		->select('*')
		->from('academic_term')
		->where('current_sem=1 ')
		->queryAll();
	$acdterm=CHtml::listData($acd,'academic_term_id','academic_term_name');
	
	$period=array();
$pe_data = AcademicTermPeriod::model()->findByPk($acd[0]['academic_term_period_id']);

	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<tr><th colspan=16><h3> Branch  of ".$branch_model->branch_name." Semester-".$acd_model->academic_term_name."  All Students Month-".date("F", mktime(0,0,0,$month))." All Subjectwise Attendence Report</h3></th> </tr>";
	
	echo "<tr><th colspan=2><b> Academic Year : </b></th> <th colspan = 9 align=left><b> ".$pe_data->academic_term_period."</b></th></tr>";
		
echo "<tr align=center>"; 
	echo " <th  rowspan=2 ><br> <big>SI No.</big></th>";
	echo "<th rowspan=2><br><big>Enroll<br> No.</big></th>";
	echo " <th rowspan=2 colspan=3 align=center><br><br><big>Student Name</big></th>";
	$totalT=array();
	$totalP=array();	
	$tot=0;
	$totp=0;
	$tot_t=0;
	$tot_p=0;
	$present=array();
		foreach($subjectid as $sub)
		{
			echo "<th colspan=2 >";
			$sub_name = SubjectMaster::model()->findByAttributes(array('subject_master_id'=>$sub));
			echo $sub_name->subject_master_name."<br>(".SubjectType::model()->findByPk($sub_name->subject_master_type_id)->subject_type_name.")";
			echo "</th>";
			$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year,'select'=>'attendence_date,student_attendence_period_id','distinct'=>'true'));
		
			$totalT[$sub]=count($all_attendance);
		}
		foreach($subjectidp as $sub)//this loop is for practical sub
		{
			echo "<th colspan=2>";
			$sub_name = SubjectMaster::model()->findByAttributes(array('subject_master_id'=>$sub));
			echo $sub_name->subject_master_name."<br>(".SubjectType::model()->findByPk($sub_name->subject_master_type_id)->subject_type_name.")";
			echo "</th>";
				
	$all_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year,'select'=>'attendence_date,student_attendence_period_id','distinct'=>'true'));
				$totalP[$sub]=count($all_attendance);
			
		}
		
		//below loop is for find grand total of theory subjects.in heading
		foreach($totalT as $t){
			$tot_t=$tot_t+$t;
		}		
		echo "<th rowspan=2> Total Theory <br> Subjects <br> <br>Out <br>Of ".'<br> ( '.$tot_t.')'."</th> ";
		echo "<th rowspan=2> Total Theory <br>Subjects <br><br><br><big> %</big> </th>";
		//below loop is for find grand total of practical subjects.in heading
		foreach($totalP as $t){
			$tot_p=$tot_p+$t;
		}		
		echo "<th rowspan=2> Total Practical <br> Subjects <br> <br>Out <br>Of ".'<br> ( '.$tot_p.')'."</th> ";
		echo "<th rowspan=2> Total Practical<br> Subjects <br> <br><br><big> %</big></th>";
	
		echo "</tr><tr>";
		//below loop is for find total of individual theory subjects.in heading
		foreach($totalT as $t){
			echo "<th colspan=1> Out <br>Of ".'<br> ( '.$t.')'."</th><th > <big> %</big> </th>";	
		}
		//below loop is for find total of individual practical subjects.in heading
		foreach($totalP as $t){
			echo "<th colspan=1> Out <br>Of ".'<br> ( '.$t.')'."</th><th> <big> %</big> </th>";	
		}		
		echo "</tr>";
				
	foreach($sid as $s)
	{		
		echo '<tr align=center>';
		echo '<td>';
			echo ++$m;
		echo '</td>';
 $stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$s));
		echo '<td>';
		if(!empty($stud_name->student_enroll_no))	
    			echo $stud_name->student_enroll_no;
		else
			echo 'Not Set';
		echo '</td>'; 
		echo '<td colspan=3 align=left>';
		
		   echo $stud_name->student_first_name.' '.$stud_name->student_last_name.' ( '.$stud_name->student_roll_no.' )';
			echo '</td>';
		//echo '<td>';

		foreach($subjectid as $sub)
		{
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year.' AND attendence = "P" AND st_id='.$s));
		
			$present=count($present_attendance);
			$percentage=0;
			if($totalT[$sub]!=0)
				$percentage=($present*100)/$totalT[$sub];
		
			echo "<td > $present </td>";
			echo "<td>";
			echo round($percentage,2).'%';
			echo "</td>";
			$tot=$tot+$present;			
			$tot_percentage=0;
			if($tot!=0)
				$tot_percentage=($tot*100)/$tot_t;
			//echo '</td>';
		}
		foreach($subjectidp as $sub)
		{			
			$present_attendance = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND branch_id='.$branch.' AND sub_id='.$sub.' AND year(attendence_date)='.$year.' AND attendence = "P" AND st_id='.$s));
		
			$present=count($present_attendance);			
			$percentage=0;
			if($totalP[$sub]!=0)
				$percentage=($present*100)/$totalP[$sub];
		
			echo "<td > $present </td>";
			echo "<td>";
			echo round($percentage,2).'%';
			echo "</td>";

			$totp=$totp+$present;
			$totp_percentage=0;
			if($totp!=0)
				$totp_percentage=($totp*100)/$tot_p;
			
		}
		echo "<td> $tot </td>";		
		$tot=0;
		echo "<td>" .round($tot_percentage,2) ."</td>";
		
		echo "<td> $totp </td>";		
		$totp=0;
		echo "<td>" .round($totp_percentage,2) ."</td>";
		echo '</tr>';	
	
	}	
	
	echo "</thead>";
	echo "</table>";



}
?>
