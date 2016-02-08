<?php
$this->breadcrumbs=array(
	'Paid Fees Student List'=>array('takeFees'),
	'Manage',
);
?>

<h1> Paid Fees Student List</h1>
<div class="portlet box blue">
 <div class="portlet-title">Student List
 </div>
<?php echo CHtml::link('Take Fees', array('/student/studentPaidFeesDetails/takeFees'), array('class'=>'btn green'))?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-paid-fees-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'selectionChanged'=>"function(id){
		window.location='" . Yii::app()->urlManager->createUrl('/student/studentPaidFeesDetails/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);
	}",
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		  'header'=>'Student Name',
		  'name'=>'student_first_name',
		  'value'=>'$data->relStudent->student_first_name',
		),
		array(
		  'header'=>'Course',
		  'name'=>'student_paid_course_id',
		  'value'=>'$data->relCourse->course_name',
		  'filter'=>CHtml::listData(CourseMaster::model()->findAll(), 'course_master_id', 'course_name'),
		),
		array(
		   'name'=>'student_paid_amount',
		   'value'=>'$data->concated',
		),
		'student_paid_date',
	),
)); ?>
</div>
