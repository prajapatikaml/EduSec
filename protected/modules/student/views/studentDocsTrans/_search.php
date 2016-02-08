<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'student_docs_trans_id'); ?>
		<?php echo $form->textField($model,'student_docs_trans_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_docs_trans_user_id'); ?>
		<?php echo $form->textField($model,'student_docs_trans_user_id',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'student_docs_trans_stud_docs_id'); ?>
		<?php echo $form->textField($model,'student_docs_trans_stud_docs_id',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->