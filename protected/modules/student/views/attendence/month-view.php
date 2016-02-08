 <?php
$this->breadcrumbs=array(
	'Monthwise Student Attendance Report',	
);
?>
<br />
<?php
$year = $_REQUEST['year'];
$month_value = $_REQUEST['month'];
$student_id = $_REQUEST['student_id'];
$subject_id = $_REQUEST['sub_id'];

$num = cal_days_in_month(CAL_GREGORIAN, $month_value, date('Y')); 

?>
<?php 
$stud_info = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['student_id']));

//echo CHtml::link('GO BACK',Yii::app()->createUrl('attendence/studentwise_report',array('en_no'=>$stud_info['student_enroll_no'],'month'=>$_REQUEST['month']))); 
?>
<br />

<table  border="2px" id="twoColThinTable">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $stud_info['student_first_name']." ".$stud_info['student_middle_name']." ".$stud_info['student_last_name'];?></td>
</tr>	

<tr class="row">	
	<td class="col1">Enrollment No. </td> 
	<td class="col2"><?php echo $stud_info['student_enroll_no'];?></td>
</tr>	
<tr class="row">
	<td class="col1">Roll No. </td> 
	<td class="col2"> <?php echo $stud_info['student_roll_no'];?></td>
</tr>	
<tr class="row">
	<td class="col1">Month </td> 
	<td class="col2"><?php echo strftime( '%B', mktime( 0, 0, 0, $_REQUEST['month'], 1 ) ).'-'.$_REQUEST['year'];?></td>
</tr>	
	
<tr class="row">
	<td class="col1">Subject Name </td> 
	<td class="col2"><?php echo SubjectMaster::model()->findByPk($_REQUEST['sub_id'])->subject_master_name;?></td>
</tr>	
<table><br>
<p class="hint">
	Notice: P=Present, A=Absent, Display multiple attendence records for same block if attendence is taken for more than one time in a same day for same subject.
</p>
<table class="table_data">
<th colspan="<?php echo $num+1; ?>" style="font-size: 18px; color: rgb(255, 255, 255);">
		Monthwise Report<br/>
<tr class="table_header">
<th>Day</th>
<?php 
	for($i = 1; $i<=$num; $i++) {
	print '<th>'.$i.'</th>';
	}
?>
</tr>
<tr class='odd'>
<th>Present/Absent</th>
<?php 

	for($i = 1; $i<=$num; $i++) {
	
	if(strlen($i) == 1)
		$i = "0".$i;
	$date = $i.'-'.$month_value.'-'.date('Y');
	$attend_date = date("Y-m-d", strtotime($date));
	$result1 = Attendence::model()->findAll(array('condition'=>'month(attendence_date)='.$month_value.' AND st_id='.$student_id.' AND sub_id='.$subject_id.' AND day(attendence_date)='.$i.' AND year(attendence_date)='.$year));
	//echo $i."</br>".count($result1)."</br>";
	if(count($result1) !=0)		
	{	
		print "<td>";
		$a = 1;
		foreach($result1 as $result){
		$myclass = $result->attendence == 'P' ? 'green' : 'red'; 
		if($a == count($result1))
		print "<b style=color:$myclass>".$result->attendence."</b>";
		else
		print "<b style=color:$myclass>".$result->attendence."</br></b>";
		$a+=1;
		}
		print "</td>";
	}
	else
		print '<td>-</td>'; 
	
	}
?>
</tr>
</tbody>
</table>


