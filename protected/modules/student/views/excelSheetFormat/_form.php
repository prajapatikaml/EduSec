<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'excel-sheet-format-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'excel_sheet_name'); ?>
		<?php echo $form->textField($model,'excel_sheet_name',array('size'=>10,'maxlength'=>100)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'excel_sheet_name'); ?>
	</div>

	<div class="row">		
		<?php echo $form->labelEx($model,'excel_sheet_path'); ?>
		<?php //echo $form->textField($model,'excel_sheet_path',array('size'=>60,'maxlength'=>200)); ?>

		<div class="hint-field"><?php echo $form->fileField($model,'excel_sheet_path'); ?><div class="hint-hint"><b>Hint:-</b>&nbsp;"Xlsx format only"</div></div><span class="status">&nbsp;</span>

		<?php echo $form->error($model,'excel_sheet_path'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'excel_sheet_format_org_id'); ?>
		<?php echo $form->textField($model,'excel_sheet_format_org_id'); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'excel_sheet_format_org_id'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
