<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_experience_id), array('view', 'id'=>$data->employee_experience_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_organization_name')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_designation')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_designation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_from')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_to')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_to); ?>
	<br />


</div>