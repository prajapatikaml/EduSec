<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->qualification_id), array('view', 'id'=>$data->qualification_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_name')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->qualification_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->qualification_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->qualification_created_date); ?>
	<br />


</div>
