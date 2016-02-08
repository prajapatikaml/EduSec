<style>
#EmployeeInfo_employee_guardian_home_address{
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
<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active">
  <?php echo CHtml::link('Gaurdian Info', array('updateprofiletab2', 'id'=>$_REQUEST['id'])); ?></li>
<li class="ui-state-default ui-corner-top">
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
	'focus'=>array($info,'employee_guardian_name'),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<div class="row">
	     <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_name'); ?>
              <?php echo $form->textField($info,'employee_guardian_name',array('size'=>18,'maxlength'=>100,'tabindex'=>1)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_name'); ?>
	     </div>

             <div class="row-right">
	      <?php echo $form->labelEx($info,'employee_guardian_relation'); ?>
              <?php echo $form->textField($info,'employee_guardian_relation',array('size'=>18,'maxlength'=>20,'tabindex'=>2)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_relation'); ?>
	     </div>
</div>

<div class="row">

               <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_occupation'); ?>
              <?php echo $form->textField($info,'employee_guardian_occupation',array('size'=>18,'maxlength'=>50,'tabindex'=>4)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_occupation'); ?>
	      </div>

               <div class="row-right">
              <?php echo $form->labelEx($info,'employee_guardian_income'); ?>
              <?php echo $form->textField($info,'employee_guardian_income',array('size'=>18,'maxlength'=>15,'tabindex'=>5)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_income'); ?>
	      </div>
</div>

<div class="row">
	      <?php echo $form->labelEx($info,'employee_guardian_home_address'); ?>
              <?php echo $form->textField($info,'employee_guardian_home_address',array('size'=>59,'maxlength'=>100,'tabindex'=>6)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_home_address'); ?>
</div>


<div class="row last">
             <div class="row-left">           
	      <?php echo $form->labelEx($info,'employee_guardian_mobile1'); ?>
              <?php echo $form->textField($info,'employee_guardian_mobile1',array('size'=>18,'maxlength'=>15,'tabindex'=>10)); ?><span class="status">&nbsp;</span>
              <?php echo $form->error($info,'employee_guardian_mobile1'); ?>
	     </div>
             <div class="row-left">
	      <?php echo $form->labelEx($info,'employee_guardian_phone_no'); ?>
	      <?php echo $form->textField($info,'employee_guardian_phone_no',array('size'=>18,'maxlength'=>15,'tabindex'=>12)); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_guardian_phone_no'); ?>
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
