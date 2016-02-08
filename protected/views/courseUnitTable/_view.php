<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->course_unit_id), array('view', 'id'=>$data->course_unit_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_ref_code')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_ref_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_name')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_level')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_credit')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_credit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_hours')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_hours); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_unit_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->course_unit_creation_date); ?>
	<br />

	*/ ?>

</div>