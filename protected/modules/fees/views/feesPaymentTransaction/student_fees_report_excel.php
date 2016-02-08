<?php
if(!empty($_REQUEST['roll_no']))
		{						
			$info_model= Yii::app()->db->createCommand()
					->select('*')
					->from('student_transaction stud')
					->join('student_info stud_info', 'stud_info.student_id = stud.student_transaction_student_id')
					->where('stud_info.student_roll_no="'.$_REQUEST['roll_no'].'"')
					->queryAll();

			$model=FeesPaymentTransaction::model()->findAll('fees_payment_student_id='.$info_model[0]['student_transaction_id']);
	}
	if(!empty($info_model))
	{
		if(empty($model))
		{
			echo "<div>";
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
			<table  border="2px">
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
		<table border=2px>
	  <tr>
	     <th>SI.NO.</th>
	     <th>Date</th>
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

