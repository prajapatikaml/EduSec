<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'doc_category_id'); ?>
		<?php echo $form->textField($model,'doc_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc_category_name'); ?>
		<?php echo $form->textField($model,'doc_category_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docs_category_organization_id'); ?>
		<?php echo $form->textField($model,'docs_category_organization_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->