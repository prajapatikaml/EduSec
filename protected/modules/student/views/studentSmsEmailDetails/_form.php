<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title"> Send Sms-Emails</span>
</div><div class="form ">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-sms-email-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<?php
    Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".flash-error").animate({opacity: 1.0}, 5000).fadeOut("slow");',
 CClientScript::POS_READY
);
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php
		if(Yii::app()->user->hasFlash('selection-error')) {?>
		<div class="flash-error">
			<?php echo Yii::app()->user->getFlash('selection-error');?>
		</div>
	<?php } ?>

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
		<?php echo $form->error($model,'student_sms_email_details_batch_id'); ?>
	</div>


	<div class="row" >
		<?php echo $form->labelEx($model,'email_sms_status'); ?>
		<?php $data = array('1'=>"SMS",'2'=>"EMAIL");
		$model->email_sms_status = 1;
		 echo $form->radioButtonList($model,'email_sms_status',$data,array('class'=>'radio', 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'email_sms_status'); ?>
	</div>	
	<div class="hint" ><b>Hint:-&nbsp;For SMS message character limit is 160.</b></div>

	<div class="row">
		<?php echo $form->labelEx($model,'message_email_text'); ?>
		<?php echo $form->textArea($model,'message_email_text',array('rows'=>6, 'cols'=>50,'maxlength'=>160,'resize'=>'none','style'=>'float:left')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message_email_text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div>
