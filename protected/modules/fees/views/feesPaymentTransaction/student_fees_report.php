<style>
.grid-view .summary {
    display: none;
    margin: 0 0 5px;
    text-align: right;
}
.grid-view {
    padding: 2px;
}
</style>
<title>Student Wise Full Ledger</title>
<?php
$this->breadcrumbs=array(
	'Student Wise Full Ledger',	
);
?>
<div class="portlet box blue" >
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Fees Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-fees-report',
	'enableAjaxValidation'=>true,
	
)); ?>
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no-student-found'); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Roll No.','');?>
		<?php echo CHtml::textField('roll_no', null);?><span class="status">&nbsp;</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit','tabindex'=>3));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<?php
	if(!empty($info_model))
	{
		if(empty($model))
		{
			echo "<div class='block-error'>";
			echo "No fees record available for this student.";
			echo "</div>";
		}
		else
		{
			$batch=Batch::model()->findByPk($info_model[0]['student_transaction_batch_id']);
			$student_name=StudentInfo::model()->findByPk($info_model[0]['student_transaction_student_id']);
			$course=Course::model()->findByPk($batch->course_id);
			$full_name = $student_name->student_first_name." ".$student_name->student_middle_name." ".$student_name->student_last_name;
			?>
			<?php //echo "<div style='float:right;' class='total-amount'><h4>Total Paid Fees : <b>".$model::paidAmount() .'</b></h4></div>';
			?>
			<div class="portlet box gray" style="margin-top:20px;width:50%">
			<i class="icon-reorder"></i>
			<div class="portlet-title"><span class="box-title">Student Details</span>
			</div>
			<table  border="2px" class="report-table" width="100%">
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
				<td class="col2"><?php echo $course->course_fees;?></td>
			</tr>		
			</table>
			</div>

		<div class="portlet box yellow" style="margin-top:20px;width:100%">
		<i class="icon-reorder"></i>
		<div class="portlet-title"><span class="box-title">Student Fees Details</span>
	    	<div class="operation">
		  <?php echo CHtml::link('Excel', array('StudentFeesReport','excel'=>'excel','roll_no'=>$student_name->student_roll_no), array('class'=>'btnblue'));?>
		</div>
		</div>

		<table class="report-table" style="float:left;width:100%;border:2px">
	  <tr class="table_header">
	     <th>SI.NO.</th>
	     <th>Date</th>
	    <!-- <th>Payable Amount</th> -->
	     <th>Payment Method</th>
	     <th>Paid Amount</th>
	     <th>Cheque/DD Number</th>
	     <th>Bank</th>
	     <th>Receipt Number</th>
	     <th>OutStanding Amount</th>
	  </tr>
<?php    
		$i=1;
		$out=$course->course_fees;
		foreach($model as $details)
		{
	  	 echo '<tr align="center">';
	       echo '<td>'.$i.'</td>';
	       echo '<td>'.date_format(new DateTime($details['fees_payment_received_date']),'d-m-Y').'</td>';
	       echo '<td>'.$details['fees_payment_type'].'</td>';
	       echo '<td>'.$details['fees_payment_amount'].'</td>';
	       echo '<td>'.$details['fees_payment_cheque_number'].'</td>';
		$b= BankMaster::model()->findByPk($details['fees_payment_cheque_bank']);
	       echo '<td>'.$b['bank_full_name'].'</td>';
	       echo '<td>'.$details['fees_payment_receipt_no'].'</td>';
	       echo '<td>'.$out-=$details['fees_payment_amount'].'</td>';
		echo '</tr>';
		$i++;
	       }
     echo '</table>';
}
}
?>
</div>
