<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_trans_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_docs_trans_id), array('view', 'id'=>$data->employee_docs_trans_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_trans_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_docs_trans_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_trans_emp_docs_id')); ?>:</b>
	<?php echo CHtml::encode($data->employee_docs_trans_emp_docs_id); ?>
	<br />


</div>