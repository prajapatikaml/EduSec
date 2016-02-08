<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->organization_id), array('view', 'id'=>$data->organization_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_name')); ?>:</b>
	<?php echo CHtml::encode($data->organization_name); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->organization_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->organization_creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line1')); ?>:</b>
	<?php echo CHtml::encode($data->address_line1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line2')); ?>:</b>
	<?php echo CHtml::encode($data->address_line2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pin')); ?>:</b>
	<?php echo CHtml::encode($data->pin); ?>	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('taxno')); ?>:</b>
	<?php echo CHtml::encode($data->taxno); ?>
	<br />
</div>
