<?php
if(!empty($exp_stu_data))
{
$org = Organization::model()->findAll();
$org_data=$org[0];
?>
<table border="1px">
	 
	 <?php
	 echo "<tr align=center> 
		<th colspan=11 style=text-align:left;>".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big>".$org_data->organization_name ."</big>"." </th> <br>	 </tr>";
	 ?>
	  <tr>
	     <th>SI.NO.</th>
	     <th>Roll No.</th>
	     <th colspan=2>Name</th>
	     <!--th>AcademicYear</th-->
	     <th colspan=2 width="25%">Course</th>
	     <!--th>Semester</th-->
	     <th>Batch</th>
	     <th>Payable Amount</th>
	     <th>Paid Amount</th>
	     <th colspan=2>OutStanding Amount</th>
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
	  	 echo '<tr align="center">';
	         echo '<td>'.$i.'</td>';
	         echo '<td>'.$stu_details['student_roll_no'].'</td>';
	         echo '<td colspan=2>'.$stu_details['student_first_name']." ".$stu_details['student_middle_name']." ".$stu_details['student_last_name'].'</td>';
		// echo '<td>'.AcademicTermPeriod::model()->findByPk($stu_details['academic_term_period_id'])->academic_term_period.'</td>';
		 echo '<td colspan=2>'.Course::model()->findByPk($stu_details['course_id'])->course_name.'</td>';
		//$academic_term = AcademicTerm::model()->findByPk($stu_details['academic_term_id']);
		//echo '<td>'.(!empty($academic_term) ? $academic_term->academic_term_name : 'Not Set'). '</td>';
		$branch_name = Batch::model()->findByPk($stu_details['student_transaction_batch_id']);
		echo '<td>'.(!empty($branch_name) ? $branch_name->batch_name : 'Not Set').'</td>';

	         echo '<td>'.$batch_fees.'</td>';
		 $paidfees_tmp = Yii::app()->db->createCommand()
			    ->select('sum(fees_payment_amount) as paidfees')
			    ->from('fees_payment_transaction')
			    ->where('fees_payment_student_id = '.$stu_details['student_transaction_id'].' AND fees_payment_batch_id='.$stu_details['student_transaction_batch_id'].' AND fees_student_course_id='.$stu_details['course_id'])
			    ->queryRow();
		$paidfees = array_filter($paidfees_tmp);
		if(!empty($paidfees))
			$stu_paidfees = $paidfees['paidfees'];
		else
			$stu_paidfees = 0;
		
	         echo '<td>'.$stu_paidfees.'</td>';
		 $out_fees=$batch_fees-$stu_paidfees;
	         echo '<td colspan=2>'.$out_fees.'</td>';
		 echo '</tr>';
		 $total_paid+= $stu_paidfees;
		 $total_out+=$out_fees;
		$i++;
	       }
    echo '<tr>
		<th colspan=7 align="right">Total Amount</th>
	  	<th>'.$totalcollection.'</th>
		<th>'.$total_paid.'</th>
		<th colspan=2>'.$total_out.'</th>
	  </tr>';		
     echo '</table>';
}
else
{
	echo "No Data Available";
}

?>
