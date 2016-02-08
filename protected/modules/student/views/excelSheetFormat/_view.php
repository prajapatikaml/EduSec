<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('excel_sheet_format_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->excel_sheet_format_id),array('view','id'=>$data->excel_sheet_format_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excel_sheet_name')); ?>:</b>
	<?php echo CHtml::encode($data->excel_sheet_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excel_sheet_path')); ?>:</b>
	<?php echo CHtml::encode($data->excel_sheet_path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excel_sheet_format_org_id')); ?>:</b>
	<?php echo CHtml::encode($data->excel_sheet_format_org_id); ?>
	<br />


</div>