<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_id'); ?>
		<?php echo $form->textField($model,'student_transaction_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_user_id'); ?>
		<?php echo $form->textField($model,'student_transaction_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_student_id'); ?>
		<?php echo $form->textField($model,'student_transaction_student_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_branch_id'); ?>
		<?php echo $form->textField($model,'student_transaction_branch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_category_id'); ?>
		<?php echo $form->textField($model,'student_transaction_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_organization_id'); ?>
		<?php echo $form->textField($model,'student_transaction_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_student_address_id'); ?>
		<?php echo $form->textField($model,'student_transaction_student_address_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_nationality_id'); ?>
		<?php echo $form->textField($model,'student_transaction_nationality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_quota_id'); ?>
		<?php echo $form->textField($model,'student_transaction_quota_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_religion_id'); ?>
		<?php echo $form->textField($model,'student_transaction_religion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_shift_id'); ?>
		<?php echo $form->textField($model,'student_transaction_shift_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_languages_known_id'); ?>
		<?php echo $form->textField($model,'student_transaction_languages_known_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_student_photos_id'); ?>
		<?php echo $form->textField($model,'student_transaction_student_photos_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_division_id'); ?>
		<?php echo $form->textField($model,'student_transaction_division_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_transaction_batch_id'); ?>
		<?php echo $form->textField($model,'student_transaction_batch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_academic_term_period_tran_id'); ?>
		<?php echo $form->textField($model,'student_academic_term_period_tran_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->