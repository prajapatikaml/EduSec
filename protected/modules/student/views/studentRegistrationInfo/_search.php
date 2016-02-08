<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_registration_id'); ?>
		<?php echo $form->textField($model,'student_registration_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_first_name'); ?>
		<?php echo $form->textField($model,'student_first_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_middle_name'); ?>
		<?php echo $form->textField($model,'student_middle_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_last_name'); ?>
		<?php echo $form->textField($model,'student_last_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_merit_no'); ?>
		<?php echo $form->textField($model,'student_merit_no',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_merit_marks'); ?>
		<?php echo $form->textField($model,'student_merit_marks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_category_id'); ?>
		<?php echo $form->textField($model,'student_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_gender'); ?>
		<?php echo $form->textField($model,'student_gender',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_date_of_registration'); ?>
		<?php echo $form->textField($model,'student_date_of_registration'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_branch_id'); ?>
		<?php echo $form->textField($model,'student_branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_board'); ?>
		<?php echo $form->textField($model,'student_board',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_dob'); ?>
		<?php echo $form->textField($model,'student_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_place_of_birth'); ?>
		<?php echo $form->textField($model,'student_place_of_birth',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_address_c_line1'); ?>
		<?php echo $form->textField($model,'student_address_c_line1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_address_c_line1'); ?>
		<?php echo $form->textField($model,'student_address_c_line1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_email_id'); ?>
		<?php echo $form->textField($model,'student_email_id',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_phoneno'); ?>
		<?php echo $form->textField($model,'student_phoneno',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_mobile'); ?>
		<?php echo $form->textField($model,'student_mobile',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_guardian_phoneno'); ?>
		<?php echo $form->textField($model,'student_guardian_phoneno',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_guardian_mobile'); ?>
		<?php echo $form->textField($model,'student_guardian_mobile',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_last_school_attended'); ?>
		<?php echo $form->textField($model,'student_last_school_attended',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_last_school_attended_address'); ?>
		<?php echo $form->textField($model,'student_last_school_attended_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_father_name'); ?>
		<?php echo $form->textField($model,'student_father_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_mother_name'); ?>
		<?php echo $form->textField($model,'student_mother_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_father_occupation'); ?>
		<?php echo $form->textField($model,'student_father_occupation',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_mother_occupation'); ?>
		<?php echo $form->textField($model,'student_mother_occupation',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'studnet_father_office_address'); ?>
		<?php echo $form->textField($model,'studnet_father_office_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_mother_office_address'); ?>
		<?php echo $form->textField($model,'student_mother_office_address',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_photo'); ?>
		<?php echo $form->textField($model,'student_photo',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
