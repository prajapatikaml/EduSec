<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_id'); ?>
		<?php echo $form->textField($model,'academic_terms_period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_name'); ?>
		<?php echo $form->textField($model,'academic_terms_period_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_term_period'); ?>
		<?php echo $form->textField($model,'academic_term_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_start_date'); ?>
		<?php echo $form->textField($model,'academic_terms_period_start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_end_date'); ?>
		<?php echo $form->textField($model,'academic_terms_period_end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_organization_id'); ?>
		<?php echo $form->textField($model,'academic_terms_period_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_created_by'); ?>
		<?php echo $form->textField($model,'academic_terms_period_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_terms_period_creation_date'); ?>
		<?php echo $form->textField($model,'academic_terms_period_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->