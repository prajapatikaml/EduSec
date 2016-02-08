<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Fill Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gtunotice-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		 <?php echo $form->textArea($model,'Description',array('rows'=>4, 'cols'=>43)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Link'); ?>
		<?php echo $form->textField($model,'Link',array('size'=>30,'maxlength'=>200)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'Link'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save' , array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
