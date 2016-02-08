<div class="portlet box blue">

 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Reset Login ID</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
	   'validateOnSubmit'=>true,
        ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'user_organization_email_id'); ?>
		<?php echo $form->error($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>35,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton('Reset', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('user/resetstudloginid'), array('class'=>'btnCan')); ?> 

	</div>

<?php $this->endWidget(); ?>
</div>
