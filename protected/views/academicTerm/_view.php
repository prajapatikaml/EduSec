<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_term_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->academic_term_id), array('view', 'id'=>$data->academic_term_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_term_name')); ?>:</b>
	<?php echo CHtml::encode($data->academic_term_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('academic_term_period_id')); ?>:</b>
	<?php echo CHtml::encode($data->academic_term_period_id); ?>
	<br />


</div>