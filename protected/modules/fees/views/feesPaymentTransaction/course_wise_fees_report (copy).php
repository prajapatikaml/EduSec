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
		<?php echo $form->labelEx($model,'fees_student_academic_term_period_id'); ?>
			<?php echo $form->dropDownList($model,'fees_student_academic_term_period_id', CHtml::listData(AcademicTermPeriod::model()->findAll(),'academic_terms_period_id','academic_term_period'),
			array(
			'prompt' => 'Select Year',
			'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getCourse'), 
				'update'=>'#FeesPaymentTransaction_fees_student_course_id',
			)));?><span class="status">&nbsp;</span>
			<?php echo $form->error($model,'fees_student_academic_term_period_id');?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fees_student_course_id'); ?>
		<?php
				echo $form->dropDownList($model,'fees_student_course_id',
					array(),
					array(
					'prompt' => 'Select Course',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/getSem'), 
					'update'=>'#FeesPaymentTransaction_fees_student_academic_term_id', //selector to update
					)));
				 	?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_student_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees_student_academic_term_id'); ?>
		<?php echo $form->dropDownList($model,'fees_student_academic_term_id',array(),array(
				'prompt' => 'Select Semester',
				'ajax' => array(
				'type'=>'POST', 
				'url'=>CController::createUrl('dependent/getBatch'), 
				'update'=>'#FeesPaymentTransaction_fees_payment_batch_id', 
				)));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_student_academic_term_id'); ?>
      </div>
      <div class="row">	
		<?php echo $form->labelEx($model,'fees_payment_batch_id'); ?>
		<?php echo $form->dropDownList($model,'fees_payment_batch_id', array('empty' => 'Select Batch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'fees_payment_batch_id'); ?>		
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
			echo "<div class='block-error' style='float: left; width: 40%; color: red; background: none repeat scroll 0px 0px rgb(247, 190, 204); border: 2px solid red; height: 30px; line-height: 30px; padding: 5px;margin-top:5px;width:auto'>";
			echo "<big style='color:red'>No student found with this criteria.</big>";
			echo "</div>";
		}
		else
		{
			$course=Course::model()->findByPk($_REQUEST['FeesPaymentTransaction']['fees_student_course_id']);
		?>			
		
		<div class="portlet box yellow" style="margin-top:20px;width:100%">
		<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Course Wise Student Fees Report</span>
	</div>
	    	<div class="operation">
		<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('FeesPaymentTransaction/CourseWiseFeesReport'), array('class'=>'btnyellow'));?>	
		  <?php echo CHtml::link('<i class="fa fa-file-excel-o"></i>Excel', array('courseWiseFeesReport','excel'=>'excel','exp_acdm_year'=>$_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_period_id'],'exp_course_id'=>$course->course_id,'exp_sem_id'=>$_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_id'],'exp_batch_id'=>$_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']), array('class'=>'btnblue'));?>

		  <?php echo CHtml::link('<i class="fa fa-file-pdf-o"></i>PDF',array('courseWiseFeesReport','PDF'=>'PDF','exp_acdm_year'=>$_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_period_id'],'exp_course_id'=>$course->course_id,'exp_sem_id'=>$_REQUEST['FeesPaymentTransaction']['fees_student_academic_term_id'],'exp_batch_id'=>$_REQUEST['FeesPaymentTransaction']['fees_payment_batch_id']),array('title'=>'Export to PDF','target'=>'_blank','class'=>'btnyellow')); ?>
		</div>

	<table class="report-table" style="float:left;width:100%;border:2px">
	  <tr class="table_header">
	     <th>SI.NO.</th>
	     <th>Roll No.</th>
	     <th>Name</th>
	     <th>AcademicYear</th>
	     <th>Course</th>
	     <th>Semester</th>
	     <th>Batch</th>
	     <th>Payable Amount</th>
	     <th>Paid Amount</th>
	     <th>OutStanding Amount</th>
	  </tr>
<?php    
		$i=1;
		$course_fees=$course->course_fees;
		$totalcollection=count($student_data)*$course_fees;
		$total_paid=0;
		$total_out=0;
		foreach($student_data as $stu_details)
		{
	  	 echo '<tr align="center">';
	         echo '<td>'.$i.'</td>';
	         echo '<td>'.$stu_details['student_roll_no'].'</td>';
	         echo '<td>'.$stu_details['student_first_name']." ".$stu_details['student_middle_name']." ".$stu_details['student_last_name'].'</td>';
		echo '<td>'.AcademicTermPeriod::model()->findByPk($stu_details['academic_term_period_id'])->academic_term_period.'</td>';
		echo '<td>'.Course::model()->findByPk($stu_details['course_id'])->course_name.'</td>';
		echo '<td>'.AcademicTerm::model()->findByPk($stu_details['academic_term_id'])->academic_term_name.'</td>';
		echo '<td>'.Batch::model()->findByPk($stu_details['student_transaction_batch_id'])->batch_name.'</td>';
	         echo '<td>'.$course_fees.'</td>';
		 $paidfees_tmp = Yii::app()->db->createCommand()
			    ->select('sum(fees_payment_amount) as paidfees')
			    ->from('fees_payment_transaction')
			    ->where('fees_payment_student_id = '.$stu_details['student_transaction_id'])
			    ->queryRow();
		$paidfees = array_filter($paidfees_tmp);
		if(!empty($paidfees))
			$stu_paidfees = $paidfees['paidfees'];
		else
			$stu_paidfees = 0;
		
	         echo '<td>'.$stu_paidfees.'</td>';
		 $out_fees=$course_fees-$stu_paidfees;
	         echo '<td>'.$out_fees.'</td>';
		 echo '</tr>';
		 $total_paid+= $stu_paidfees;
		 $total_out+=$out_fees;
		$i++;
	       }
    echo '<tr style="font-size:15px;">
		<th colspan=7 align="right">Total Amount</th>
	  	<th>'.$totalcollection.'</th>
		<th>'.$total_paid.'</th>
		<th>'.$total_out.'</th>
	  </tr>';		
     echo '</table>';

	}
}
?>
</div>


