<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'unit-detail-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_detail_title'); ?>
		<?php echo $form->textField($model,'unit_detail_title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'unit_detail_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit_detail_desc'); ?>
		<?php echo $form->textArea($model,'unit_detail_desc');?>
		<?php echo $form->error($model,'unit_detail_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
