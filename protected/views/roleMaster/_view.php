<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_master_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->role_master_id), array('view', 'id'=>$data->role_master_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_master_name')); ?>:</b>
	<?php echo CHtml::encode($data->role_master_name); ?>
	<br />


</div>