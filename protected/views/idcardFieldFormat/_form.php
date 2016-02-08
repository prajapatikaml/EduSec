<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Student Id Card Template Generate</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'idcard-field-format-form-stud',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),	
)); ?>

<?php
   Yii::app()->clientScript->registerScript(
  'myHideEffect1',
  '$(".flash-error").animate({opacity: 1.0}, 2000).fadeOut("slow");',
CClientScript::POS_READY
);
?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
<?php	 if(Yii::app()->user->hasFlash('maxcount')) {?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('maxcount'); ?>
	</div>
<?php } ?>	
	<div class="row">
		<?php echo $form->labelEx($model,'idtemplate_name'); ?>
		<?php echo $form->textField($model,'idtemplate_name',array('size'=>50,'maxlength'=>50)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'idtemplate_name'); ?>
	</div>

<div class="row">

<p><b>Select Checkbox in which order you want to display in ID Card.</b></p>
<p><b>Enter Label Name in Textbox which you want to display in ID Card.</b></p>
<p><b>User can select only 4 Field For ID Card.</b></p>
</div>
<div id="field">

	<div class="row">
	<input type="checkbox" name="stud_info[0]" id="student_enroll_no" value="student_enroll_no" onClick="isChecked(this.value)"/>&nbsp;<label>Enrollment Number </label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>
	<div class="row">
	<input type="checkbox" name="stud_info[1]" id="student_roll_no" value="student_roll_no" />&nbsp;<label>Roll Number </label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>
	 	
	<div class="row">
	<input type="checkbox" name="stud_info[2]" id="student_merit_no" value="student_merit_no" />&nbsp;<label>Merit Number</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[3]" id="student_gr_no" value="student_gr_no" />&nbsp;<label>G.R. No</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[4]" id="student_first_name" value="student_first_name" /> &nbsp;<label>Name</label>
	<input type="text" name="stud_info_name[]" />
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[5]" id="quota_name" value="quota_name" /> &nbsp;<label>Quota</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[6]" id="sem" value="sem" /> &nbsp;<label>Semester</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[7]" id="branch_name" value="branch_name" /> &nbsp;<label>Branch Name</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[8]" id="division_code" value="division_code" /> &nbsp;<label>Division Name</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>

	<div class="row">
	<input type="checkbox" name="stud_info[9]" id="student_bloodgroup" value="student_bloodgroup" /> &nbsp;<label>Blood Group</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>


	<div class="row">
	<input type="checkbox" name="stud_info[10]" id="student_guardian_mobile" value="student_guardian_mobile" /> &nbsp;<label>Guardian Mobile</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>
 	
	<div class="row">
	<input type="checkbox" name="stud_info[11]" id="student_gender" value="student_gender" /> &nbsp;<label>Gender</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="stud_info[12]" id="student_dob", value="student_dob" />&nbsp;<label>Birthdate</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>


	<div class="row">
	<input type="checkbox" name="stud_info[13]" id="student_guardian_phoneno" value="student_guardian_phoneno" /> &nbsp;<label>Phone No</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="stud_info[14]" id="student_mobile_no", value="student_mobile_no" />&nbsp;<label>Mobile No </label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>
 	
	<div class="row">
	<input type="checkbox" name="stud_info[15]" id="student_email_id_1" value="student_email_id_1" />&nbsp;<label>College Email-ID</label>
	<input type="text" name="stud_info_name[]"/> 
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="stud_info[16]" id="student_email_id_2" value="student_email_id_2" />&nbsp;<label>Email-ID</label>
	<input type="text" name="stud_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5),array('empty'=>'Select Priority'));?>
	</div>
	</br>
</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generate' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
