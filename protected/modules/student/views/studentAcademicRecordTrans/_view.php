<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_record_trans_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_academic_record_trans_id), array('view', 'id'=>$data->student_academic_record_trans_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_record_trans_stud_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_academic_record_trans_stud_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_record_trans_qualification_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_academic_record_trans_qualification_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_record_trans_eduboard_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_academic_record_trans_eduboard_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_academic_record_trans_record_trans_year_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_academic_record_trans_record_trans_year_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theory_mark_obtained')); ?>:</b>
	<?php echo CHtml::encode($data->theory_mark_obtained); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('theory_mark_max')); ?>:</b>
	<?php echo CHtml::encode($data->theory_mark_max); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('theory_percentage')); ?>:</b>
	<?php echo CHtml::encode($data->theory_percentage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practical_mark_obtained')); ?>:</b>
	<?php echo CHtml::encode($data->practical_mark_obtained); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practical_mark_max')); ?>:</b>
	<?php echo CHtml::encode($data->practical_mark_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('practical_percentage')); ?>:</b>
	<?php echo CHtml::encode($data->practical_percentage); ?>
	<br />

	*/ ?>

</div>
