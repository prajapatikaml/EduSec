<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/timetable.css" />	
<style>
#content{
    width: 95%;
}
</style>
<script>
$(function() {

  $("#datepicker").datepicker({ dateFormat: "dd-mm-yy", onSelect: function(date) {
	//alert(date);
        window.location = "<?php echo Yii::app()->request->baseUrl;?>"+"/parents/parent/studentpersonaltimetable?student_id="+"<?php echo $_REQUEST['student_id']; ?>"+"&date="+date;
     }, }).val();
});
</script>
<?php 
$this->layout='//layouts/personal-profile';
  $this->breadcrumbs=array(
	'Student Timetable',
);
  if(isset($_REQUEST['date']))
    $date = $_REQUEST['date'];
  else
    $date = date('d-m-Y');
  
  if($_REQUEST['student_id']) {
     ?><div class="form">
     <div class="row" style="margin-bottom:10px;">
     <?php
     echo CHtml::link('GO BACK','studentprofile?id='.$_REQUEST['student_id']); 
     echo "&nbsp;".CHtml::link('Current Week','studenttimetable?student_id='.$_REQUEST['student_id'],array('style'=>'margin-left:20px;')); ?>
	</div>
	<div class="row">
	<label style="width:80px !important;">Select Date: </label><input type="text" id="datepicker" value="<?php echo $date; ?>"/>
	</div>
    </div>
	<?php

  } 
?>


<?php

		if($_REQUEST['student_id']) {

	$inf = StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$_REQUEST['student_id']));
        echo "<b>Name : ".$inf->student_first_name." ".$inf->student_last_name."</b>";

		$criteria = new CDbCriteria;
		//$criteria->select = 'academic_term_id'; // select fields which you want in output
		$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

		$semname = AcademicTerm::model()->findAll($criteria);

		$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
		$stud_model=StudentTransaction::model()->findByPk($_REQUEST['student_id']);
		$check_sem = in_array($stud_model->student_academic_term_name_id, $data);
		$timetableid=0;

		if(!$check_sem)
		{
	
			echo "<h3 align=center style=color:red>Sorry, No timetable available.</h3>";
		}
		else
		{
		   $sub_array = array();
		   $check_timetable=TimeTableDetail::model()->findAll(
			array('condition'=>'acdm_name_id='.$stud_model->student_academic_term_name_id.' and division_id='.$stud_model->student_transaction_division_id.' and lecture_date="'.date('Y-m-d',strtotime($date)).'" and proxy_status <> 1 order by lec'));
			
			if(empty($check_timetable)) {
				echo "<h3 align=center style=color:red>Sorry, No timetable available.</h3>";
			}
			else {
			$timetable = TimeTable::model()->findByPk($check_timetable[0]->timetable_id);

		  	$time1 = date('H:i A',strtotime($timetable['clg_start_time']));
		   	//echo $timetable->zero_lec; exit;
		   	if($timetable->zero_lec==1)
		   		$time[] = $time1;
		   	else
		   		$time[1] = $time1;
		   
			$lec_dur =  LecDuration::model()->findAll(array('condition'=>'timetable_id='.$timetable['timetable_id']));
			 
			   foreach($lec_dur as $list)
			   {
				$break = NoOfBreakTable::model()->findByAttributes(array('after_lec_break'=>$list['lecture'],'timetable_id'=>$timetable['timetable_id']));
				if($break)
				{
					$dur1=date('i',strtotime($break['duration']));
					$timestamp = strtotime($time1) + 60*$dur1;
					$time1 = date('g:i A', $timestamp);   
	
					$timestamp = strtotime($time1) + 60*$list['duration'];
					$time1 = date('g:i A', $timestamp);    	
					$time [] = $time1 ; 		
				}
				else
				{
					$timestamp = strtotime($time1) + 60*$list['duration'];
					$time1 = date('g:i A', $timestamp);    	
					$time [] = $time1 ;
				}
			   }

			   print '<table class="gradienttable" style="font-size:15px; margin-top:20px; float:left;">';
			   print '<tr>';
			   print '<th>Lecture No.</th>';
			   print '<th>Time</th>';
			   print '<th>Subject</th>';
			   print '<th>Faculty Name</th>';
			   print '<th>Batch</th>';
			   print '<th>Room Name</th>';
			   
			   $f= 0;
	    		   $rows=1;
			   foreach($check_timetable as $list) {
			   
			   if($list->subject_type != 1 && $list->batch_id !=$stud_model->student_transaction_batch_id)
			   {
				continue;
			   }
			   print '<tr>';

			   print '<td>'.$list->lec.'</td>';	
			   if($list->batch_id != 0 && $f==0){
			   $batch = Batch::model()->findByPk($list->batch_id)->batch_code;
			   $batchid=$list->batch_id;
			   $rows = 2;			
			   $f =1;
			   }
			   else 
			   {
				if($list->batch_id != 0 && $f==1)
				{
					$f=0;
					continue;
				}
				else
				   $rows=1;
					
			   }
			   $sub_array[] = $list->subject_id;
			   print '<td rowspan='.$rows.'>'.$time[$list->lec].'</td>';
			   print '<td rowspan='.$rows.'>'.SubjectMaster::model()->findByPk($list->subject_id)->subject_master_name.'</td>';	
			   print '<td rowspan='.$rows.'>'.EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name.'</td>';	
			   if($list->batch_id != 0)
			   print '<td rowspan='.$rows.'>'.Batch::model()->findByPk($list->batch_id)->batch_code.'</td>';
			   else
			   print '<td rowspan='.$rows.'>-</td>';
			   print '<td rowspan='.$rows.'>'.RoomDetailsMaster::model()->findByPk($list->room_id)->room_name.'</td></tr>';	
			   			
			
	          	   }
		print '</table>';

		$sy_date = date('Y-m-d',strtotime($date));
		$substr = implode(',',$sub_array);
		$syll = SubjectSyllabus::model()->findAll(array('condition'=>'sub_id in ('.$substr.') and start_date<="'.$sy_date.'" and end_date >="'.$sy_date.'"'));
		print '<div>&nbsp;</div>';
		print '<table class="gradienttable" id="time-table-struc" style="font-size:15px;margin-top:50px;">';
		   print '<tr>';
		   print '<tr><td colspan=4 style="background:white"><b>Topics to be taught on '.$date.'</b></td></tr>';
		   print '<th>SI No.</th>';
		   print '<th>Subject Name</th>';
		   print '<th>Topic</th>';
		   print '<th>Description</th></tr>';
		$t = 0;   
		foreach($syll as $listdata)
		{
			echo "<tr>";
			echo "<td>".++$t."</td>";
			echo "<td>".SubjectMaster::model()->findByPk($listdata['sub_id'])->subject_master_name."</td>";
			echo "<td>".$listdata['topic_name']."</td>";
			echo "<td>".$listdata['topic_description']."</td>";			
			echo "</tr>";
		}
		echo "</table>";
		}

		
	    }

	}
	else
	{
		echo CHtml::link('GO BACK',Yii::app()->createUrl('/site/newdashboard')); 
		echo "<h3 align=center style=color:red>Sorry, No Student Login.</h3>";
	}
?>

