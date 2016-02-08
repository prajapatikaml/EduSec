<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_trans_id'); ?>
		<?php echo $form->textField($model,'employee_experience_trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_trans_user_id'); ?>
		<?php echo $form->textField($model,'employee_experience_trans_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_trans_emp_experience_id'); ?>
		<?php echo $form->textField($model,'employee_experience_trans_emp_experience_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->