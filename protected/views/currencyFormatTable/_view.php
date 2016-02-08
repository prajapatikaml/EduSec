<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_format_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->currency_format_id), array('view', 'id'=>$data->currency_format_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_format')); ?>:</b>
	<?php echo CHtml::encode($data->currency_format); ?>
	<br />


</div>