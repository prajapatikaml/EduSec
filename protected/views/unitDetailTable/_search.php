<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_id'); ?>
		<?php echo $form->textField($model,'unit_detail_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_unit_master_id'); ?>
		<?php echo $form->textField($model,'unit_detail_unit_master_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_course_id'); ?>
		<?php echo $form->textField($model,'unit_detail_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_title'); ?>
		<?php echo $form->textField($model,'unit_detail_title',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_desc'); ?>
		<?php echo $form->textArea($model,'unit_detail_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_created_by'); ?>
		<?php echo $form->textField($model,'unit_detail_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit_detail_creation_date'); ?>
		<?php echo $form->textField($model,'unit_detail_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->