<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'languages_known_id'); ?>
		<?php echo $form->textField($model,'languages_known_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_known1'); ?>
		<?php echo $form->textField($model,'languages_known1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_known2'); ?>
		<?php echo $form->textField($model,'languages_known2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_known3'); ?>
		<?php echo $form->textField($model,'languages_known3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'languages_known4'); ?>
		<?php echo $form->textField($model,'languages_known4'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->