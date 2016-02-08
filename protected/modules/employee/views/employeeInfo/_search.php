<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'employee_id'); ?>
		<?php echo $form->textField($model,'employee_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'employee_no'); ?>
		<?php echo $form->textField($model,'employee_no',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_first_name'); ?>
		<?php echo $form->textField($model,'employee_first_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_middle_name'); ?>
		<?php echo $form->textField($model,'employee_middle_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_last_name'); ?>
		<?php echo $form->textField($model,'employee_last_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_name_alias'); ?>
		<?php echo $form->textField($model,'employee_name_alias',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_dob'); ?>
		<?php echo $form->textField($model,'employee_dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_birthplace'); ?>
		<?php echo $form->textField($model,'employee_birthplace',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_gender'); ?>
		<?php echo $form->textField($model,'employee_gender',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_bloodgroup'); ?>
		<?php echo $form->textField($model,'employee_bloodgroup',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_marital_status'); ?>
		<?php echo $form->textField($model,'employee_marital_status',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_private_email'); ?>
		<?php echo $form->textField($model,'employee_private_email',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_organization_mobile'); ?>
		<?php echo $form->textField($model,'employee_organization_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_private_mobile'); ?>
		<?php echo $form->textField($model,'employee_private_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_pancard_no'); ?>
		<?php echo $form->textField($model,'employee_pancard_no',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_account_no'); ?>
		<?php echo $form->textField($model,'employee_account_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_joining_date'); ?>
		<?php echo $form->textField($model,'employee_joining_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_probation_period'); ?>
		<?php echo $form->textField($model,'employee_probation_period',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_hobbies'); ?>
		<?php echo $form->textArea($model,'employee_hobbies',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_technical_skills'); ?>
		<?php echo $form->textArea($model,'employee_technical_skills',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_project_details'); ?>
		<?php echo $form->textArea($model,'employee_project_details',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_curricular'); ?>
		<?php echo $form->textArea($model,'employee_curricular',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_reference'); ?>
		<?php echo $form->textField($model,'employee_reference',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_refer_designation'); ?>
		<?php echo $form->textField($model,'employee_refer_designation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_name'); ?>
		<?php echo $form->textField($model,'employee_guardian_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_relation'); ?>
		<?php echo $form->textField($model,'employee_guardian_relation',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_home_address'); ?>
		<?php echo $form->textField($model,'employee_guardian_home_address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_qualification'); ?>
		<?php echo $form->textField($model,'employee_guardian_qualification',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_occupation'); ?>
		<?php echo $form->textField($model,'employee_guardian_occupation',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_income'); ?>
		<?php echo $form->textField($model,'employee_guardian_income',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_occupation_address'); ?>
		<?php echo $form->textField($model,'employee_guardian_occupation_address',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_occupation_city'); ?>
		<?php echo $form->textField($model,'employee_guardian_occupation_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_city_pin'); ?>
		<?php echo $form->textField($model,'employee_guardian_city_pin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_phone_no'); ?>
		<?php echo $form->textField($model,'employee_guardian_phone_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_mobile1'); ?>
		<?php echo $form->textField($model,'employee_guardian_mobile1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_guardian_mobile2'); ?>
		<?php echo $form->textField($model,'employee_guardian_mobile2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_faculty_of'); ?>
		<?php echo $form->textField($model,'employee_faculty_of',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_attendance_card_id'); ?>
		<?php echo $form->textField($model,'employee_attendance_card_id',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_tally_id'); ?>
		<?php echo $form->textField($model,'employee_tally_id',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'employee_created_by'); ?>
		<?php echo $form->textField($model,'employee_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_creation_date'); ?>
		<?php echo $form->textField($model,'employee_creation_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
