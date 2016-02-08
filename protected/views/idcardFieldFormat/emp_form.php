<?php
$this->breadcrumbs=array(
	'ID Card Field Formats'=>array('admin'),
	'Generate',
);?>
<div class="form">
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Employee Id Card Template Generate</span>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'idcard-field-format-form-emp',
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

<?php	 if(Yii::app()->user->hasFlash('maxcount')) {?>
	<div class="flash-error">
		<?php echo Yii::app()->user->getFlash('maxcount');
		
	 ?>
		
	</div>
<?php } ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	
	<!--<div class="row">
		<?php echo $form->labelEx($model,'stud_emp_type'); ?>
		<?php echo $form->dropDownList($model,'stud_emp_type',array('empty'=>'------Select------','Student'=>'Student','Employee'=>'Employee')); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'stud_emp_type'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'idtemplate_name'); ?>
		<?php echo $form->textField($model,'idtemplate_name',array('size'=>50,'maxlength'=>50)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'idtemplate_name'); ?>
	</div>

<div class="row">
	<p><b>Select Checkbox in which order you want to display in ID Card. </b></p>
	<p><b>Enter Label Name in Textbox which you want to display in ID Card.</b></p>
	<p><b>User can select only 4 Field For ID Card.</b></p>
</div>

<div id="field">

	<div class="row">
	<input type="checkbox" name="emp_info[0]" id="employee_attendance_card_id" value="employee_attendance_card_id" /> &nbsp;<label>Employee Card ID No</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>	

	<div class="row">
	<input type="checkbox" name="emp_info[1]" id="employee_first_name" value="employee_first_name" /> &nbsp;<label>Name</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>
	 	

	<div class="row">
	<input type="checkbox" name="emp_info[2]" id="employee_faculty_of" value="employee_faculty_of" /> &nbsp;<label>Faculty Of</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[3]" id="department_name" value="department_name" /> &nbsp;<label>Department</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[4]" id="employee_designation" value="employee_designation" />&nbsp;<label>Designation</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[5]" id="employee_bloodgroup" value="employee_bloodgroup" /> &nbsp;<label>Blood Group</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[6]" id="employee_gender" value="employee_gender" /> &nbsp;<label>Gender</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[7]" id="employee_dob", value="employee_dob" />&nbsp;<label>Birthdate</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[8]" id="employee_joining_date", value="employee_joining_date" />&nbsp;<label>Joining Date</label>
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[9]" id="employee_private_mobile", value="employee_private_mobile" />&nbsp;<label>Mobile No</label> 
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>

	<div class="row">
	<input type="checkbox" name="emp_info[10]" id="employee_private_email" value="employee_private_email" />&nbsp;<label>Email-ID</label> 
	<input type="text" name="emp_info_name[]"/>
	<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
	</div>
<div class="">
<label>Address </label>
<input type="text" name="emp_info_name[11]"/>
<?php echo CHtml::dropDownList('Proprity[]',null,array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>'6'),array('empty'=>'Select Priority'));?>
</div>
<div class="row" >
	<input type="radio" name="emp_info[11]" id="employee_address_c_line1" value="employee_address_c_line1" />&nbsp;<label>Current Address </label>
	<input type="radio" name="emp_info[11]" id="employee_address_p_line1" value="employee_address_p_line1" />&nbsp;<label>Permnent Address </label>
</div>
</div>


<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Generate' : 'Save',array('class'=>'submit')); ?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
