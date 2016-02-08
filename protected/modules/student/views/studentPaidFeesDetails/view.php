<?php
$this->breadcrumbs=array(
	'Student Paid Fees Details'=>array('index'),
	'View',
);

?>

<h1>View Paid Fees Details</h1>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
<?php echo CHtml::link('Edit', array('update' ,'id'=>$model->student_paid_fees_id), array('class'=>'btnupdate'));?>
<?php echo CHtml::link('Delete', array('delete' ,'id'=>$model->student_paid_fees_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));?>
</div>


<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">View Details
 </div>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		  'name'=>'student_paid_student_id',
		  'value'=>StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$model->student_paid_student_id))->student_first_name,
		),

		array(
		  'name'=>'student_paid_course_id',
		  'value'=>$model->relCourse->course_name,
		),
		array(
		   'name'=>'student_paid_amount',
		   'value'=>$model->concated,
		),
		'student_paid_date',
	),
	'htmlOptions'=> array('class'=>'custom-view'),	
)); ?>
</div>
