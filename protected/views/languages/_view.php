<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->languages_id), array('view', 'id'=>$data->languages_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_name')); ?>:</b>
	<?php echo CHtml::encode($data->languages_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->languages_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->languages_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->languages_created_date); ?>
	<br />


</div>
