<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'course_unit_id'); ?>
		<?php echo $form->textField($model,'course_unit_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_master_id'); ?>
		<?php echo $form->textField($model,'course_unit_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_ref_code'); ?>
		<?php echo $form->textField($model,'course_unit_ref_code',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_name'); ?>
		<?php echo $form->textField($model,'course_unit_name',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_level'); ?>
		<?php echo $form->textField($model,'course_unit_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_credit'); ?>
		<?php echo $form->textField($model,'course_unit_credit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_hours'); ?>
		<?php echo $form->textField($model,'course_unit_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_created_by'); ?>
		<?php echo $form->textField($model,'course_unit_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_unit_creation_date'); ?>
		<?php echo $form->textField($model,'course_unit_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->