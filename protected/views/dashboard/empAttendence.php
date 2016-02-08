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
