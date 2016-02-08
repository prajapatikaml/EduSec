<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Add Holiday',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>450,
                'resizable'=>false,
                'draggable'=>false,
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("/dashboard").'"; }'
	),
));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'national-holidays-form',
	'enableAjaxValidation'=>true,
	 //'clientOptions'=>array('validateOnSubmit'=>true),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'national_holiday_name'); ?>
		<?php echo $form->textField($model,'national_holiday_name',array('size'=>20,'maxlength'=>30,'tabindex'=>2)); ?>
		<?php echo $form->error($model,'national_holiday_name'); ?><span class="status">&nbsp;</span>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'national_holiday_remarks'); ?>
		<?php echo $form->textField($model,'national_holiday_remarks',array('size'=>20,'tabindex'=>3,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'national_holiday_remarks'); ?><span class="status">&nbsp;</span>
	</div>

  <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save', array('class'=>'submit','tabindex'=>4)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
