<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Fill Details</span>
 </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'certificate-form',
	'enableAjaxValidation'=>true,
	//'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'certificate_title'); ?>
		<?php echo $form->textField($model,'certificate_title'); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'certificate_title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'certificate_type'); ?>
		<?php echo $form->dropdownList($model,'certificate_type',array(""=>"Select","Student"=>"Student","Employee"=>"Employee")); ?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'certificate_type'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'certificate_content'); ?>
		<?php echo $form->error($model,'certificate_content'); ?>
		<?php //echo $form->textArea($model,'certificate_content',array('size'=>60,'maxlength'=>5000,'rows'=>10)); ?><span class="status">&nbsp;</span><br><br>
		<?php  $this->widget('application.extensions.ckeditor.CKEditor', array(
		'model'=>$model,
		'attribute'=>'certificate_content',
		'language'=>'english',
		'editorTemplate'=>'full',
		)); ?>		
	</div>	
	<p class="hint" style="color:red"><b> 
			Hint For Student Type:
			use following keywords for contents</br>
			Title = {title},
			Student name={name},
			Gender={gender},
			Mobile={smobile},
			Parent Mobile={pmobile},
			Current Date={date},
			Address Line1={line1},
			Address Line2={line2},
			Current City={city},
			Current State={state},			
			Permanent Address ={paddress}
			Permanent City={pcity},
			Permanent State={pstate},
			Photo ={photo},				
			Pincode={pin},
	</b></p>
	<p class="hint" style="color:red"><b> 
			Hint For Employee Type:
			use following keywords for contents</br>
			Title = {title},
			Employee name={name},
			Attendence Card No={attendencecardno},
			Gender={gender},
			Department={department},
			Designation={designation},
			Mobile ={emobile},
			Current Date={date},
			Address Line1={line1},
			Address Line2={line2},
			City={city},
			State={state},
			Pincode={pin},
			Photo={photo},			
	</b></p>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
