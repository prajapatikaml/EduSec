<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_user_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_employee_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_employee_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_emp_address_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_emp_address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_branch_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_category_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_category_id'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'employee_transaction_religion_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_shift_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_shift_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_designation_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_designation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_nationality_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_nationality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_department_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_department_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_organization_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_languages_known_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_languages_known_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_transaction_emp_photos_id'); ?>
		<?php echo $form->textField($model,'employee_transaction_emp_photos_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
