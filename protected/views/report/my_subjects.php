<?php
$this->breadcrumbs=array(
	'Subject List',	
);
?>
<div class="operation">
<?php echo CHtml::link('Back', array('student/studentTransaction/update', 'id'=>$_REQUEST['id']), array('class'=>'btnback'))?>
</div>
<?php
$stud_trans = StudentTransaction::model()->findByPk($_REQUEST['id']);
$batch=Batch::model()->findByPk($stud_trans->student_transaction_batch_id);
$student_name=StudentInfo::model()->findByPk($stud_trans->student_transaction_student_id);
$course=Course::model()->findByPk($batch->course_id);
$full_name = $student_name->student_first_name." ".$student_name->student_middle_name." ".$student_name->student_last_name;
?>

<div class="portlet box yellow" style="width:50%">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Student Details</span>
</div>
<table  border="2px" class="report-table" style="width:100%">
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $full_name;?></td>	
</tr>
<tr class="row">
	<td class="col1">Roll No. </td>
	<td class="col2"><?php echo $student_name->student_roll_no ;?></td>
</tr>		
<tr class="row">
	<td class="col1">Course </td>
	<td class="col2"><?php echo $course->course_name;?></td>
</tr>
<tr class="row">
	<td class="col1">Batch </td>
	<td class="col2"><?php echo $batch->batch_name;?></td>
</tr>		
</table>
</div>


<div class="portlet box gray" style="margin-top:20px;clear:left;width:50%">
<i class="icon-reorder"></i>
 <div class="portlet-title"> <span class="box-title">Subjects</span>
</div>

	<table class="report-table" style="width:100%">
	<tr class="table_header">
	<th>SI No.</th>
	<th>Subject Name</th>
	<th>Subject Type</th>
	</tr>
<?php 
	$m = 0;
	foreach($sub_model as $list) { 

		if(($m%2) == 0)
		   $class = "odd";
		else
		   $class = "even";
					
		echo '<tr class='.$class.'>'; ?>
		   <td>
			<?php echo ++$m;?>
		   </td>
		   <td>
			<?php echo $list['subject_master_name']; ?>
		   </td>
		   <td>
			<?php echo SubjectType::model()->findByPk($list['subject_master_type_id'])->subject_type_name; ?>
		   </td> 
		</tr>	
		
   <?php } ?>
</table>
</div>
