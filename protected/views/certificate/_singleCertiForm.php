<div class="portlet box blue" style="width:40%;margin-left:5%;height:400px;">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Print Single Certificate</span>
</div>
 <div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'single-certificate-form',
	'enableAjaxValidation'=>true,	
	'clientOptions'=>array('validateOnSubmit'=>false),
)); ?>
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('no-student-found'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EnrollmentNo'); ?>
		 <?php echo $form->textField($model,'EnrollmentNo');?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'EnrollmentNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'certificatetype'); ?>
		 <?php echo $form->dropDownList($model,'certificatetype',Certificate::items(),array('empty'=>'Select Type'));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'certificatetype'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Print On'); ?>
		<?php $p_arr = array('1'=>"Counterfoil", '2'=>"Letter Pad")?>
		 <?php  echo CHtml::radioButtonList('print_on',1,$p_arr,array( 'labelOptions'=>array('style'=>'display:inline;width:80px !important;margin-top:2px;'), 'template'=>"{input}{label}", 'separator'=>'&nbsp;&nbsp;&nbsp;')); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'certificatetype'); ?>
	</div>

	<div class="row buttons" style="margin-top: 50px;">
		<?php echo CHtml::submitButton('Generate',array('submit' => array('singleCertificate', 'type'=>'single'), 'class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?> 
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
</fieldset>
<div>
