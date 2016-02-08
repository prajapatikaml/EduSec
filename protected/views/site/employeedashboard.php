<?php
$this->breadcrumbs=array(
	'Employee',
);?>
<!-- For Employee  Birthday by Abhishek --> 
<div class="box birthday">
<div class="box-header">
<h1>Today's Birth Day</h1>
</div>
<?php 
$birthdays=EmployeeTransaction::Loadbirthdays();
echo $birthdays;
?>
</div>
<!-- Employee birthday Complete-->
<?php
$current_date = date('Y-m-d');
$criteria = new CDbCriteria;
//$criteria->select = 'academic_term_id';
$criteria->condition = 'current_sem = 1 AND academic_term_organization_id = '.Yii::app()->user->getState('org_id');
$data_arr = 0;
$semname = AcademicTerm::model()->findAll($criteria);
if($semname){
$data = CHtml::listData($semname,'academic_term_id','academic_term_id');
$data_arr = implode(',',$data);
}
$timetable_criteria = new CDbCriteria;
$timetable_criteria->condition = 'acdm_name_id in ('.$data_arr.') AND faculty_emp_id = '.Yii::app()->user->getState('emp_id').' AND lecture_date = "'.date('Y-m-d').'" order by lec';
$time_table_details = TimeTableDetail::model()->findAll($timetable_criteria);

if($time_table_details) {
?>
<div class="box">

<div class="box-header">
<h1>Your Timetable</h1>
</div>
<div class="box-content">
	<?php
		$timetable = TimeTable::model()->findByPk($time_table_details[0]->timetable_id);

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
		   print '<th>Branch</th>';
		   print '<th>Sem</th>';
		   print '<th>Division</th>';
		   print '<th>Subject</th>';
		   print '<th>Room No.</th>';
		   print '<th>Time</th>';
		   foreach($time_table_details as $list) {
		   print '<tr>';
		   print '<td>'.$list->lec.'</td>';	
		   print '<td>'.Branch::model()->findByPk($list->branch_id)->branch_name.'</td>';	
		   print '<td>'.AcademicTerm::model()->findByPk($list->acdm_name_id)->academic_term_name.'</td>';	
		   print '<td>'.Division::model()->findByPk($list->division_id)->division_code.'</td>';	
		   print '<td>'.SubjectMaster::model()->findByPk($list->subject_id)->subject_master_alias.'</td>';
		   print '<td>'.RoomDetailsMaster::model()->findByPk($list->room_id)->room_name.'</td>';	
		   print '<td>'.$time[$list->lec].'</td></tr>';			
		
          	   }
		print '</table>';
?>
</div>
</div>
<?php
}
?>
<!-- End  timetable-->
<!-- Start Attendance Chart -->
<?php
	$id=Yii::app()->user->getState('org_id');
		if(!empty($id))
		{	
			$allattendence = Yii::app()->db->createCommand()
		        	->select('MONTHNAME(date) as month,count(attendence) as cnt')
				->group('month')
				->from('employee_attendence att')
				->where('employee_id='.Yii::app()->user->getState('emp_id').' and att.employee_attendence_organization_id='.$id.' and date BETWEEN DATE_SUB(now(), INTERVAL 5 MONTH) AND now()')
				->order('date')
				->queryAll();
			$absentattendence = Yii::app()->db->createCommand()
		        	->selectDistinct('MONTHNAME(date) as month, count(attendence) as cnt')
				->group('month')
				->from('employee_attendence att')
				->where('employee_id='.Yii::app()->user->getState('emp_id').' and att.attendence<>"LWP" and att.employee_attendence_organization_id='.$id.' and date BETWEEN DATE_SUB(now(), INTERVAL 5 MONTH) AND now()')
				->order('date')
				->queryAll();
			$i=0;
			foreach($absentattendence as $att)
			{
				$xaxis[] = $att['month'];
				$yaxis[] = round($att['cnt']*100/$allattendence[$i]['cnt']);
				//$atte[$i][]= $att['month'];
				$atte[$i]=round($att['cnt']*100/$allattendence[$i]['cnt']);
				$i++;
			}

			
	if(!empty($absentattendence)) {
?>
<div class="box">
<div class="box-header">
<h1>Current Month Attendance Chart</h1>
</div>
<div class="box-content">

<?php
	echo "<div id=\"container\" style=\"min-width: 00px; height: 253px; margin: 0 auto\"></div>";
/*
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
      'title' => array('text' => 'Attendance'),
      'xAxis' => array(
         'categories' => $xaxis,
	  'labels'=>array(
                    'rotation'=> -45,
                    'align'=> 'right',
                    'style'=>array(
                        'fontSize'=> '13px',
                    ),
                ),
      ),
     'colors' => array('#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4'),
     'plotOptions' => array('column'=>array('colorByPoint'=>true)),
      'yAxis' => array(
	 'min'=> 0,
	 'max'=> 100,
         'title' => array('text' => 'Attendance')
      ),
      'series' => array(
         array('data' => $atte,'showInLegend'=>false),
     

      ),
	'exporting'=> array( 'enabled' => false)
   )
));*/

		$all = Employee_attendence::model()->findAll('month(date)='.date('m').' and year(date)='.date('Y').' and employee_id='.Yii::app()->user->getState('emp_id'));
		$abs = Employee_attendence::model()->findAll('month(date)='.date('m').' and year(date)='.date('Y').' and employee_id='.Yii::app()->user->getState('emp_id').' and attendence="LWP"');
		$wo = Employee_attendence::model()->findAll('month(date)='.date('m').' and year(date)='.date('Y').' and employee_id='.Yii::app()->user->getState('emp_id').' and attendence="WO"');
		$ph = Employee_attendence::model()->findAll('month(date)='.date('m').' and year(date)='.date('Y').' and employee_id='.Yii::app()->user->getState('emp_id').' and attendence="PH"');

		$p = count($all) - count($abs) - count($wo) - count($ph);
		$array = array();

		$array[0] = array("Absent", count($abs));
		$array[1] = array("Week Off", count($wo));
		$array[2] = array("Present", $p);
		$array[3] = array("Public Holidays", count($ph));

$this->Widget('application.extensions.highcharts.HighchartsWidget',
array(
'options'=>array( 
	'chart'=> array(
		    'renderTo'=>'container',
		    'type'=> 'column'            
                       ),
   'title'=>array('text'=>''),
   'colors'=> array('#F64A16', '#800080', '#35AA47'),
'credits' => array('enabled' => true),
'exporting' => array('enabled' => true),
 'tooltip'=>array(
                'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ Math.round(this.percentage,2) +" %"; }'
                     ),
'plotOptions'=> array(
	'pie'=> array(
		'allowPointSelect'=>true,'cursor'=>'pointer',
		//'dataLabels'=>array('enabled'=>false),
		'showInLegend'=>true,
		 'dataLabels'=>array(
                    'enabled'=> false,
                    'color'=>'#000000',
                    'connectorColor'=>'#000000',
                    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+Math.round(this.percentage,2) +" %"; }'  
 
                                   ) 
         )	
),
'series' => array(
	array(
		'type'=>'pie',
		'name'=>'User Distrubution',
        'data' => $array,
		)
      )
	 
  )
  
 )
);



/*

$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart'=> array(
            'renderTo'=>'container',
            'plotBackgroundColor'=>'#D5DEE5',
            'plotBorderWidth'=> null,
            'plotShadow'=> false
        ),
      'title' => array('text' => ''),
        'tooltip'=>array(
                'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %"; }'
                     ),
        'plotOptions'=>array(
            'pie'=>array(
                'allowPointSelect'=> true,
                'cursor'=>'pointer',
                'dataLabels'=>array(
                    'enabled'=> false,
                    'color'=>'#000000',
                    'connectorColor'=>'#000000',
                    'formatter'=>'js:function() { return "<b>"+ this.point.name +"</b>:"+this.percentage +" %"; }'  
 
                                   )
                        )
                 ),
 
      'series' => array(
         array('type'=>'pie','name' => 'Browser share', 'data' => array(array('Present Student',round($present,1)),array(
                    'name'=>'Absent Student',
                    'y'=>round($absent,1),
                    'sliced'=>true,
                    'selected'=>false
                    ))),
 
      ),
	'exporting'=> array('enabled' => false)
 
   )
));



*/

?>
</div>
</div>
<?php
}
}
?>
<!-- End Attendance Chart -->

<!-- Start GTU Notice -->
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
	echo '</ul>';?>
</div>
	<?php	echo CHtml::link('View More...',array('gtunotice/admin'),array('style'=>'float:right;'));
?>

</div>
<?php
}
	}
?>
<!-- End GTU Notice -->
<!-- Start Mailbox -->
<div class="box">
<div class="box-header">
<h1>MailBox</h1>
</div>
	<?php 
		Yii::app()->runController('mailbox/message/myinbox');
	?>
</div>
<!-- end Mailbox -->


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



