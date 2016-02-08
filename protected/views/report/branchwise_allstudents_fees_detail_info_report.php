
<?php

$this->breadcrumbs=array('Report',
	'Branchwise All Students Fees Detail',
	);
$model=new FeesPaymentTransaction;
$yearModel = new Year;


$this->menu[]=array('label'=>'', 'url'=>array('BranchwiseAllStudentsFeesDetailInfoReport','excel'=>'excel','Year[year]'=>$year, 'FeesPaymentTransaction[fees_student_branch_id]'=>$branch),'linkOptions'=>array('class'=>'export-excel','title'=>'Export to Excel','target'=>'_blank'));

?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Select Criterias</span>
</div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	'enableAjaxValidation'=>true,
)); ?>
<?php	$org_id=Yii::app()->user->getState('org_id');	?>
	<div class="row">        
		 <?php echo $form->labelEx($yearModel,'year'); ?>
	         <?php echo $form->dropDownList($yearModel,'year',Year::items(),
			array(
			'prompt' => 'Select Year','options' =>array($year=>array('selected'=>true)),
			'ajax' => array(
			'type'=>'POST'))); 	?>
		<?php echo $form->error($yearModel,'year'); ?>		
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'Branch'); ?>
		<?php echo $form->dropDownList($model,'fees_student_branch_id', CHtml::listData(Branch::model()->findAll(),'branch_id','branch_name'), array(
			'empty' => 'Select Branch','options' =>array($branch=>array('selected'=>true)),
			'ajax' => array(
			'type'=>'POST'))); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_student_branch_id'); ?>		
	 </div>

<div class="row buttons">
	<?php echo CHtml::submitButton('Submit', array('class'=>'submit', 'onclick'=>"$('#loading').show();")); ?>
</div>
<div id="loading" style="display:none;"><img src="http://localhost/edusec/edusec/images/loading.gif" alt="" /></div>
<?php $this->endWidget(); ?>
</div>
</div>

<?php
if(isset($branch) )
{
	?>
<div class="portlet box yellow" style="width:100%;margin-top:20px;">
    <i class="icon-reorder"></i>
    <div class="portlet-title"><span class="box-title">Batchwise Student History Report</span>
    	<div class="operation">
	 
	  <?php echo CHtml::link('Excel', array('BranchwiseAllStudentsFeesDetailInfoReport','excel'=>'excel','Year[year]'=>$year, 'FeesPaymentTransaction[fees_student_branch_id]'=>$branch), array('class'=>'btnblue'));?>	
	</div>
    </div>
<div class="portlet-body" >
<?php
	$org = Organization::model()->findAll();
	$org_data=$org[0];
        $branch_model=Branch::model()->findByPk($branch);
	$yr=Year::model()->findByPk($year);
?>	
	
	<?php	echo '<table class="report-table" border=2 > ';
	
	echo "<tr align=center> <th  colspan = 60 style=text-align:left;> ".CHtml::image(Yii::app()->controller->createUrl('/site/loadImage', array('id'=>$org_data->organization_id)),'No Image',array('width'=>80,'height'=>55,'style'=>'float:left;margin-left:200px;')) ."
	 <big> <b>".$org_data->organization_name ."</big><br>". $org_data->address_line1." ".$org_data->address_line2."</br>"  . City::model()->findBypk($org_data->city)->city_name.", ".State::model()->findBypk($org_data->state)->state_name.", ".Country::model()->findBypk($org_data->country)->name."." ." </th> <br>	 </tr>";
	echo "<tr><th colspan=60><h3> Batch-".$yr->year." Branch  of ".$branch_model->branch_name."  All Students Fees Collection Report</h3></th> </tr>";
	
	echo "<tr class='table_header'>"; 
	echo "<th > SI<br> No.</th>";
	echo "<th> Enrollement<br> No. </th>";
	echo "<th colspan=2 > Student Full Name</th>";
	
	foreach($startYear as $y)
	{
		 echo '<th >'.AcademicTermPeriod::model()->findByPk($y)->academic_term_period.'</th>';	
	}
	
	echo "<th colspan=2> Total Paid Fees </th>";
	
	$m=0;	
	foreach($student as $s)
	{
		$paidAmt=$paid_amt=$paid_amount=0;
		 if(($m%2) == 0)
		 {
			  $class = "odd";
		 }
		 else
		 {
		        $class = "even";
		 }	
		echo '<tr class='.$class.'>';
		echo '<td >';
			echo ++$m;
		echo '</td>';
		echo '<td>';
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
		 echo "<td >";
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
		{
			if($paid_amount==0)
			{
				$myclass = $paid_amount == 0 ? 'red' : 'black';
				echo "<b style=color:$myclass>".'Sem-'.AcademicTerm::model()->findByPk($assignFees[0]['student_fees_master_sem_id'])->academic_term_name.'  '.$paid_amount.' (Not Paid)'."</b></br>";	
			}
			else	
	     		 echo 'Sem-'.AcademicTerm::model()->findByPk($assignFees[0]['student_fees_master_sem_id'])->academic_term_name.'  '.$paid_amount.' ('.$payType.')'."</br>";
		}
		else
			echo '-';
		$paidAmt+=$paid_amount;
		}	
		echo "</td>";		
     		}
     	        else
	        {
		   echo '<td>-</td>';
	        }
          }	 
  	echo '<td>'.$paidAmt.'</td>';	
     }   // student loop
}   //branch loop
echo "<tr><td colspan=10><b style='color:red;'>[Note : Payable Amount of TWF Quota Students is 0.]</b></td></tr>";

echo "</table>";
?>
