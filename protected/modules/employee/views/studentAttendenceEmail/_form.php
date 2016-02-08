<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-attendence-email-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_emp_id'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_emp_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_branch_id'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_branch_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_org_id'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_org_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_org_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_created_by'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_created_by'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_creation_date'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'student_attendence_email_creation_date',
			'value' => $model->student_attendence_email_creation_date,
			'options' => array(
				'dateFormat'=>'dd-mm-yy',
				'changeYear'=>'true',
				'changeMonth'=>'true',
				'showAnim' =>'slide',
				'yearRange'=>'1900:'.(date('Y')+1),
				'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',						),
			));
; ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_minute'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_minute'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_minute'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_hour'); ?>
		<?php echo $form->textField($model, 'student_attendence_email_hour'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_hour'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
