<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-docs-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_docs_desc'); ?>
		<?php echo $form->textField($model,'employee_docs_desc',array('size'=>50,'maxlength'=>50)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_docs_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employee_docs_path'); ?>
		<?php echo $form->textField($model,'employee_docs_path',array('size'=>60,'maxlength'=>150)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'employee_docs_path'); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
