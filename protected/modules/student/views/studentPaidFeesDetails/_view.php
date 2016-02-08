<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_fees_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_paid_fees_id), array('view', 'id'=>$data->student_paid_fees_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_student_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_paid_student_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_course_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_paid_course_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_amount')); ?>:</b>
	<?php echo CHtml::encode($data->student_paid_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_date')); ?>:</b>
	<?php echo CHtml::encode($data->student_paid_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_paid_to')); ?>:</b>
	<?php echo CHtml::encode($data->student_paid_to); ?>
	<br />


</div>