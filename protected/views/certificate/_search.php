<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'certificate_id'); ?>
		<?php echo $form->textField($model,'certificate_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certificate_title'); ?>
		<?php echo $form->textField($model,'certificate_title',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certificate_content'); ?>
		<?php echo $form->textField($model,'certificate_content',array('size'=>60,'maxlength'=>5000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certificate_organization_id'); ?>
		<?php echo $form->textField($model,'certificate_organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certificate_created_by'); ?>
		<?php echo $form->textField($model,'certificate_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certificate_creation_date'); ?>
		<?php echo $form->textField($model,'certificate_creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->