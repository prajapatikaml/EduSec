<div class="form">
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'List of Organization',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>400,
                'resizable'=>false,
                'draggable'=>false,
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("student/studentRegistrationInfo/admin").'"; }'
	),
));
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hostel-fees-cash-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); 
?>
	<div class="row">
		<?php echo $form->labelEx($model,'organization_id'); ?><br>
		<?php echo $form->dropDownList($model, 'organization_id', CHtml::listData(Organization::model()->findAll(),'organization_id','organization_name'),array('empty'=>'Select College','onchange'=>'this.form.submit()')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
</div><!-- form -->
