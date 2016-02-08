<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-experience-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_experience_organization_name'); ?>
		<?php echo $form->textField($model,'employee_experience_organization_name',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_experience_organization_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_experience_designation'); ?>
		<?php echo $form->textField($model,'employee_experience_designation',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_experience_designation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_experience_from'); ?>
		<?php echo $form->textField($model,'employee_experience_from'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_experience_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_experience_to'); ?>
		<?php echo $form->textField($model,'employee_experience_to'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_experience_to'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
