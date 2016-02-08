<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'user_organization_email_id'); ?>
		<?php echo $form->textField($model,'user_organization_email_id',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<!--<div class="row">
		<?php echo $form->label($model,'user_created_by'); ?>
		<?php echo $form->textField($model,'user_created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_creation_date'); ?>
		<?php echo $form->textField($model,'user_creation_date'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
