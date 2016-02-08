<div class="portlet box blue">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title"> Send Sms-emails</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-sms-email-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no-record'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'department_id'); ?>
		 <?php echo $form->dropDownList($model,'department_id',Department::items(), array('empty' => 'Select Department','tabindex'=>6)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_sms_status'); ?>
		<?php $data = array('1'=>"SMS",'2'=>"EMAIL");
		$model->email_sms_status = 1;
		 echo $form->radioButtonList($model,'email_sms_status',$data,array('class'=>'radio', 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'email_sms_status'); ?>
	</div>	

	<div class="hint"><b>Hint:-&nbsp;For SMS message character limit is 160.</b></div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'message_email_text'); ?>
		<?php echo $form->textArea($model,'message_email_text',array('rows'=>6, 'cols'=>50,'maxlength'=>160)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message_email_text'); ?>
	</div>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Send' : 'Save',array('class'=>'submit')); ?>
	</div>


<?php $this->endWidget(); ?>
</div>
