<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-form',
	'enableAjaxValidation'=>true,
	 'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'state_name'); ?>
		<?php echo $form->error($model,'state_name'); ?>
		<?php echo $form->textField($model,'state_name',array('size'=>22,'maxlength'=>60)); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php //echo $form->textField($model,'country_id',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->dropDownList($model,'country_id', Country::items(), array('empty' => 'Select Country')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>
