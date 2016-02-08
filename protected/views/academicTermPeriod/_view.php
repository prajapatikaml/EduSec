<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->academic_terms_period_id), array('view', 'id'=>$data->academic_terms_period_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_name')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_term_period')); ?>:</b>
	<?php echo CHtml::encode($data->academic_term_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_organization_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_terms_period_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->academic_terms_period_creation_date); ?>
	<br />

	*/ ?>

</div>