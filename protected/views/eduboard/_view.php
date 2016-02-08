<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduboard_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eduboard_id), array('view', 'id'=>$data->eduboard_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduboard_name')); ?>:</b>
	<?php echo CHtml::encode($data->eduboard_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduboard_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->eduboard_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduboard_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->eduboard_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduboard_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->eduboard_created_date); ?>
	<br />


</div>
