<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>
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
		 <?php echo $form->textArea($model,'message',array('rows'=>10, 'cols'=>450,'style'=>'float:left;height:100px;width:500px')); ?><span class="status">&nbsp;</span>
		<b style="color:red"><?php echo $form->error($model,'message'); ?></b>
	</div>
	<div class="row">
		 <?php echo $form->labelEx($model,'message_of_day_active'); ?>
	   	 <?php echo $form->checkBox($model,'message_of_day_active', array('value'=>1, 'uncheckValue'=>0)); ?>
	   	 <?php echo $form->error($model,'message_of_day_active'); ?>
	</div>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>

<?php $this->endWidget(); ?>

</div>
</div>
