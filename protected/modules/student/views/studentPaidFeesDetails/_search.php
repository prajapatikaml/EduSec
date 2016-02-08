<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_paid_fees_id'); ?>
		<?php echo $form->textField($model,'student_paid_fees_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_paid_student_id'); ?>
		<?php echo $form->textField($model,'student_paid_student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_paid_course_id'); ?>
		<?php echo $form->textField($model,'student_paid_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_paid_amount'); ?>
		<?php echo $form->textField($model,'student_paid_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_paid_date'); ?>
		<?php echo $form->textField($model,'student_paid_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_paid_to'); ?>
		<?php echo $form->textField($model,'student_paid_to'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->