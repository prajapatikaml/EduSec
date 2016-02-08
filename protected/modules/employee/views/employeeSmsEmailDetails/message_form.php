<?php
$this->breadcrumbs=array(
	'Compose Sms/Email'=>array('employeebulksmsemail'),
	'Send Sms/Email',
);?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-sms-email-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<div class="form">
<div class="portlet box yellow">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">Selected Employees</span>
</div>
<table  class="report-table">
	<tr class="table_header">
		<th>SI No.</th>
		<th>Name</th>
		<th>Attendence Card ID</th>
		<th>Private Mobile No</th>
		<th>Private Email</th>
		</tr>
	<?php	
	$i=1;
	$m=1;  
	foreach($list as $value)
	  {	
		if(($m%2) == 0)
		{
		  $class = "odd";
		}
		else
		{
		  $class = "even";
		}?>
	<tr class="<?php echo $class;?>">
	<?php echo '<input type="hidden" name="result[]" value="'. $value. '">';
	$info= EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$value));?>
	<td class="col2"> <?php echo $i ;?></td>
	<td class="col2"><?php echo $info->employee_first_name." ".$info->employee_last_name;?></td>
	<td class="col2"><?php echo $info->employee_attendance_card_id;?></td>
	<td class="col2"><?php echo $info->employee_private_mobile;?></td>
	<td class="col2"><?php echo $info->employee_private_email;?></td>

	</tr>
<?php	
	$i++;$m++;}

?>

</div></table></br>
</div>
<div class="portlet box blue" style="margin-top:20px;">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">SMS/Email</span>
</div>
</br>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email_sms_status'); ?>
		<?php $data = array('1'=>"SMS",'2'=>"EMAIL");
		$model->email_sms_status = 1;
		 echo $form->radioButtonList($model,'email_sms_status',$data,array('class'=>'radio', 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'email_sms_status'); ?>
	</div>	
	<div class="hint"><b>Hint:-&nbsp;For SMS message character limit is 160.</b></div>
	<div class="row">
		<?php echo $form->labelEx($model,'message_email_text'); ?>
		<?php echo $form->textArea($model,'message_email_text',array('rows'=>6, 'cols'=>50,'maxlength'=>160)); ?><span class="status">&nbsp;</span>
		<?php echo $form->error($model,'message_email_text'); ?>
	</div>
</div><!-- form -->	
	<div class="row buttons">
		<?php echo CHtml::button('Send', array('class'=>'submit','submit' => array('DoChacked'),'id'=>'send-emp-sms')); ?>
		<?php echo CHtml::link('Cancel', array('employeebulksmsemail'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>
</div>


