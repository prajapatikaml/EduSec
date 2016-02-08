<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_details_table_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_details_table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_details_table_emp_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_details_table_emp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_type_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_created_by'); ?>
		<?php echo $form->textField($model,'employee_certificate_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_creation_date'); ?>
		<?php echo $form->textField($model,'employee_certificate_creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_certificate_org_id'); ?>
		<?php echo $form->textField($model,'employee_certificate_org_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
