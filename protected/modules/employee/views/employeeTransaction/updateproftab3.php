<style>
#EmployeeAddress_employee_address_c_line1,
#EmployeeAddress_employee_address_c_line2{
   width:500px;
}
</style>
<?php
$this->breadcrumbs=array(
	'Employee List'=>array('admin'),
	'Update Details',
);?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title">Update Details
 </div>

<div class="profile-tab profile-edit ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible">

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Personal Profile', array('updateTab1', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
   <?php echo CHtml::link('Address Info', array('updateprofiletab3', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Academic Record', array('EmployeeAcademicRecords', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
   <?php echo CHtml::link('Document', array('Employeedocs', 'id'=>$_REQUEST['id'])); ?></li>
</ul>

</ul>

<div class="ui-tabs-panel form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'focus'=>array($info,'employee_attendance_card_id'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

<div class="row">
	 <?php echo $form->labelEx($address,'employee_address_c_line1'); ?>
	 <?php echo $form->textField($address,'employee_address_c_line1',array('size'=>59,'maxlength'=>100,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_line1'); ?>
</div>

   
<div class="row">
	 <?php echo $form->labelEx($address,'employee_address_c_line2'); ?>
	 <?php echo $form->textField($address,'employee_address_c_line2',array('size'=>59,'maxlength'=>100,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_line2'); ?>
</div>

<div class="row">

	<div class="row-right">
	 <?php echo $form->labelEx($address,'employee_address_c_country'); ?>
	 <?php echo $form->dropDownList($address,'employee_address_c_country' ,Country::items(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>3,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateEmpCStates'), 
			'update'=>'#EmployeeAddress_employee_address_c_state', //selector to update
			
			))); 
	 ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_country'); ?>
   	</div>

	<div class="row-left">
	 <?php echo $form->labelEx($address,'employee_address_c_state'); ?>
	 <?php 
			if(isset($address->employee_address_c_state))
			echo $form->dropDownList($address,'employee_address_c_state', CHtml::listData(State::model()->findAll(array('condition'=>'country_id='.$address->employee_address_c_country)), 'state_id', 'state_name'),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>4,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
			'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
			)));
			else	
			echo $form->dropDownList($address,'employee_address_c_state',array(),
			array(
			'prompt' => '-----------Select-----------','tabindex'=>4,
			'ajax' => array(
			'type'=>'POST', 
			'url'=>CController::createUrl('dependent/UpdateEmpCCities'), 
			'update'=>'#EmployeeAddress_employee_address_c_city', //selector to update
			
			)));?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_state'); ?>
   	</div>


</div>

<div class="row last">

	<div class="row-left">
	 <?php echo $form->labelEx($address,'employee_address_c_city'); ?>
	 <?php 
		if(isset($address->employee_address_c_city))
		echo $form->dropDownList($address,'employee_address_c_city', CHtml::listData(City::model()->findAll(array('condition'=>'state_id='.$address->employee_address_c_state)), 'city_id', 'city_name'));
		else
		echo $form->dropDownList($address,'employee_address_c_city',array('empty' => '-----------Select---------','tabindex'=>5)); ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_city'); ?>
   	</div>

	<div class="row-right">
	 <?php echo $form->labelEx($address,'employee_address_c_pincode'); ?>
	 <?php echo $form->textField($address,'employee_address_c_pincode',array('size'=>18,'maxlength'=>6,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
	 <?php echo $form->error($address,'employee_address_c_pincode'); ?>
   	</div>
</div>
	<div class="row buttons last">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save',array('class'=>'submit')); 
		?>
		<?php echo CHtml::link('Cancel', array('admin'), array('class'=>'btnCan')); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
</div>
</div>
