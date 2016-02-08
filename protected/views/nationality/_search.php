<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'nationality_id'); ?>
		<?php echo $form->textField($model,'nationality_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'nationality_name'); ?>
		<?php echo $form->textField($model,'nationality_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nationality_organization_id'); ?>
		<?php echo $form->textField($model,'nationality_organization_id'); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'nationality_created_by'); ?>
		<?php echo $form->textField($model,'nationality_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nationality_created_date'); ?>
		<?php echo $form->textField($model,'nationality_created_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
