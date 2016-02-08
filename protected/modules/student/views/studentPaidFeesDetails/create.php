<?php
$this->breadcrumbs=array(
	'Student Paid Fees Details'=>array('index'),
	'Create',
);
?>

<div class="operation" style="float: left; width: 100%;">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback', 'style'=>'margin-left: 0px;'));?>
</div>

<div class="portlet box green" style="width: 50%;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Course Details
 </div>
<?php
	echo '<table class="detail-view custom-view" style="width: 99%;">';
	echo '<tr class="odd"><th>Course Code</th><td>'.$cDetails->course_code.'</td></tr>';
	echo '<tr class="even"><th>Course Name</th><td>'.$cDetails->course_name.'</td></tr>';
	echo '<tr class="odd"><th>Cost</th><td>'.$cDetails->concated.'</td></tr>';
	echo '</table>';

?>
</div>
<div class="portlet box green" style="width: 40%; margin-left: 20px;">
<i class="icon-reorder"></i>
 <div class="portlet-title">Paid Fees Details
 </div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-paid-fees-details-grid',
	'dataProvider'=>$model->studPaidFees(),
	'summaryText'=>'',
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		 'name'=>'student_paid_amount',
		 'value'=>'$data->concated',
		),
		'student_paid_date',
	),
	'htmlOptions'=> array('style'=>'float: left; width: 98%;'),
)); ?>
</div>

<div style="clear: left; float:left; margin-top:30px;">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
