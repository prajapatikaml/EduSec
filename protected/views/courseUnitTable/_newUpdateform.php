<style>
.error.required {
  color: red;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-unit-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_ref_code'); ?>
		<?php echo $form->textField($model,'course_unit_ref_code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'course_unit_ref_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_name'); ?>
		<?php echo $form->textField($model,'course_unit_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'course_unit_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_level'); ?>
		<?php echo $form->textField($model,'course_unit_level'); ?>
		<?php echo $form->error($model,'course_unit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_credit'); ?>
		<?php echo $form->textField($model,'course_unit_credit'); ?>
		<?php echo $form->error($model,'course_unit_credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_hours'); ?>
		<?php echo $form->textField($model,'course_unit_hours'); ?>
		<?php echo $form->error($model,'course_unit_hours'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
