<?php
if(isset($branch))
{		
 	$org = Organization::model()->findAll();
	$org_data=$org[0];
        $branch_model=Branch::model()->findByPk($branch);
	$yr=Year::model()->findByPk($year);
	echo '<table class="report-table" border="2" > ';
	echo "<thead>";
	echo "<tr align=center> <th  colspan = 15 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";	echo "<tr><th colspan=16><h3> Batch-".$yr->year." Branch  of ".$branch_model->branch_name."  All Students Fees Collection Report</h3></th> </tr>";
	
	echo "<tr align=center>"; 
	echo "<th > SI<br> No.</th>";
	echo "<th colspan=2> Enrollement<br> No. </th>";
	echo "<th colspan=2 > Student Full Name</th>";
	//print_r($startYear);exit;
	foreach($startYear as $y)
	{
		 echo '<th colspan=2 >'.AcademicTermPeriod::model()->findByPk($y)->academic_term_period.'</th>';	
	}		
	echo "<th colspan=2> Total<br> Paid<br> Fees </th>";
	$m=0;	
	foreach($student as $s)
	{
		$paidAmt=$paid_amt=$paid_amount=0;		 
		echo '<tr align=center>';
		echo '<td >';
			echo ++$m;
		echo '</td>';
		echo '<td colspan=2>';
		$stud_name=StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$s['student_transaction_id']));			
		if(!empty($stud_name->student_enroll_no))	
    			echo $stud_name->student_enroll_no;
		else
			echo 'Not Set';
		echo '</td>';
		echo '<td colspan=2 align=left>';
		echo $stud_name->student_first_name.' '.$stud_name->student_last_name.'<br> ( '.$stud_name->student_roll_no.' )';
		echo '</td>';	
			

	foreach($startYear as $y)
	{
	      $feesData = Yii::app()->db->createCommand()
                ->select('*')
                ->from('fees_payment_transaction')
                ->where('fees_student_id ='.$s['student_transaction_id'].' AND 	fees_academic_period_id='.$y)
	        ->queryAll();
	if(!empty($feesData))
	{		
	echo "<td  colspan=2>";
 	 foreach($feesData as $details) 
	 {
		$assignFees = Yii::app()->db->createCommand()
		       ->select('*, SUM(fees_details_amount) as total')
		       ->from('student_fees_master')
		       ->where('student_fees_master_student_transaction_id ='.$s['student_transaction_id'].' AND student_fees_master_sem_id = '.$details['fees_academic_term_id'])
			->queryAll();	
		$paid_amt = FeesPaymentCash::model()->findByPk($details['fees_payment_cash_cheque_id'])->fees_payment_cash_amount;
	$paid_amount = $paid_amt;
	
	$payType='';
	 if($details['fees_payment'] == 1)
		  $payType='Credit';	
         if($details['fees_payment'] == 2) 
		$payType='Outstanding';
	 if($details['fees_payment'] == 3)
		  $payType='Advance';
	if(!empty($assignFees[0]['student_fees_master_sem_id']))
	       echo 'Sem-'.AcademicTerm::model()->findByPk($assignFees[0]['student_fees_master_sem_id'])->academic_term_name.'  '.$paid_amount.' ('.$payType.')'."</br>";
	else
		echo '--'; 	       
	$paidAmt+=$paid_amount;
	}	
	echo "</td>";		
      }
      else
      {
	echo '<td colspan=2>--</td>';
      }
     }	 
  echo '<td colspan=2>'.$paidAmt.'</td>';	
}   // student loop

}   //branch loop

echo "</table>";
?>
