<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parent-login-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	
	<div class="row">
		<?php echo $form->labelEx($model,'current_pass'); ?>
		<?php echo $form->passwordField($model,'current_pass',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'current_pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_pass'); ?>
		<?php echo $form->passwordField($model,'new_pass',array('size'=>50,'maxlength'=>50)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'new_pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'retype_pass'); ?>
		<?php echo $form->passwordField($model,'retype_pass',array('size'=>50,'maxlength'=>50)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'retype_pass'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
