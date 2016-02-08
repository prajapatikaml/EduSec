<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!--<div class="row">
		<?php echo $form->label($model,'role_master_id'); ?>
		<?php echo $form->textField($model,'role_master_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->label($model,'role_master_name'); ?>
		<?php echo $form->textField($model,'role_master_name',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
