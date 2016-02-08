<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qualification-type-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'qualification_type_name'); ?>
		<?php echo $form->textField($model,'qualification_type_name',array('size'=>60,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'qualification_type_name'); ?>
	</div>

	<?php echo $form->labelEx($model,'qualification_type_desc'); ?>
	<div class="row">
		<?php $this->widget('application.extensions.ckeditor.CKEditor', array(
			'model'=>$model,
			'attribute'=>'qualification_type_desc',
			'language'=>'us',
			'editorTemplate'=>'full',
			)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'qualification_type_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit', 'onclick'=>'CKEDITOR.instances.QualificationType_qualification_type_desc.updateElement()',
        )); 
		?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
