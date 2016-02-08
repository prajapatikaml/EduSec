
<?php
$this->breadcrumbs=array(
	'Generating Student Postal Label',
	
);

?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Generate Student Postal Label</span>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>
	<p class="note"><span class="required"></span> </p>
	
	<div class="row">
<p><b>Select field to display in PostalCard. </b></p>
</div>
<div class="row">
		<?php echo CHtml::label('Student Unique Id',''); ?>
		<?php echo CHtml::textField('roll_no', null);?><span class="status">&nbsp;</span>&nbsp;&nbsp;
		
	</div>
<div class="row">
	<input type="checkbox" name="stud_info[]" id="student_first_name" value="student_first_name" onClick="isChecked(this.value)"/>&nbsp;<label>Name </label>
</div>


<label>Address </label></br>
<div class="row" >
	<input type="radio" name="stud_info[]" id="student_address_c_line1" value="student_address_c_line1" />&nbsp;<label>Current Address </label>
	<input type="radio" name="stud_info[]" id="student_address_p_line1" value="student_address_p_line1" />&nbsp;<label>Permnent Address </label>
</div>


<label>Mobile No </label></br>
<div class="row" >
	<span id="hello">
	<input type="radio" name="stud_info[2]" id="student_mobile_no" value="student_mobile_no" />&nbsp;<label>Student Mobile No </label>
	<input type="radio" name="stud_info[2]" id="student_guardian_mobile" value="student_guardian_mobile"/>&nbsp;<label>Guardian Mobile No </label>
	</span>
</div>
<div class="row buttons">
	<?php echo CHtml::submitButton('Create', array('class'=>'submit','name'=>'search','tabindex'=>3)); ?>
</div>
<?php $this->endWidget(); ?>
</div>
</div>
