<?php
$this->breadcrumbs=array(
	'Dashboard',
);?>

<?php 

$isStudent = Yii::app()->user->getState('stud_id');

$msgOfDay = MessageOfDay::model()->findAll(array('condition'=>'message_of_day_active = 1',
    "order" => "ID DESC",
    "limit" => 3,
));
?>

<div class="wob wob-in-top-threshold wob-0-degrees read-only" style="width: 43%; min-height: 117px;">

<div class="widget">
<div class="widget-header">
  <i class="header-icon"></i>
  <div class="title">Message of the day</div>
</div>
<div class="msg-content">

<?php 
  if(!empty($msgOfDay))
    echo $msgOfDay[0]['message']; 
  else
    echo '<span style="color: red; text-decoration: blink;">No message of the day available !!</span>';
?>
  </div>
 </div>
</div>

<div class="widget" style="float: left; font-weight: 600; font-size: 15px; margin-right: 10px; text-align: center; padding: 15px; width: 23%;margin-top: 11px; margin-left: 10px;">
 <?php echo date('l d F Y'); ?>
</div>

<?php 

  $startDate = date('Y').'-'.date('m').'-'.'01';
  $fromDate =  Date("Y-m-d", strtotime($startDate." -2 Month"));
  $toDate = date('Y-m-d');
  $attData = Yii::app()->db->createCommand()
    ->select('employee_id, date, attendence')
    ->from('employee_attendence eat')
    ->where('eat.employee_id=:eid AND eat.date between :startDate AND :toDate', array('eid'=> Yii::app()->user->getState('emp_id'), ':startDate'=>$fromDate, 'toDate'=> $toDate))
    ->queryAll();
   $p1 = $woph1  = $lwp1 = $p2 = $woph2 = $lwp2 = $p3 = $woph3 = $lwp3 = 0; 
   
   $time1  = strtotime($fromDate);
   $time2  = strtotime($toDate);
   $my     = date('mY', $time2);

   $months = array(date('m', $time1));

   while($time1 < $time2) {
      $time1 = strtotime(date('Y-m-d', $time1).' +1 month');
      if(date('mY', $time1) != $my && ($time1 < $time2))
         $months[] = date('m', $time1);
   }

   $months[] = date('m', $time2);

    $i = 0;
    foreach($attData as $cValue ) {
	
	if(date('m', strtotime($cValue['date'])) == $months[$i]) {
	if($cValue['attendence'] == 'LWP')
	  $lwp1++;
	else if($cValue['attendence'] == 'P')
	  $p1++;
	else
	  $woph1++;
	}
	else if(date('m', strtotime($cValue['date'])) == $months[$i + 1]) {
	if($cValue['attendence'] == 'LWP')
	  $lwp2++;
	else if($cValue['attendence'] == 'P')
	  $p2++;
	else
	  $woph2++;
	}
	else {
	if($cValue['attendence'] == 'LWP')
	  $lwp3++;
	else if($cValue['attendence'] == 'P')
	  $p3++;
	else
	  $woph3++;
	}
    }
$months = array(date('F', strtotime('-2 month')), date('F', strtotime('-1 month')),  date('F'));
?>

<?php
$this->Widget('application.extensions.highcharts.HighchartsWidget',
array(
'options'=>array( 
	'chart'=> array(
	    'renderTo'=>'container',
	    'type'=> 'column',
	    'height'=> 300,
            'width'=> 525,  
         ),
   'title'=>array('text'=>'Attendance Chart'), 
   'subtitle'=>array('text'=>'Last 3 months average value'),
   'xAxis'=>array('categories'=>$months),
   'yAxis'=>array('min'=>0, 'title'=>array('text'=>'No of days') ),
   'plotOptions'=>array('column'=>array('pointPadding'=> 0.2,'borderWidth'=>0)),
   'series'=> array(
		array('name'=>'Present', 'data'=>array($p1, $p2, $p3)),
		array('name'=>'Holiday / Week off', 'data'=>array($woph1, $woph2, $woph3)),
		array('name'=>'Absent', 'data'=>array($lwp1, $lwp2, $lwp3)),
	    ),
   'exporting'=> array('enabled'=> false),
  )
 )
);
?>

<div class="clock" style="float: right; width: 25%;">
     <ul id="clock">	
	<li id="sec"></li>
	<li id="hour"></li>
	<li id="min"></li>
     </ul>
</div>

<?php
   if(isset($isStudent))
   {  //echo $this->renderPartial('std2DayTT');
   } 
   else
     echo $this->renderPartial('empNotification');
?>

<div class="wob wob-in-top-threshold wob-0-degrees read-only" style="float: left; height: 320px; margin-top: 0px; width: 25%; z-index: 1; padding-top: 0px;">
<div class="widget" style="min-height: 303px;">
<div class="widget-header">
  <i class="header-icon"></i>
  <div class="title">Today's Birth Day</div>
</div>
  <ul>
<?php
  $dobList = Yii::app()->db->createCommand()
    ->select('ef.employee_first_name, ef.employee_last_name, d.department_name, ed.employee_designation_name')
    ->from('employee_transaction et')
    ->join('employee_info ef', 'ef.employee_id=et.employee_transaction_id')
    ->join('department d', 'd.department_id=et.employee_transaction_department_id')
    ->join('employee_designation ed', 'ed.employee_designation_id  = et.employee_transaction_designation_id')
    ->where('DATE_FORMAT(ef.employee_dob, "%m-%d")=:dob AND et.employee_status = 0', array(':dob'=>date('m-d')))
   ->queryAll();


	
	foreach($dobList as $emp) {
		echo '<li>'.$emp['employee_first_name']." ".$emp['employee_last_name'].'    ';
		echo $emp['department_name'].'    ';
		echo $emp['employee_designation_name'].'</li>';
	}
?>
  </ul>
</div>
</div>

<?php 
if(!isset($isStudent))
  echo "<div id=\"container\" style=\"float: left; margin-left: 10px;\"></div>"; ?>

