<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nationality_id), array('view', 'id'=>$data->nationality_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality_name')); ?>:</b>
	<?php echo CHtml::encode($data->nationality_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->nationality_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->nationality_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->nationality_created_date); ?>
	<br />


</div>
