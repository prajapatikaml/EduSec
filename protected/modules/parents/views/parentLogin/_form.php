<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parent-login-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'parent_user_name'); ?>
		<?php echo $form->textField($model,'parent_user_name',array('size'=>60,'maxlength'=>100)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'parent_user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_password'); ?>
		<?php echo $form->textField($model,'parent_password',array('size'=>60,'maxlength'=>200)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'parent_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
