<?php
$model = CourseMaster::model()->findAll(array(
    "order" => "course_master_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box blue" style="width: 50%; clear: left; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">New Publish Course
 </div>
<?php if(!empty($model)) { ?>
<table class="course-details">
<tr>
<th>Course Name</th>
<th>Course Level</th>
<th>Course Code</th>
<th>Course Cost</th>
</tr>
<?php
  foreach($model as $list) {
	echo '<tr>';
	echo '<td>'.$list['course_name'].'</td>';
	echo '<td>'.$list['course_level'].'</td>';
	echo '<td>'.$list['course_code'].'</td>';
	echo '<td>'.$list['course_cost'].'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">No course availabel</span>';
?>
</div>

<?php
$recStud = StudentTransaction::model()->findAll(array(
    "order" => "student_transaction_id DESC",
    "limit" => 3,
));
?>
<div class="portlet box green" style="width: 47%; margin-left: 25px; min-height: 232px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Latest Enrolled Student
 </div>
<?php if(!empty($recStud)) { ?>
<table class="course-details">
<tr>
<th style="width:140px;">Student Name</th>
<th style="width:140px;">Enroll in Course</th>
<th style="width:140px;">Joining Date</th>
</tr>
<?php
  foreach($recStud as $list) {
	$info = StudentInfo::model()->findByPk($list['student_transaction_student_id']);
	echo '<tr>';
	echo '<td>'.$info->student_first_name.'</td>';
	echo '<td>'.CourseMaster::model()->findByPk($list['student_transaction_course_id'])->course_name.'</td>';
	echo '<td>'.$info->student_adm_date.'</td>';
	echo '</tr>';
  }
?>
</table>
<?php }
else
echo '<span style="padding: 20px;">Student not Exist</span>';
?>
</div>

<?php 
$studCount = array();
$courses = Yii::app()->db->createCommand()
    ->select('count(*) as studCount, student_transaction_course_id, course_name ')
    ->from('student_transaction')
    ->join('course_master ','course_master_id=student_transaction_course_id')
    ->group('student_transaction_course_id')
    ->queryAll();
foreach($courses as $course)
 $studCount[] = array($course['course_name'], (int)$course['studCount']);

?>
<div class="portlet box green" style="width: 50%; margin-top: 20px; overflow: hidden;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Coursewise Students 
 </div>
<?php $this->Widget('application.extensions.highcharts.HighchartsWidget',
array(
'options'=>array( 
   'title'=>array('text'=>'Coursewise Student'),
   'colors'=> array('#F64A16', '#0ECDFD', '#FFF000'),
'credits' => array('enabled' => true),
'exporting' => array('enabled' => true),
'plotOptions'=> array(
	'pie'=> array(
		'allowPointSelect'=>true,'cursor'=>'pointer',
		'dataLabels'=>array('enabled'=>false),
		'showInLegend'=>true
         )	
),
'series' => array(
	array(
		'type'=>'pie',                                                             			'name'=>'Enrolled Students',
                'data' => $studCount,
	)
      )
  )
 )
);
?>
</div>
<?php 

$stud = Yii::app()->db->createCommand()
    ->select('count(*) as studCount ')
    ->from('student_transaction')
    ->queryRow();

$paidStud = Yii::app()->db->createCommand()
    ->select('count(distinct(student_paid_student_id)) as paidCount ')
    ->from('student_paid_fees_details')
    ->queryRow();
$unPaid  = $stud['studCount'] - $paidStud['paidCount'];
?>

<div class="portlet box blue" style="margin-top: 20px; overflow: hidden; width: 47%; margin-left: 25px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Student Fees History
 </div>
<?php 
$this->Widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
      'chart' => array('type'=>'column'),
       'colors'=> array('#C7E718', '#DB901B'), 	
      'title' => array('text' => 'Student Fees Details'),
 	'xAxis' => array(
    	'categories'=> array('Paid / Unpaid')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Paid Student Count')
      ),
      'series' => array(
         array('name' => 'Paid', 'data' => array((int)$paidStud['paidCount'])),
         array('name' => 'Unpaid', 'data' => array((int)$unPaid))
      )
   )
));
?>

</div>
