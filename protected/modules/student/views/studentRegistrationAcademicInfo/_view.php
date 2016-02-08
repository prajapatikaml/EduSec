<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_registration_academic_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_registration_academic_id), array('view', 'id'=>$data->student_registration_academic_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('examination')); ?>:</b>
	<?php echo CHtml::encode($data->examination); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_of_passing')); ?>:</b>
	<?php echo CHtml::encode($data->year_of_passing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_of_board')); ?>:</b>
	<?php echo CHtml::encode($data->name_of_board); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medium')); ?>:</b>
	<?php echo CHtml::encode($data->medium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('class_obtained')); ?>:</b>
	<?php echo CHtml::encode($data->class_obtained); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marks_obtained')); ?>:</b>
	<?php echo CHtml::encode($data->marks_obtained); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('marks_out_of')); ?>:</b>
	<?php echo CHtml::encode($data->marks_out_of); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('percentage')); ?>:</b>
	<?php echo CHtml::encode($data->percentage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_registration_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_registration_id); ?>
	<br />

	*/ ?>

</div>