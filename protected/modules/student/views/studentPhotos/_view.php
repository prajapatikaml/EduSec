<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_photos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_photos_id), array('view', 'id'=>$data->student_photos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_photos_desc')); ?>:</b>
	<?php echo CHtml::encode($data->student_photos_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_photos_path')); ?>:</b>
	<?php echo CHtml::encode($data->student_photos_path); ?>
	<br />


</div>