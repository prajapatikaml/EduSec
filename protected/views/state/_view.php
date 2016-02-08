<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->state_id), array('view', 'id'=>$data->state_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_name')); ?>:</b>
	<?php echo CHtml::encode($data->state_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />


</div>