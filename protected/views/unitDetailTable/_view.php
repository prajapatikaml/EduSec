<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->unit_detail_id), array('view', 'id'=>$data->unit_detail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_unit_master_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_unit_master_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_course_id')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_title')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_desc')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_created_by')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_detail_creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->unit_detail_creation_date); ?>
	<br />


</div>