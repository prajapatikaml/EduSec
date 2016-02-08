<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Fill Details
 </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-unit-table-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_ref_code'); ?>
		<?php echo $form->textField($model,'course_unit_ref_code',array('size'=>60,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_unit_ref_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_name'); ?>
		<?php echo $form->textField($model,'course_unit_name',array('size'=>60,'maxlength'=>200)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_unit_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_level'); ?>
		<?php echo $form->textField($model,'course_unit_level'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_unit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_credit'); ?>
		<?php echo $form->textField($model,'course_unit_credit'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_unit_credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_unit_hours'); ?>
		<?php echo $form->textField($model,'course_unit_hours'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_unit_hours'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
		<?php echo CHtml::link('Cancel', array('courseUnitTable/view', 'id'=>$_REQUEST['id']), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
