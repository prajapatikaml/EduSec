<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_id'); ?>
		<?php echo $form->textField($model,'employee_experience_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_organization_name'); ?>
		<?php echo $form->textField($model,'employee_experience_organization_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_designation'); ?>
		<?php echo $form->textField($model,'employee_experience_designation',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_from'); ?>
		<?php echo $form->textField($model,'employee_experience_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_experience_to'); ?>
		<?php echo $form->textField($model,'employee_experience_to'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->