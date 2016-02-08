<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-registration-academic-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'examination'); ?>
		<?php echo $form->textField($model,'examination',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'examination'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_of_passing'); ?>
		<?php echo $form->textField($model,'year_of_passing',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'year_of_passing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_of_board'); ?>
		<?php echo $form->textField($model,'name_of_board',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'name_of_board'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medium'); ?>
		<?php echo $form->textField($model,'medium',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'medium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class_obtained'); ?>
		<?php echo $form->textField($model,'class_obtained',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'class_obtained'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marks_obtained'); ?>
		<?php echo $form->textField($model,'marks_obtained'); ?>
		<?php echo $form->error($model,'marks_obtained'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marks_out_of'); ?>
		<?php echo $form->textField($model,'marks_out_of'); ?>
		<?php echo $form->error($model,'marks_out_of'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage'); ?>
		<?php echo $form->error($model,'percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_registration_id'); ?>
		<?php echo $form->textField($model,'student_registration_id'); ?>
		<?php echo $form->error($model,'student_registration_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->