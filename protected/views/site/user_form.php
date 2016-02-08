<div class="header">
	<h1 class="title">Create User</h1>
</div>
<div class="form" style="margin-top: 15px; padding: 183px 145px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
      ),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>35,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'user_organization_email_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_password'); ?>
		<?php echo $form->passwordField($model,'user_password',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'user_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Add', array('class'=>'submit', 'style'=>'float: left; margin-left: 11%;')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

