<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->department_id), array('view', 'id'=>$data->department_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_name')); ?>:</b>
	<?php echo CHtml::encode($data->department_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_organization_id')); ?>:</b>
	<?php 
		$org_name = Organization::model()->findbyPk($data->department_organization_id);
	?>
	<?php echo CHtml::encode($org_name->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->department_created_by);
	?>
	<?php echo CHtml::encode($create_user->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('department_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->department_created_date); ?>
	<br />


</div>
