<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-unit-table-form',
	'enableAjaxValidation'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
       'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($upmodel); ?>

	<?php echo $form->hiddenField($upmodel,'course_unit_master_id',array('value'=>$upmodel->course_unit_master_id)); ?>

	<div class="row">
		<?php echo $form->labelEx($upmodel,'course_unit_ref_code'); ?>
		<?php echo $form->textField($upmodel,'course_unit_ref_code',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($upmodel,'course_unit_ref_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($upmodel,'course_unit_name'); ?>
		<?php echo $form->textField($upmodel,'course_unit_name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($upmodel,'course_unit_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($upmodel,'course_unit_level'); ?>
		<?php echo $form->textField($upmodel,'course_unit_level'); ?>
		<?php echo $form->error($upmodel,'course_unit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($upmodel,'course_unit_credit'); ?>
		<?php echo $form->textField($upmodel,'course_unit_credit'); ?>
		<?php echo $form->error($upmodel,'course_unit_credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($upmodel,'course_unit_hours'); ?>
		<?php echo $form->textField($upmodel,'course_unit_hours'); ?>
		<?php echo $form->error($upmodel,'course_unit_hours'); ?>
	</div>
	<div class="row buttons">
	<?php echo CHtml::button('Update', array('submit'=>array('update','id'=>$upmodel->course_unit_id), 'class'=>'submit'));
?>

	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
