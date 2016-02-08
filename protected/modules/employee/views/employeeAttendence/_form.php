<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Import Employee Attendance</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-attendence-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'csvfile'); ?>
		<div class="hint-field"><?php echo $form->fileField($model,'csvfile'); ?><div class="hint-hint"><b>Hint:-</b>&nbsp;"Xlsx format only"</div></div>
		
	 	<?php echo $form->error($model,'csvfile'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Import' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
