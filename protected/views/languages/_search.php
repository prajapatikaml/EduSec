<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'languages_id'); ?>
		<?php echo $form->textField($model,'languages_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'languages_name'); ?>
		<?php echo $form->textField($model,'languages_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_organization_id'); ?>
		<?php echo $form->textField($model,'languages_organization_id'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'languages_created_by'); ?>
		<?php echo $form->textField($model,'languages_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_created_date'); ?>
		<?php echo $form->textField($model,'languages_created_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
