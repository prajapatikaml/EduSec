<?php
$this->breadcrumbs=array(
	'Schedule Sms Emails'=>array('schedulemessages'),
	'Schedule Sms',
	
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Automatic SMS Schedule For Absent Student</span> 
</div>
<div class="form">
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
		<?php echo CHtml::label(Yii::t('student_sms_email_details_to_mobile', 'To <span class="required">*</span>'), 'Email');?>
 		<?php $data = array('1'=>"Student Mobile",'2'=>"Guardian Mobile");
		 echo $form->radioButtonList($model,'student_sms_email_details_to_mobile',$data,array( 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_to_mobile'); ?>
	</div>	
	<div class="row">
		<?php echo $form->labelEx($model,'message_email_text'); ?>
		<?php echo $form->textArea($model,'message_email_text',array('rows'=>4, 'cols'=>50,'placeholder'=>"student first name is absent on lecture no 1:subject_name,please do needful.",'disabled'=>'true','style'=>'float:left')); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message_email_text'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Schedule',array('name'=>'schedule','class'=>'submit')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
