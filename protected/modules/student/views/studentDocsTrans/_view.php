<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_trans_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_docs_trans_id), array('view', 'id'=>$data->student_docs_trans_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_trans_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_docs_trans_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_trans_stud_docs_id')); ?>:</b>
	<?php echo CHtml::encode($data->student_docs_trans_stud_docs_id); ?>
	<br />


</div>