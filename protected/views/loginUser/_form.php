<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_in_time'); ?>
		<?php echo $form->textField($model,'log_in_time'); ?>
		<?php echo $form->error($model,'log_in_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_out_time'); ?>
		<?php echo $form->textField($model,'log_out_time'); ?>
		<?php echo $form->error($model,'log_out_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->