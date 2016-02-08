<?php
$this->breadcrumbs=array(
	'Employee'=>array('admin'),
	'Daily Attendance email',
);?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-attendence-email-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
<div class="portlet box yellow">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title"> Selected Employees</span> 
</div>

<table  class="report-table"><th colspan="5" style="font-size: 18px; color: rgb(255, 255, 255);">
Selected Employees 
</th>
	<tr class="table_header">
		<th>SI No.</th>
		<th>Name</th>
		<th>Attendence Card ID</th>
		<th>Employee Private Mobile</th>
		<th>Employee Private Email</th>
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

</table></div>
<div class="portlet box blue"  style="margin-top:20px;">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title"> Fill Details</span>
</div>
<div class="portlet-body">
	<?php for($i=0;$i<60;$i++)
	{
		$minute[]=$i;
		
	}?>
	
	<?php for($i=0;$i<24;$i++)
	{
		$hour[]=$i;
	}?>
	<?php $minute[]="*";
	      $hour[]="*";
	?>

	<div class="row">
	    <?php echo $form->labelEx($model,'student_attendence_email_branch_id'); ?>
	    <?php echo $form->dropDownList($model, 'student_attendence_email_branch_id', Branch::items(),array('prompt' => 'Select Branch'));?>
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_attendence_email_branch_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_minute'); ?>
		<?php echo $form->dropDownList($model,'student_attendence_email_minute',$minute, array('empty' => 'Select Minute')); ?><span class="status">&nbsp;</span>
	
		<?php //echo $form->textField($model,'database_backup_cron_minute'); ?>
		<?php echo $form->error($model,'student_attendence_email_minute'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'student_attendence_email_hour'); ?>
		<?php echo $form->dropDownList($model,'student_attendence_email_hour',$hour, array('empty' => 'Select Hour')); ?><span class="status">&nbsp;</span>

		<?php //echo $form->textField($model,'database_backup_cron_hour'); ?>
		<?php echo $form->error($model,'student_attendence_email_hour'); ?>
	</div>
		<?php 
			if(Yii::app()->controller->action->id=="update")
			echo CHtml::button('Send', array('class'=>'submit','submit' => array('update','id'=>$model->student_attendence_email_id),'id'=>'send-emp-sms')); 
			else
			 echo CHtml::button('Send', array('class'=>'submit','submit' => array('EmployeeChecked'),'id'=>'send-emp-sms')); ?>
			<?php echo CHtml::link('Cancel', array('studentAttendenceEmail/create'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div>
