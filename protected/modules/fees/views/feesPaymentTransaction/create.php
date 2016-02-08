<?php
$this->breadcrumbs=array(
	'Fees Payment Transactions'=>array('addfees'),
	'Create',
);
$stud_trans = StudentTransaction::model()->findByPk($_REQUEST['id']);
$batch=Batch::model()->findByPk($stud_trans->student_transaction_batch_id);
$student_name=StudentInfo::model()->findByPk($stud_trans->student_transaction_student_id);
$course=Course::model()->findByPk($batch->course_id);
$full_name = $student_name->student_first_name." ".$student_name->student_middle_name." ".$student_name->student_last_name;
?>
<div class="portlet box blue" style="margin-bottom:20px;">
<?php echo "<div style='float: right; padding-right: 10px; line-height: 5px; height: 20px;' class='total-amount'><h4>Total Paid Fees : <b>".$model::paidAmount() .'</b></h4></div>';
?>
<div class="portlet-title"><i class="fa fa-list-alt"></i><span class="box-title">Student Details</span>
</div>
<table  border="2px" class="report-table" width=100%>
<tr class="row">
	<td class="col1">Name </td>
	<td class="col2"><?php echo $full_name;?></td>
</tr>
<tr class="row">
	<td class="col1">Course </td>
	<td class="col2"><?php echo $course->course_name;?></td>
</tr>
<tr class="row">
	<td class="col1">Batch </td>
	<td class="col2"><?php echo $batch->batch_name;?></td>
</tr>		
<tr class="row">
	<td class="col1">Total Fees </td>
	<td class="col2"><?php echo $batch->batch_fees;?></td>
</tr>		
</table>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
