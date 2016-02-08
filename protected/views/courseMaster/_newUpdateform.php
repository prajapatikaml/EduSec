<style>
.error.required {
  color: red;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-master-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
        
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<div id="formResult"></div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_name'); ?>
		<?php echo $form->textField($model,'course_name',array('size'=>60,'maxlength'=>100)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_category_id'); ?>
		<?php echo $form->dropDownList($model,'course_category_id', CHtml::listData(QualificationType::model()->findAll(),'qualification_type_id','qualification_type_name'), array('empty'=>'Select Category')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_level'); ?>
		<?php echo $form->textField($model,'course_level'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_completion_hours'); ?>
		<?php echo $form->textField($model,'course_completion_hours'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_completion_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_code'); ?>
		<?php echo $form->textField($model,'course_code',array('size'=>25,'maxlength'=>25)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_cost'); ?>
		<?php echo $form->textField($model,'course_cost'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'course_desc'); ?>
		<?php echo $form->textField($model,'course_desc'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'course_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

