<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->certificate_id), array('view', 'id'=>$data->certificate_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_title')); ?>:</b>
	<?php echo CHtml::encode($data->certificate_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_content')); ?>:</b>
	<?php echo CHtml::encode($data->certificate_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->certificate_organization_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->certificate_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('certificate_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->certificate_creation_date); ?>
	<br />


</div>