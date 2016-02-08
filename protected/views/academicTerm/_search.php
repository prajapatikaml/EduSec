<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'academic_term_id'); ?>
		<?php echo $form->textField($model,'academic_term_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_term_name'); ?>
		<?php echo $form->textField($model,'academic_term_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'academic_term_period_id'); ?>
		<?php echo $form->textField($model,'academic_term_period_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->