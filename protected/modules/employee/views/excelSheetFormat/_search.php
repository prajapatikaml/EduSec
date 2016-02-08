<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'excel_sheet_format_id'); ?>
		<?php echo $form->textField($model,'excel_sheet_format_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excel_sheet_name'); ?>
		<?php echo $form->textField($model,'excel_sheet_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excel_sheet_path'); ?>
		<?php echo $form->textField($model,'excel_sheet_path',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excel_sheet_format_org_id'); ?>
		<?php echo $form->textField($model,'excel_sheet_format_org_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
