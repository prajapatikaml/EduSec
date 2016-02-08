<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_in_time')); ?>:</b>
	<?php echo CHtml::encode($data->log_in_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_out_time')); ?>:</b>
	<?php echo CHtml::encode($data->log_out_time); ?>
	<br />


</div>