
<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>'Upload Photo',
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>450,
                'resizable'=>false,
                'draggable'=>false,
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("employee/employeeTransaction/update?id=".$_REQUEST['id']).'"; }'
	),
));
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-photos-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array(
			'validateOnSubmit'=>false,
			)
)); ?>


	<?php echo $form->error($model,'employee_photos_path'); ?>
	<div class="row">
	      <?php echo $form->labelEx($model,'employee_photos_path'); ?>
	      <?php echo $form->fileField($model, 'employee_photos_path',array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
	      
   	 </div>
	 <div class="row buttons">
		<?php echo CHtml::submitButton('Update',array('class'=>'submit')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
