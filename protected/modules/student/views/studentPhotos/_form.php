<?php
/*$name = "Add Student Photos";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'mydialog',
	// additional javascript options for the dialog plugin
	'options'=>array(
		'title'=>$name,
		'autoOpen'=>true,
		'modal'=>true,	
                'height'=>'auto',
                'width'=>450,
                'resizable'=>false,
                'draggable'=>false,
		
		'close' => 'js:function(event, ui) { location.href = "'.Yii::app()->createUrl("studentTransaction/update").'"; }'
	),
));*/
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-photos-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); 
Yii::app()->clientScript->registerScript(
  'myHideEffect',
  '$(".flash-error").animate({opacity: 1.0}, 2000).fadeOut("slow");',
CClientScript::POS_READY
);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); 
if(Yii::app()->user->hasFlash('photo-save')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('photo-save');
		
	 ?>
		
	</div>
<?php } ?>
	<!--<div class="row">
		<?php echo $form->labelEx($model,'student_photos_desc'); ?>
		<?php echo $form->textField($model,'student_photos_desc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'student_photos_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_photos_path'); ?>
		<?php echo $form->textField($model,'student_photos_path',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'student_photos_path'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>-->
	<div class="row">
	      <?php echo $form->labelEx($model,'student_photos_path'); ?>
	      <?php echo $form->fileField($model, 'student_photos_path',array('tabindex'=>1)); ?>
	      <?php //echo $form->error($model,'student_photos_path'); ?>
   	 </div>
	<div class="hint"><b>Hint:-</b>&nbsp;Upload Only Jpeg, Jpg, Gif, Png Type Image</div>
	 <div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'submit')); 
		      echo CHtml::button('Update',array('class'=>'submit', 'submit'=>array('studentTransaction/update','id'=>$_REQUEST['id']), 'name'=>'photoupdate')); 
		      echo CHtml::button('Go Back',array('class'=>'submit', 'submit'=>array('studentTransaction/update','id'=>$_REQUEST['id']))); 
		?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
//$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
