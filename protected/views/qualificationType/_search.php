<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'qualification_type_id'); ?>
		<?php echo $form->textField($model,'qualification_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualification_type_name'); ?>
		<?php echo $form->textField($model,'qualification_type_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualification_type_desc'); ?>
		<?php echo $form->textField($model,'qualification_type_desc',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualification_type_created_by'); ?>
		<?php echo $form->textField($model,'qualification_type_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualification_type_creation_date'); ?>
		<?php echo $form->textField($model,'qualification_type_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->