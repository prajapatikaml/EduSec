<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_academic_record_trans_id'); ?>
		<?php echo $form->textField($model,'student_academic_record_trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_academic_record_trans_user_id'); ?>
		<?php echo $form->textField($model,'student_academic_record_trans_stud_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_academic_record_trans_qualification_id'); ?>
		<?php echo $form->textField($model,'student_academic_record_trans_qualification_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_academic_record_trans_eduboard_id'); ?>
		<?php echo $form->textField($model,'student_academic_record_trans_eduboard_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_academic_record_trans_record_trans_year_id'); ?>
		<?php echo $form->textField($model,'student_academic_record_trans_record_trans_year_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theory_mark_obtained'); ?>
		<?php echo $form->textField($model,'theory_mark_obtained'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theory_mark_max'); ?>
		<?php echo $form->textField($model,'theory_mark_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'theory_percentage'); ?>
		<?php echo $form->textField($model,'theory_percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'practical_mark_obtained'); ?>
		<?php echo $form->textField($model,'practical_mark_obtained'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'practical_mark_max'); ?>
		<?php echo $form->textField($model,'practical_mark_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'practical_percentage'); ?>
		<?php echo $form->textField($model,'practical_percentage'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
