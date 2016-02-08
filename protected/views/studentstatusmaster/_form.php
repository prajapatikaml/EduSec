<div class="portlet box blue">

 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Fill Details</span>
</div>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentstatusmaster-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'status_name'); ?>
		<?php echo $form->textField($model,'status_name',array('size'=>25,'maxlength'=>30)); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'status_name'); ?>
	</div>
</div><!-- form -->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
