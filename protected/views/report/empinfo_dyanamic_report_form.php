<script>
$(function () {
    $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });
});
</script>
<?php
$this->breadcrumbs=array('Report' => array(),
	'Employee Info',
	
);?>

<h1> Employee Report </h1>

<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Select criteria
 </div>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>true,

)); ?>
	<div class="row">
	   <div class="row-left">
		<?php echo CHtml::label('Department',''); ?>
		<?php echo CHtml::dropDownList('department', null, Department::items(), array('empty' => 'Select Department','tabindex'=>1));?>
	   </div>
	   <div class="row-right">   
		<?php echo CHtml::label('Gender',''); ?>
		<?php echo CHtml::dropDownList('gender', null, EmployeeInfo::getGenderOptions(), array('empty' => 'Select Gender','tabindex'=>4));?>
	   </div>
	</div>

	<div class="row">
	  <div class="row-left">
		<?php echo CHtml::label('City',''); ?>
		<?php echo CHtml::dropDownList('city', null, City::items(), array('empty' => 'Select City','tabindex'=>2));?><span class="status">&nbsp;</span>
	   </div>

	   <div class="row-right">
		<?php echo CHtml::label('Blood Group',''); ?>
		<?php echo CHtml::dropDownList('bg', null, EmployeeInfo::getBloodGroup(), array('empty' => 'Select Blood Group','tabindex'=>3));?>
	   </div>
	</div>
</div>
</div>

	<div class="dynamic-report-form">
<?php		
	
		echo $this->renderPartial('employee_criteria_selection_form', array('query'=>$query));
?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit',  'style'=>'margin-left: 0; margin-top: 18px;')); ?>
	</div>

<?php $this->endWidget(); ?>	

