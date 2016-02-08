<div class="portlet box blue">

 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'important-notice-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'notice'); ?>
		<?php echo $form->textArea($model,'notice',array('rows'=>4, 'cols'=>45,'style'=>'float:left;height:100px;width:500px','maxlength'=>200)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'notice'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
		<?php echo $form->error($model,'creation_date'); ?>
	</div> -->

</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>

<?php $this->endWidget(); ?>
</div>
