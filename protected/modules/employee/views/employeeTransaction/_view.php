<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_transaction_id), array('final_view', 'id'=>$data->employee_transaction_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->Rel_Emp_Info->getAttributeLabel('employee_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_Emp_Info->employee_first_name); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_branch_id')); ?>:</b>
	<?php //echo CHtml::encode($data->employee_transaction_branch_id); ?>
	<?php echo CHtml::encode($data->Rel_Branch->branch_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->Rel_Department->getAttributeLabel('department_name')); ?>:</b>
	<?php echo CHtml::encode($data->Rel_Department->department_name); ?>
	<br />


<!--
	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_employee_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_employee_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_emp_address_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_emp_address_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_user_id); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_category_id')); ?>:</b>
	<?php //echo CHtml::encode($data->employee_transaction_category_id); ?>
	<?php echo CHtml::encode($data->Rel_Category->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_quota_id')); ?>:</b>
	<?php //echo CHtml::encode($data->employee_transaction_quota_id); ?>
	<?php echo CHtml::encode($data->Rel_Quota->quota_name); ?>
	<br />

-->
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_religion_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_religion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_shift_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_shift_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_designation_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_designation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_nationality_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_nationality_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_department_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_department_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_organization_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_languages_known_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_transaction_languages_known_id); ?>
	<br />

*/?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_transaction_emp_photos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/protected/emp_images/'.$data->Rel_Photo->employee_photos_path)); ?>
	<br />

</div>
