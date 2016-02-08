<style>
.submit {
    background-color: #4D90FE;
    color: white;
    cursor: pointer;
    height: 40px;
    line-height: 30px;
    margin-left: 40px;
    width: 80px;
    margin-top:100px;
}
</style>
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


	<?php echo $form->error($model,'student_photos_path'); ?>
	<div class="row">
	   <div class="row-left">
	      <?php echo $form->labelEx($model,'student_photos_path'); ?>
	      <?php echo $form->fileField($model, 'student_photos_path',array('tabindex'=>1)); ?><span class="status">&nbsp;</span>
	   </div>
   	 </div>
</div><!-- form -->
	 <div class="row buttons" style="margin-bottom:10px;">
		<?php echo CHtml::submitButton('Update',array('class'=>'submit')); ?>
	</div>
<?php $this->endWidget(); ?>
</div>

