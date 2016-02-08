<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-archive-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_stud_tran_id'); ?>
		<?php echo $form->textField($model,'student_archive_stud_tran_id'); ?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'student_archive_stud_tran_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_stud_id'); ?>
		<?php echo $form->textField($model,'student_archive_stud_id'); ?><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'student_archive_stud_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_ac_t_p_id'); ?>
		<?php echo $form->textField($model,'student_archive_ac_t_p_id'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_archive_ac_t_p_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_ac_t_n_id'); ?>
		<?php echo $form->textField($model,'student_archive_ac_t_n_id'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_archive_ac_t_n_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_status'); ?>
		<?php echo $form->textField($model,'student_archive_status'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_archive_status'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'student_archive_created_by'); ?>
		<?php echo $form->textField($model,'student_archive_created_by'); ?>
		<?php echo $form->error($model,'student_archive_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_archive_creation_date'); ?>
		<?php echo $form->textField($model,'student_archive_creation_date'); ?>
		<?php echo $form->error($model,'student_archive_creation_date'); ?>
	</div>--->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
