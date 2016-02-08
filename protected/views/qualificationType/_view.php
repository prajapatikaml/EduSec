<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->qualification_type_id), array('view', 'id'=>$data->qualification_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_type_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_type_desc')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_type_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_type_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_type_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_type_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_type_creation_date); ?>
	<br />


</div>