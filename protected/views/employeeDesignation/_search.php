<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'employee_designation_id'); ?>
		<?php echo $form->textField($model,'employee_designation_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'employee_designation_name'); ?>
		<?php echo $form->textField($model,'employee_designation_name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_designation_organization_id'); ?>
		<?php echo $form->textField($model,'employee_designation_organization_id'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'employee_designation_created_by'); ?>
		<?php echo $form->textField($model,'employee_designation_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_designation_created_date'); ?>
		<?php echo $form->textField($model,'employee_designation_created_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
