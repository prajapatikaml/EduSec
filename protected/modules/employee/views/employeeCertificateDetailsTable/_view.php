<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_details_table_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_certificate_details_table_id),array('view','id'=>$data->employee_certificate_details_table_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_details_table_emp_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_certificate_details_table_emp_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_certificate_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->employee_certificate_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->employee_certificate_creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_certificate_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_certificate_org_id); ?>
	<br />


</div>