<style>
.row .row-left, .row .row-right {
	width: 40%;
}
</style>
<title>Course Wise Student Fees Report</title>
<?php
$this->breadcrumbs=array(
	'Course Wise Student Fees Report',	
);
?>
<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Select Criteria</span></div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-wise-fees-report',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	 <div class="row">
		<!--div class="row-left">
		<?php /* echo $form->labelEx($model,'fees_student_academic_term_period_id'); ?>
			<?php echo $form->dropDownList($model,'fees_student_academic_term_period_id', CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),
			array(
			'prompt' => 'Select Year',
			'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getCourse'), 
				'update'=>'#FeesPaymentTransaction_fees_student_course_id',
			)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'fees_student_academic_term_period_id'); */?>
		</div-->
		<div class="row-right">
		<?php echo $form->labelEx($model,'fees_student_course_id'); ?>
		<?php
				echo $form->dropDownList($model,'fees_student_course_id',
					CHtml::listData(Course::model()->findAll(),'course_id','course_name'),
					array(
					'prompt' => 'Select Course',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getCBatch'), 
					'update'=>'#FeesPaymentTransaction_fees_payment_batch_id', //selector to update				
					'options'=>array('selected'=>true),
					)));
				 	?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_student_course_id'); ?>
	       </div>
	</div>
	<div class="row">
	    <!--div class="row-left">
		<?php /* echo $form->labelEx($model,'fees_student_academic_term_id'); ?>
		<?php echo $form->dropDownList($model,'fees_student_academic_term_id',array(),array(
				'prompt' => 'Select Semester',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getBatch'), 
				'update'=>'#FeesPaymentTransaction_fees_payment_batch_id', 
				)));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_student_academic_term_id'); */ ?>
	      </div-->
	      <div class="row-right">	
		<?php echo $form->labelEx($model,'fees_payment_batch_id'); ?>
		<?php echo $form->dropDownList($model,'fees_payment_batch_id',array(),array('prompt'=>'Select Batch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_batch_id'); ?>		
	     </div>
	</div>
</div><!-- form -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
<?php

	if($status)
	{
		if(empty($student_data))
		{
			echo '<div class="grid-view" style="margin-top:50px;background: none repeat scroll 0 0 transparent;">';
			echo "<div class='block-error' style='float: left; width: 40%; color: red; background: none repeat scroll 0px 0px rgb(247, 190, 204); border: 2px solid red; height: 30px; line-height: 30px; padding: 5px;margin-top:5px;width:auto'>";
			echo "<big style='color:red'>No student found with this criteria.</big>";
			echo "</div>";
			echo "</div>";
		}
		else
		{
			$course=Course::model()->findByPk($_REQUEST['FeesPaymentTransaction']['fees_student_course_id']);
			$batch=Batch::model()->findByPk($_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']);
		?>			
		
		<div class="portlet box blue view" style="margin-top:50px;width:100%">
		<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Course Wise Student Fees Report</span>
	</div>
	    	<div class="operation">
		<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('FeesPaymentTransaction/CourseWiseFeesReport'), array('class'=>'btnyellow'));?>	
		  <?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('FeesPaymentTransaction/courseWiseFeesReport','excel'=>'excel','exp_course_id'=>$course->course_id,'exp_batch_id'=>$_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']), array('class'=>'btnblue'));?>

		  <?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF',array('FeesPaymentTransaction/courseWiseFeesReport','PDF'=>'PDF','exp_course_id'=>$course->course_id,'exp_batch_id'=>$_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btn green')); ?>
		</div>
	<div class="grid-view" style="overflow:auto">
	<table class="items" border="0" style="width:100%;border-collapse:collapse;">
	  <tr class="table_header">
	     <th>SI.NO.</th>
	     <th>Roll No.</th>
	     <th>Name</th>
	     <!--th>AcademicYear</th-->
	     <th>Course</th>
	     <!--th>Semester</th-->
	     <th>Batch</th>
	     <th>Payable Amount</th>
	     <th>Paid Amount</th>
	     <th>OutStanding Amount</th>
	  </tr>
<?php    
		$i=1;
		//$batch_fees=$batch->batch_fees;
		//$totalcollection=count($student_data)*$batch_fees;
		$total_paid=$batch_fees=0;
		$total_out=$totalcollection=0;
		foreach($student_data as $stu_details)
		{

		
		 $batch=Batch::model()->findByPk($stu_details['student_transaction_batch_id']);
		 $batch_fees=$batch->batch_fees;
		 $totalcollection+=$batch_fees;
		 
	  	 echo '<tr align="center">';
	         echo '<td>'.$i.'</td>';
	         echo '<td>'.$stu_details['student_roll_no'].'</td>';
	         echo '<td>'.$stu_details['student_first_name']." ".$stu_details['student_middle_name']." ".$stu_details['student_last_name'].'</td>';
		//echo '<td>'.AcademicTermPeriod::model()->findByPk($stu_details['academic_term_period_id'])->academic_term_period.'</td>';
		echo '<td>'.Course::model()->findByPk($stu_details['course_id'])->course_name.'</td>';
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
	         echo '<td>'.$out_fees.'</td>';
		 echo '</tr>';
		 $total_paid+= $stu_paidfees;
		 $total_out+=$out_fees;
		$i++;
	       }
    echo '<tr style="font-size:15px;">
		<th colspan=5 align="right">Total Amount</th>
	  	<th>'.$totalcollection.'</th>
		<th>'.$total_paid.'</th>
		<th>'.$total_out.'</th>
	  </tr>';		
     echo '</table>';
	echo '</div>';
	echo '</div>';
	}
}
?>

