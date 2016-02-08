<?php        

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Define Role',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>300,
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
	),
));
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'role-master-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row1">
		<?php echo $form->labelEx($model,'role_master_name'); ?>
		<?php echo $form->textField($model,'role_master_name',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'role_master_name'); ?>
	</div>
<br/>
	<div class="row1 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
