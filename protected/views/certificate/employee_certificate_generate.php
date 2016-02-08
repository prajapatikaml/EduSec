<?php
$this->breadcrumbs=array(
	'Generate Employee Certificate',	
);

?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Fill Details</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificate-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
	<div class="block-error">
		<?php echo Yii::app()->user->getFlash('No-Employee-Found'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'attendenceno'); ?>
		<?php echo $form->textField($model,'attendenceno',array('size'=>13));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'attendenceno'); ?>
	</div>
	</br></br>
	<div class="row">
		<?php echo $form->labelEx($model,'certificatetype'); ?>
		 <?php echo $form->dropDownList($model,'certificatetype',Certificate::items1(),array('empty'=>'Select Type'));?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'certificatetype'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Generate', array('class'=>'submit'));
		 echo CHtml::link('Cancel', array('employee/employeeCertificateDetailsTable/admin'), array('class'=>'btnCan')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
