<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'languages-known-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_known1'); ?>
		<?php echo $form->textField($model,'languages_known1'); ?>
		<?php echo $form->error($model,'languages_known1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_known2'); ?>
		<?php echo $form->textField($model,'languages_known2'); ?>
		<?php echo $form->error($model,'languages_known2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_known3'); ?>
		<?php echo $form->textField($model,'languages_known3'); ?>
		<?php echo $form->error($model,'languages_known3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'languages_known4'); ?>
		<?php echo $form->textField($model,'languages_known4'); ?>
		<?php echo $form->error($model,'languages_known4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->