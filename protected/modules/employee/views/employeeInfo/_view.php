<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_id), array('view', 'id'=>$data->employee_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_no')); ?>:</b>
	<?php echo CHtml::encode($data->employee_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_name_alias')); ?>:</b>
	<?php echo CHtml::encode($data->employee_name_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_dob')); ?>:</b>
	<?php echo CHtml::encode($data->employee_dob); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_birthplace')); ?>:</b>
	<?php echo CHtml::encode($data->employee_birthplace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_gender')); ?>:</b>
	<?php echo CHtml::encode($data->employee_gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_bloodgroup')); ?>:</b>
	<?php echo CHtml::encode($data->employee_bloodgroup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_marital_status')); ?>:</b>
	<?php echo CHtml::encode($data->employee_marital_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_private_email')); ?>:</b>
	<?php echo CHtml::encode($data->employee_private_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_organization_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->employee_organization_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_private_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->employee_private_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_pancard_no')); ?>:</b>
	<?php echo CHtml::encode($data->employee_pancard_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_account_no')); ?>:</b>
	<?php echo CHtml::encode($data->employee_account_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_joining_date')); ?>:</b>
	<?php echo CHtml::encode($data->employee_joining_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_probation_period')); ?>:</b>
	<?php echo CHtml::encode($data->employee_probation_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_hobbies')); ?>:</b>
	<?php echo CHtml::encode($data->employee_hobbies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_technical_skills')); ?>:</b>
	<?php echo CHtml::encode($data->employee_technical_skills); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_project_details')); ?>:</b>
	<?php echo CHtml::encode($data->employee_project_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_curricular')); ?>:</b>
	<?php echo CHtml::encode($data->employee_curricular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_reference')); ?>:</b>
	<?php echo CHtml::encode($data->employee_reference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_refer_designation')); ?>:</b>
	<?php echo CHtml::encode($data->employee_refer_designation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_relation')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_relation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_home_address')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_home_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_qualification')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_qualification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_occupation')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_income')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_income); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_occupation_address')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_occupation_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_occupation_city')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_occupation_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_city_pin')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_city_pin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_phone_no')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_phone_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_mobile1')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_mobile1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_guardian_mobile2')); ?>:</b>
	<?php echo CHtml::encode($data->employee_guardian_mobile2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_faculty_of')); ?>:</b>
	<?php echo CHtml::encode($data->employee_faculty_of); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_attendance_card_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_attendance_card_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_tally_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_tally_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->employee_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->employee_creation_date); ?>
	<br />

	*/ ?>

</div>