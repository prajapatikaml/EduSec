<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->student_docs_id), array('view', 'id'=>$data->student_docs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_desc')); ?>:</b>
	<?php echo CHtml::encode($data->student_docs_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('student_docs_path')); ?>:</b>
	<?php echo CHtml::encode($data->student_docs_path); ?>
	<br />


</div>