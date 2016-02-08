<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_photos_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->employee_photos_id), array('view', 'id'=>$data->employee_photos_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_photos_desc')); ?>:</b>
	<?php echo CHtml::encode($data->employee_photos_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('employee_photos_path')); ?>:</b>
	<?php echo CHtml::encode($data->employee_photos_path); ?>
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$data->employee_photos_path); ?>
	<br />


</div>
