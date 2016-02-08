<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-docs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_docs_desc'); ?>
		<?php echo $form->textField($model,'student_docs_desc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_docs_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_docs_path'); ?>
		<?php echo $form->textField($model,'student_docs_path',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'student_docs_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
