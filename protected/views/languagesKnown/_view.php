<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->languages_known_id), array('view', 'id'=>$data->languages_known_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known1')); ?>:</b>
	<?php echo CHtml::encode($data->languages_known1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known2')); ?>:</b>
	<?php echo CHtml::encode($data->languages_known2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known3')); ?>:</b>
	<?php echo CHtml::encode($data->languages_known3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('languages_known4')); ?>:</b>
	<?php echo CHtml::encode($data->languages_known4); ?>
	<br />


</div>