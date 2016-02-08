<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('st_id')); ?>:</b>
	<?php echo CHtml::encode($data->st_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attendence')); ?>:</b>
	<?php echo CHtml::encode($data->attendence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shift_id')); ?>:</b>
	<?php echo CHtml::encode($data->shift_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sem_id')); ?>:</b>
	<?php echo CHtml::encode($data->sem_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('div_id')); ?>:</b>
	<?php echo CHtml::encode($data->div_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batch_id')); ?>:</b>
	<?php echo CHtml::encode($data->batch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timetable_id')); ?>:</b>
	<?php echo CHtml::encode($data->timetable_id); ?>
	<br />

	*/ ?>

</div>