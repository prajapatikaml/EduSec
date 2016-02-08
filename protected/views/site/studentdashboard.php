<?php
$this->breadcrumbs=array(
	'Student',
);?>

<?php
$current_date = date('Y-m-d');
$criteria = new CDbCriteria;
	//$criteria->select = 'academic_term_id'; // select fields which you want in output
	$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');

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
<div class="box">
<div class="box-header">
<h1>Your Timetable</h1>
</div>
<div class="box-content">
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
<?php } ?>
<!-- End  timetable-->
<!-- Start Attendance Chart -->
<?php
	$StudentTransaction = StudentTransaction::model()->findByPk(Yii::app()->user->getState('stud_id'));
	$id=Yii::app()->user->getState('org_id');
		if(!empty($id))
		{	
		$id=Yii::app()->user->getState('org_id');	
			$Subject=Yii::app()->db->createCommand()
					    ->selectDistinct('sub_id')
					    ->from('attendence att')
					    ->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
					    ->where("ac.current_sem=1 AND ac.academic_term_organization_id=".$id.' and att.st_id='.Yii::app()->user->getState('stud_id'))
				    	    ->queryAll();
		foreach($Subject as $subid)	
		{
			$attendence = Yii::app()->db->createCommand()
		        	->select('count(attendence)')
				->from('attendence att')
				->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
				->where('ac.current_sem=1 AND att.attendence="P" and att.attendence_organization_id='.$id.' and att.sub_id='.$subid['sub_id'])
				->queryScalar();
			
			$all = Yii::app()->db->createCommand()
		        	->select('count(attendence)')
				->from('attendence att')
				->join('academic_term ac','ac.academic_term_id = att.sem_name_id')
				->where('ac.current_sem=1 AND att.attendence_organization_id='.$id.' and att.sub_id='.$subid['sub_id'])
				->queryScalar();	
		$yaxis[] = round($attendence*100/$all);

			}
		                            
			//print_r($all[0]['count(attendence)']);
		
			foreach($Subject as $xvalue)
			{ 
				foreach($xvalue as $x)
				$xaxis[] = SubjectMaster::model()->findByPk($x)->subject_master_alias;			
			}
			
	if(!empty($Subject)) {?>
<div class="box">
<div class="box-header">
<h1>Attendance Chart</h1>
</div>
<?php
	echo "<div id=\"container\" style=\"min-width: 00px; height: 230px; margin: 0 auto\"></div>";

for($i=0;$i<count($xaxis);$i++)
{
	$t=0;
	$n[$i][$t]=$xaxis[$i];
	$n[$i][$t+1]= $yaxis[$i];	
}

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
        'title'=> array(
			'text'=> 'Branch Wise Attendance'
		      ),
	
	 'xAxis' => array(
        		 'categories' => $xaxis	
     			 ),
	'yAxis'=> array(
			'min'=> 0,
			'max'=> 100,
			'title'=> array(
				'text'=> 'Attendence'
				       )				
			),
	'legend'=> array(
			'layout'=> 'vertical',
			'backgroundColor'=> '#FFFFFF',
			'align'=> 'left',
			'verticalAlign'=> 'top',
			'x'=> 100,
			'y'=> 70,
			'floating'=> true,
			'shadow'=> true
			),
	'tooltip'=>array(
		        'formatter'=>'js:function() { return "<b>"+ this.x +"</b>: "+ this.y +"%"; }'
		        ),
	'plotOptions'=> array (
			'column'=> array(
				'pointPadding'=> 0.2,
				'borderWidth'=> 0
			)
		),	
	'series' => array(
		   array('data'=>$n,'showInLegend'=>false),
		)	
 )));
}}?>
</div>

<!-- end Attendence Chart -->


<!-- Start GTU Notice --->
<?php 
$id=Yii::app()->user->getState('org_id');
	if(!empty($id))
	{
		$result=Gtunotice::model()->findAll(array("condition"=>"gtunotice_organization_id  =  $id","limit"=>4,'order'=>'ID desc'));
		if($result)
		{
?>
<div class="box">
<div class="box-header">
<h1>GTU Notice</h1>
</div>
<div class="box-content" style="min-height:210px;max-height:210px;">
	<?php 
		
			echo '<ul>';
			foreach($result as $data)
			echo '<li>'.CHtml::link($data->Description."..",$data->Link,array('target'=>'_blank')).'</li>';
			echo '</ul>';
	?>	
</div>
	<?php echo CHtml::link('View More...',array('gtunotice/admin'),array('style'=>'float:right;'));
	?>	
</div>
<?php
		}
	}
?>
<!-- Start Mailbox -->
<div class="box">
<div class="box-header">
<h1>MailBox</h1>
</div>
<div class="box-content">
	<?php 
		Yii::app()->runController('mailbox/message/myinbox');
	?>
</div>
</div>
<!-- End Mailbox -->

<!-- Start notifications ---->

<div class="box box-noticeboard">
<div class="box-header"> 
<h1>NoticeBoard</h1>
</div>
<div class="box-content">
	<div id="notifications" class="box-content" >
		<div class="notifiche" >
		   <?php echo $read;?>
		</div><!-- notiche div complete-->
	</div><!-- notification id div complete-->
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#notifications',
    'itemSelector' => 'div.notifiche',
    'loadingText' => 'Loading...',
    'donetext' => 'All notices are loaded.',
    'pages' => $pages,
)); ?>
</div>
</div>

<!-- End NoticeBoard--->
