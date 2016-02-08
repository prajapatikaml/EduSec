<?php
$this->breadcrumbs=array(
	'Schedule Sms Emails'=>array('schedulemessages'),
	'Schedule Sms',
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Schedule Fees Sms</span>
</div>
<div class="form two-coloumn">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-sms-email-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_sms_email_details_course_id'); ?>
		<?php echo $form->dropDownList($model,'student_sms_email_details_course_id',CHtml::listData(Course::model()->findAll(),'course_id','course_name'),array(
			'prompt' => 'Select Course',
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getSmsEmailBatch'), 
	
			'update'=>'#StudentSmsEmailDetails_student_sms_email_details_batch_id', //selector to update
			))); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_course_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'student_sms_email_details_batch_id'); ?>
		<?php echo $form->dropDownList($model,'student_sms_email_details_batch_id',array(), array('empty' => 'Select Batch')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_sms_email_details_schedule_time_id'); ?>
		<?php echo $form->dropDownList($model,'student_sms_email_details_schedule_time_id',CHtml::listData(ScheduleTiming::model()->findAll(),'schedule_timing_id','schedule_timing_name'),array('empty'=>'Select Schedule')); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_schedule_time_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_sms_email_details_fees_msg_type'); ?>
<?php		$data = array('1'=>"All Students",'2'=>"Unpaid Students");

		 echo $form->radioButtonList($model,'student_sms_email_details_fees_msg_type',$data,array( 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
			<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_fees_msg_type'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'student_sms_email_details_to_mobile'); ?>
	<?php		$data = array('1'=>"Student Mobile",'2'=>"Guardian Mobile");

		 echo $form->radioButtonList($model,'student_sms_email_details_to_mobile',$data,array( 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
			<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_to_mobile'); ?>
	</div>	
	<div class="hint" style="clear:left;"><b>Hint:-&nbsp;For SMS message character limit is 160.</b></div>
	<div class="row">
		<?php echo CHtml::label(Yii::t('message_email_text', 'Text: <span class="required">*</span>'), 'Text'); ?>
		<?php echo $form->textArea($model,'message_email_text',array('rows'=>6, 'cols'=>50,'maxlength'=>160)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message_email_text'); ?>
	</div>
	

	<?php for($i=0;$i<60;$i++)
	{
		$minute[]=$i;
		
	}?>
	
	<?php for($i=0;$i<24;$i++)
	{
		$hour[]=$i;
	}?>
	<?php for($i=1;$i<=31;$i++)
	{
		$date[$i]=$i;
	}?>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Schedule',array('name'=>'schedule','class'=>'submit')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
