
<?php
$this->breadcrumbs=array(
	'Generating Student Postal Label',
	
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('IdcardFieldFormat/create'),'linkOptions'=>array('class'=>'Create','title'=>'Generate Id Format')),

);


?>
<h1>Generating Student Postal Label</h1>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'studentinfo-form',
	'enableAjaxValidation'=>true,

)); ?>
	<p class="note"><span class="required"></span> </p>
	
	<div class="row">
		<?php echo CHtml::label('Term Period',''); ?>
		<?php echo CHtml::dropDownList('acdm_period', null, AcademicTermPeriod::items(),
		array(
			'prompt' => '---------------Select-------------','tabindex'=>1,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getIdAcademicterm'), 
			'update'=>'#acdm_name', //selector to update
			
			))); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Term Name',''); ?>
		<?php echo CHtml::dropDownList('acdm_name', null, array('empty' => '---------------Select-------------'),array('tabindex'=>2));?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Branch',''); ?>
		<?php echo CHtml::dropDownList('branch_name', null, Branch::items(),
		array(
			'prompt' => '---------------Select-------------','tabindex'=>3,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/getIdDivision'), 
			'update'=>'#div_name', //selector to update
			
			))); ?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Division',''); ?>
		<?php echo CHtml::dropDownList('div_name', null, array('empty' => '---------------Select-------------'),array('tabindex'=>4));?>
	</div>
	<div class="row">
		<?php echo CHtml::label('Student Enroll No',''); ?>
		<?php echo CHtml::textField('enroll_no', null, array('empty' => '---------------Select-------------','tabindex'=>5));?><span class="status">&nbsp;</span>&nbsp;&nbsp;
		
	</div>
<div class="row">
<p><b>Select field to display in PostalCard. </b></p>
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
