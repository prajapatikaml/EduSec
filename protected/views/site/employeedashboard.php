<?php
$this->breadcrumbs=array(
	'Employee',
);?>


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
<h1>Attendance Chart</h1>
</div>
<div class="box-content">

<?php
	echo "<div id=\"container\" style=\"min-width: 00px; height: 230px; margin: 0 auto\"></div>";

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
));
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


