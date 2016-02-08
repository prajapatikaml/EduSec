<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->doc_category_id), array('view', 'id'=>$data->doc_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->doc_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('docs_category_organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->docs_category_organization_id); ?>
	<br />


</div>