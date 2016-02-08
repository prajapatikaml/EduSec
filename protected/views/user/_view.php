<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_organization_email_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_organization_email_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_created_by')); ?>:</b>
	<?php
		$create_user = User::model()->findbyPk($data->user_created_by);
		if(isset($create_user))
		echo  $create_user->user_organization_email_id;
		else
		echo "N/A";
	?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->user_creation_date); ?>
	<br />


</div>
