<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->parent_id),array('view','id'=>$data->parent_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_user_name')); ?>:</b>
	<?php echo CHtml::encode($data->parent_user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_password')); ?>:</b>
	<?php echo CHtml::encode($data->parent_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />


</div>