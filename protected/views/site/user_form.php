<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
         'validateOnSubmit'=>true
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization_email_id'); ?>
		<?php echo $form->error($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>35,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_password'); ?>
		<?php echo $form->passwordField($model,'user_password',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'user_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Add', array('class'=>'submit btnblue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

