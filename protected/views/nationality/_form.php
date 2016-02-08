<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nationality-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nationality_name'); ?>
		<?php echo $form->textField($model,'nationality_name',array('size'=>25,'maxlength'=>30)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'nationality_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
