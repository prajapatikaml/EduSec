<?php
$this->breadcrumbs=array(
	'Send SMS',
);

?>

<h1>Send SMS</h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sms-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_no'); ?>
		<?php  echo $form->textField($model,'phone_no'); ?><span class="status">&nbsp;</span>
               	<?php echo $form->error($model,'phone_no'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('SEND',array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

