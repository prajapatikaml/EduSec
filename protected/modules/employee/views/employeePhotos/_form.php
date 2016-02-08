<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-photos-form',
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

	<?php echo $form->errorSummary($model); ?>
<?php //echo $form->errorSummary($model); 
if(Yii::app()->user->hasFlash('photo-save')) { ?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('photo-save');
		
	 ?>
		
	</div>
<?php } ?>
	<!--<div class="row">
		<?php echo $form->labelEx($model,'employee_photos_desc'); ?>
		<?php echo $form->textField($model,'employee_photos_desc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'employee_photos_desc'); ?>
	</div>

<!--
	<div class="row">
		<?php echo $form->labelEx($model,'employee_photos_path'); ?>
		<?php echo $form->textField($model,'employee_photos_path',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'employee_photos_path'); ?>
	</div>


	<div class="row">
		<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
		<?php echo CHtml::activeFileField($model, 'employee_photos_path'); ?>
		<?php echo CHtml::endForm(); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>-->
	<div class="row">
	      <?php echo $form->labelEx($model,'employee_photos_path'); ?>
	 
	      <?php echo $form->fileField($model, 'employee_photos_path'); ?><span class="status">&nbsp;</span>
	     <?php echo $form->error($model,'employee_photos_path'); ?>
   	 </div>
	 <div class="hint"><b>Hint:-</b>&nbsp;Upload Only Jpeg, Jpg, Gif, Png Type Images</div>
	 <div class="row buttons">
		<?php 
		      echo CHtml::button('Update',array('class'=>'submit', 'submit'=>array('EmployeeTransaction/Updateprofilephoto','id'=>$_REQUEST['id']), 'name'=>'photoupdate')); 
		     // echo CHtml::button('Go Back',array('class'=>'submit', 'submit'=>array('EmployeeTransaction/update','id'=>$_REQUEST['id']))); 
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
