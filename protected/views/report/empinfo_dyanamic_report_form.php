<?php
$this->breadcrumbs=array('Report',
	'Employee Info',
	
);?>

<div class="portlet box blue">
 <div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Select Criterias</span>
</div>

<div class="dynamic-report-form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>true,

)); ?>
	<div class="row">
		<?php echo CHtml::label('Department',''); ?>
		<?php echo CHtml::dropDownList('department', null, Department::items(), array('empty' => 'Select Department','tabindex'=>1));?>

		<?php echo CHtml::label('Gender',''); ?>
		<?php echo CHtml::dropDownList('gender', null, EmployeeInfo::getGenderOptions(), array('empty' => 'Select Gender','tabindex'=>2));?>
	</div>

	<div class="row">
		<?php echo CHtml::label('City',''); ?>
		<?php echo CHtml::dropDownList('city', null, City::items(), array('empty' => 'Select City','tabindex'=>3));?>
<span class="status">&nbsp;</span>
		<?php echo CHtml::label('Blood Group',''); ?>
		<?php echo CHtml::dropDownList('bg', null, EmployeeInfo::getBloodGroup(), array('empty' => 'Select Blood Group','tabindex'=>4));?>

	</div>

	<div class="row">
		<?php echo CHtml::label('Type',''); ?>
		<?php echo CHtml::dropDownList('typ', null, array("1"=>"Teaching","0"=>"Non Teaching"), array('empty' => 'Select Type','tabindex'=>5));?>
	</div>


		
</div>

	<div class="dynamic-report-form">
<?php		
	
		echo $this->renderPartial('employee_criteria_selection_form', array('query'=>$query));
?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit', array('class'=>'submit')); ?>
	</div>

<?php $this->endWidget(); ?>	
</div>
