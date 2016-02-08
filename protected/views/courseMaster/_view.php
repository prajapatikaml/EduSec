<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->course_master_id), array('view', 'id'=>$data->course_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_name')); ?>:</b>
	<?php echo CHtml::encode($data->course_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_level')); ?>:</b>
	<?php echo CHtml::encode($data->course_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_completion_hours')); ?>:</b>
	<?php echo CHtml::encode($data->course_completion_hours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_code')); ?>:</b>
	<?php echo CHtml::encode($data->course_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_cost')); ?>:</b>
	<?php echo CHtml::encode($data->course_cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('course_desc')); ?>:</b>
	<?php echo CHtml::encode($data->course_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->course_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->course_creation_date); ?>
	<br />

	*/ ?>

</div>