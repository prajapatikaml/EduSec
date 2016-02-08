<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-certificate-details-table-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_certificate_details_table_emp_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_details_table_emp_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_certificate_details_table_emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_certificate_type_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_type_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_certificate_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_certificate_created_by'); ?>
		<?php echo $form->textField($model,'employee_certificate_created_by'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_certificate_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_certificate_creation_date'); ?>
		<?php echo $form->textField($model,'employee_certificate_creation_date'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_certificate_creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_certificate_org_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_org_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_certificate_org_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
