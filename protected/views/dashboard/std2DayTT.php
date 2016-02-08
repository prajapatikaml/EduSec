<?php
 Yii::app()->clientScript->registerCss('selectCompany','
th, td {
  font-size: 15px;
}

table {
  border-collapse: collapse;
}
tr {
  border: 1px solid #CDD5DA;
}

tr td:nth-child(n+1) {
   border-top: 1px solid #CDD5DA;
}

table {
  float: left;
  padding-top: 68px;
  width: 100%;
}
th {
    padding: 10px;
}
td {
  height: 39px;
  padding: 9px;
}
'); 

$current_date = date('Y-m-d');
$criteria = new CDbCriteria;
	$criteria->condition = 'current_sem = 1';

	$semname = AcademicTerm::model()->findAll($criteria);

	$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
	$stud_model=StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
	$check_sem = in_array($stud_model->student_academic_term_name_id, $data);
	$timetableid=0;
        $check_timetable=TimeTableDetail::model()->findAllByAttributes(
	array(
	     'acdm_name_id' => $stud_model->student_academic_term_name_id,
	     'division_id' => $stud_model->student_transaction_division_id,
	     'lecture_date'=>$current_date,
   ),'proxy_status <> :status', array(':status'=>1));

if($check_timetable) {?>
<div class="wob wob-in-top-threshold wob-0-degrees read-only" style="height: 444px; width: 525px; z-index: 1;">
<div class="timeline textstream widget news-stream google-news vertical">
<div class="widget-header">
  <i class="header-icon"></i>
  <div class="title">Time Table</div>
</div>
<div class="timeline-items-wrapper">
<?php
			
			$timetable = TimeTable::model()->findByPk($check_timetable[0]->timetable_id);

		  	$time1 = date('H:i A',strtotime($timetable['clg_start_time']));
		   
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

			   print '<table id="time-table-struc" style="font-size:10px;">';
			   print '<tr>';
			   print '<th>Lecture No.</th>';
			   print '<th>Subject</th>';
			   print '<th>Faculty Name</th>';
			   print '<th>Room No.</th>';
			   print '<th>Time</th>';
			   foreach($check_timetable as $list) {
			   if($list->subject_type != 1 && $list->batch_id !=$stud_model->student_transaction_batch_id)
			   {
				continue;
			   }

			   print '<tr>';
			   print '<td>'.$list->lec.'</td>';	
			   print '<td>'.SubjectMaster::model()->findByPk($list->subject_id)->subject_master_alias.'</td>';	
			   print '<td>'.EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$list->faculty_emp_id))->employee_first_name.'</td>';	

			   print '<td>'.RoomDetailsMaster::model()->findByPk($list->room_id)->room_name.'</td>';	
			   print '<td>'.$time[$list->lec].'</td></tr>';			
			
	          	   }
		print '</table>';?>
</div>
</div>
</div>
<?php } ?>
