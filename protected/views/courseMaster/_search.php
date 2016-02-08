<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'course_master_id'); ?>
		<?php echo $form->textField($model,'course_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_name'); ?>
		<?php echo $form->textField($model,'course_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_category_id'); ?>
		<?php echo $form->textField($model,'course_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_level'); ?>
		<?php echo $form->textField($model,'course_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_completion_hours'); ?>
		<?php echo $form->textField($model,'course_completion_hours'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_code'); ?>
		<?php echo $form->textField($model,'course_code',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_cost'); ?>
		<?php echo $form->textField($model,'course_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_desc'); ?>
		<?php echo $form->textField($model,'course_desc',array('size'=>60,'maxlength'=>10000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_created_by'); ?>
		<?php echo $form->textField($model,'course_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_creation_date'); ?>
		<?php echo $form->textField($model,'course_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->