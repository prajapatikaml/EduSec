<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_docs_id), array('view', 'id'=>$data->employee_docs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_desc')); ?>:</b>
	<?php echo CHtml::encode($data->employee_docs_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_docs_path')); ?>:</b>
	<?php echo CHtml::encode($data->employee_docs_path); ?>
	<br />


</div>