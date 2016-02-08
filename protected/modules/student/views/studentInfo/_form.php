<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-info-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student_roll_no'); ?>
		<?php echo $form->textField($model,'student_roll_no',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'student_roll_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_merit_no'); ?>
		<?php echo $form->textField($model,'student_merit_no',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'student_merit_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_enroll_no'); ?>
		<?php echo $form->textField($model,'student_enroll_no',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'student_enroll_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_college_id'); ?>
		<?php echo $form->textField($model,'student_college_id'); ?>
		<?php echo $form->error($model,'student_college_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_first_name'); ?>
		<?php echo $form->textField($model,'student_first_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_middle_name'); ?>
		<?php echo $form->textField($model,'student_middle_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_last_name'); ?>
		<?php echo $form->textField($model,'student_last_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_father_name'); ?>
		<?php echo $form->textField($model,'student_father_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_father_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_mother_name'); ?>
		<?php echo $form->textField($model,'student_mother_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_mother_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_adm_date'); ?>
		<?php echo $form->textField($model,'student_adm_date'); ?>
		<?php echo $form->error($model,'student_adm_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_dob'); ?>
		<?php echo $form->textField($model,'student_dob'); ?>
		<?php echo $form->error($model,'student_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_birthplace'); ?>
		<?php echo $form->textField($model,'student_birthplace',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_birthplace'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_gender'); ?>
		<?php echo $form->textField($model,'student_gender',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'student_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_name'); ?>
		<?php echo $form->textField($model,'student_guardian_name',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'student_guardian_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_relation'); ?>
		<?php echo $form->textField($model,'student_guardian_relation',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'student_guardian_relation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_qualification'); ?>
		<?php echo $form->textField($model,'student_guardian_qualification',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_guardian_qualification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_occupation'); ?>
		<?php echo $form->textField($model,'student_guardian_occupation',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_guardian_occupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_income'); ?>
		<?php echo $form->textField($model,'student_guardian_income',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'student_guardian_income'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_occupation_address'); ?>
		<?php echo $form->textField($model,'student_guardian_occupation_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'student_guardian_occupation_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_occupation_city'); ?>
		<?php echo $form->textField($model,'student_guardian_occupation_city'); ?>
		<?php echo $form->error($model,'student_guardian_occupation_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_city_pin'); ?>
		<?php echo $form->textField($model,'student_guardian_city_pin'); ?>
		<?php echo $form->error($model,'student_guardian_city_pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_home_address'); ?>
		<?php echo $form->textField($model,'student_guardian_home_address',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'student_guardian_home_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_phoneno'); ?>
		<?php echo $form->textField($model,'student_guardian_phoneno'); ?>
		<?php echo $form->error($model,'student_guardian_phoneno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_guardian_mobile'); ?>
		<?php echo $form->textField($model,'student_guardian_mobile'); ?>
		<?php echo $form->error($model,'student_guardian_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_email_id_1'); ?>
		<?php echo $form->textField($model,'student_email_id_1',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'student_email_id_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_email_id_2'); ?>
		<?php echo $form->textField($model,'student_email_id_2',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'student_email_id_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_bloodgroup'); ?>
		<?php echo $form->textField($model,'student_bloodgroup',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'student_bloodgroup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_tally_id'); ?>
		<?php echo $form->textField($model,'student_tally_id'); ?>
		<?php echo $form->error($model,'student_tally_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_created_by'); ?>
		<?php echo $form->textField($model,'student_created_by'); ?>
		<?php echo $form->error($model,'student_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_creation_date'); ?>
		<?php echo $form->textField($model,'student_creation_date'); ?>
		<?php echo $form->error($model,'student_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->