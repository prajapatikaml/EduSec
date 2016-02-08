<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Upload Photo</span>
 </div>
<div class="operation">
<?php echo CHtml::link('<i class="fa fa-angle-double-left"></i> Back', array('update','id'=>$_REQUEST['id']), array('class'=>'btnyellow'));?>
</div>
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
</div><!-- form -->
	 <div class="row buttons">
		<?php echo CHtml::submitButton('Update',array('class'=>'submit')); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
