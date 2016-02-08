<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_registration_academic_id'); ?>
		<?php echo $form->textField($model,'student_registration_academic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'examination'); ?>
		<?php echo $form->textField($model,'examination',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_of_passing'); ?>
		<?php echo $form->textField($model,'year_of_passing',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name_of_board'); ?>
		<?php echo $form->textField($model,'name_of_board',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medium'); ?>
		<?php echo $form->textField($model,'medium',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'class_obtained'); ?>
		<?php echo $form->textField($model,'class_obtained',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marks_obtained'); ?>
		<?php echo $form->textField($model,'marks_obtained'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marks_out_of'); ?>
		<?php echo $form->textField($model,'marks_out_of'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'percentage'); ?>
		<?php echo $form->textField($model,'percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_registration_id'); ?>
		<?php echo $form->textField($model,'student_registration_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->