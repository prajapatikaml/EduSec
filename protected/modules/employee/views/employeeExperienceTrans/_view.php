<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_trans_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_experience_trans_id), array('view', 'id'=>$data->employee_experience_trans_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_trans_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_trans_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_experience_trans_emp_experience_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_experience_trans_emp_experience_id); ?>
	<br />


</div>