<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_transaction_id), array('final_view', 'id'=>$data->student_transaction_id)); ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_user_id); ?>
	<br />
-->
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_Stud_Info->student_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_Branch->branch_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_division_id')); ?>:</b>
	<?php if(isset($data->Rel_Division->division_name))
		 echo CHtml::encode($data->Rel_Division->division_name);
	 else 
		 echo "N/A";
	 ?>
	<br />

<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_organization_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_student_address_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_student_address_id); ?>
	<br />
-->
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_nationality_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_nationality_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_quota_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_quota_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_religion_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_religion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_shift_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_shift_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_languages_known_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_languages_known_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_student_photos_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_student_photos_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_division_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_division_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_transaction_batch_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_transaction_batch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_term_period_tran_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_academic_term_period_tran_id); ?>
	<br />

	*/ ?>

</div>
