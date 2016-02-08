<style>
	table{
		
		border:1.8px solid #74b9f0;
		font-size:16.77;
		
	}
</style>
<?php
if(!empty($exp_stu_data))
{
?>
<table>
	  <tr>
	     <th width="10px">SI. NO.</th>
	     <th width="55px">Roll No.</th>
	     <th width="25%">Name</th>
	     <!--th>Academic Year</th-->
	     <th>Course</th>
	     <!--th width="25px">Semester</th-->
	     <th>Batch</th>
	     <th>Payable Amount</th>
	     <th>Paid Amount</th>
	     <th>OutStanding Amount</th>
	  </tr>
<?php    
		$course=Course::model()->findByPk($_REQUEST['exp_course_id']);
		$batch=Batch::model()->findByPk($_REQUEST['exp_batch_id']);
		$i=1;
		//$batch_fees=$batch->batch_fees;
		//$totalcollection=count($exp_stu_data)*$batch_fees;
		$total_paid=$batch_fees=0;
		$total_out=$totalcollection=0;
		foreach($exp_stu_data as $stu_details)
		{
		$batch=Batch::model()->findByPk($stu_details['student_transaction_batch_id']);
		 $batch_fees=$batch->batch_fees;
		 $totalcollection+=$batch_fees;
		?>
	  	<tr>
	        <td><?php echo $i; ?></td>
	        <td><?php echo $stu_details['student_roll_no']; ?></td>
	        <td style="word-wrap:break-word;">
			<?php echo $stu_details['student_first_name']." ".$stu_details['student_middle_name']." ".$stu_details['student_last_name']; ?>
		</td>
		<!--td>
			<?php //echo AcademicTermPeriod::model()->findByPk($stu_details['academic_term_period_id'])->academic_term_period; ?>
		</td-->
		<td>
			<?php echo Course::model()->findByPk($stu_details['course_id'])->course_name; ?>
		</td>
		<?php
			//$academic_term = AcademicTerm::model()->findByPk($stu_details['academic_term_id']);
			//echo '<td>'.(!empty($academic_term) ? $academic_term->academic_term_name : 'Not Set'). '</td>';
			$branch_name = Batch::model()->findByPk($stu_details['student_transaction_batch_id']);
			echo '<td>'.(!empty($branch_name) ? $branch_name->batch_name : 'Not Set').'</td>';
		?>
	       <td>
			<?php echo $batch_fees; ?>
	      </td>
		<?php $paidfees_tmp = Yii::app()->db->createCommand()
			    ->select('sum(fees_payment_amount) as paidfees')
			    ->from('fees_payment_transaction')
			    ->where('fees_payment_student_id = '.$stu_details['student_transaction_id'].' AND fees_payment_batch_id='.$stu_details['student_transaction_batch_id'].' AND fees_student_course_id='.$stu_details['course_id'])
			    ->queryRow();
		$paidfees = array_filter($paidfees_tmp);
		if(!empty($paidfees))
			$stu_paidfees = $paidfees['paidfees'];
		else
			$stu_paidfees = 0;
		?>
	        <td><?php echo $stu_paidfees; ?></td>
		<?php $out_fees=$batch_fees-$stu_paidfees; ?>
	        <td><?php echo $out_fees; ?></td>
		 </tr>
		<?php
		 $total_paid+= $stu_paidfees;
		 $total_out+=$out_fees;
		$i++;
	       } ?>
    <tr style="font-size:18px;">
		<th colspan=5 align="right">Total Amount &nbsp;&nbsp;</th>
	  	<th><?php echo $totalcollection; ?></th>
		<th><?php echo $total_paid; ?></th>
		<th><?php echo $total_out; ?></th>
	  </tr>		
     </table>
<?php
}
else
{
	echo "No Data Available";
}
?>
