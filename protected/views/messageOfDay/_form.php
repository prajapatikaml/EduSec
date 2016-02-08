<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-of-day-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		 <?php echo $form->textArea($model,'message',array('rows'=>4, 'cols'=>45)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message'); ?>
	</div>
	<div class="row">
		 <?php echo $form->labelEx($model,'message_of_day_active'); ?>
	   	 <?php echo $form->checkBox($model,'message_of_day_active', array('value'=>1, 'uncheckValue'=>0)); ?>
	   	 <?php echo $form->error($model,'message_of_day_active'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
