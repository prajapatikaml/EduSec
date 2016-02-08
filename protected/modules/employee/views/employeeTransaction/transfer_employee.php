<style>
#employee-transaction-form{
   margin-top:20px;
}
div.form fieldset {
    border: 1px solid #3B5998;
    border-radius: 10px 10px 10px 10px;
    width:77%;
}
legend {
    color:#3B5998;  
    font-size:14px;
    font-weight:bold;
}
</style>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-transaction-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); 

?><p class="note">Fields with <span class="required">*</span> are required.</p>
<fieldset>
	<legend>Transfer Employee</legend>
	
<div class="row">
		<?php echo $form->labelEx($info,'employee_first_name'); ?>
		<?php 
		$this->widget('CAutoComplete',array(		
             'name'=>'EmployeeInfo_employee_guardian_occupation', 
	      'id'=>'EmployeeInfo_employee_guardian_occupation', 
             'url'=>CController::createUrl('Dependent/autocompletelookup'), 
             'minChars'=>1, 
             'delay'=>100, //number of milliseconds before lookup occurs
             'matchCase'=>false, //match case when performing a lookup?
             'methodChain'=>".result(function(event,item){\$(\"#user_id1\").val(item[1]);})",
             ));
    ?> <span class="status">&nbsp;</span>
	      <?php echo $form->error($info,'employee_guardian_occupation'); ?><?php echo CHtml::hiddenField('user_id1'); ?>
	
</div>

<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_organization_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_organization_id',CHtml::listData(Organization::model()->findAll(array('condition'=>'organization_id <>'.Yii::app()->user->getState('org_id'))),'organization_id','organization_name'), 					
					array(
					'prompt' => 'Select Organization',
					'ajax' => array(
					'type'=>'POST', 
					'url'=>CController::createUrl('dependent/gettransferempdata'),			
					'dataType'=>'json',
					'success'=>'function(data) {
				
	 $("#EmployeeTransaction_employee_transaction_designation_id").html(data.des);
	 $("#EmployeeTransaction_employee_transaction_department_id").html(data.dep);
	 $("#EmployeeTransaction_employee_transaction_shift_id").html(data.shf);
				
				        }',
					))); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_organization_id'); ?>
	</div>
	<div class="row-right">
		   <?php echo $form->labelEx($info,'employee_private_email'); ?>
		   <?php echo $form->textField($user,'user_organization_email_id',array('size'=>13)); ?><span class="status">&nbsp;</span>
		   <?php echo $form->error($user,'user_organization_email_id'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_designation_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_designation_id',array(), array('empty' => 'Select Designation')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_designation_id'); ?>
	</div>
	<div class="row-right">
		<?php echo $form->labelEx($info,'employee_type'); ?>
		<?php echo $form->dropDownList($info,'employee_type',array(""=>"Select Type","1"=>"Teaching","0"=>"Non Teaching")); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($info,'employee_type'); ?>
	</div>
</div>
<div class="row">
	<div class="row-left">
	      <?php echo $form->labelEx($model,'employee_transaction_department_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_department_id',array(), array('empty' => 'Select Department')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_department_id'); ?>
	</div>
	<div class="row-right">
	      <?php echo $form->labelEx($model,'employee_transaction_shift_id'); ?>
	      <?php echo $form->dropDownList($model,'employee_transaction_shift_id',array(), array('empty' => 'Select Shift')); ?><span class="status">&nbsp;</span>
	      <?php echo $form->error($model,'employee_transaction_shift_id'); ?>
	</div>
</div>


<div class="row buttons">
		<?php echo CHtml::submitButton('Transfer', array('class'=>'submit', 'confirm'=>'Are you sure you want to transafer this employee?')); ?>
	
</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->

