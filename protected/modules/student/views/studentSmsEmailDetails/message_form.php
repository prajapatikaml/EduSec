<?php
$this->breadcrumbs=array(
	'Compose Sms-Emails'=>array('studentbulksmsemail'),
	'Send Sms/Email',
);?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-sms-email-details-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnSubmit'=>true),
)); ?>
<div class="portlet box yellow">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Selected Students</span>
</div>

<table  class="report-table">
		<th>SI No.</th>
		<th>Name</th>
		<th>Student Mobile No.</th>
		<th>Student Email Id</th>
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
	$info= StudentInfo::model()->findByAttributes(array('student_info_transaction_id'=>$value));?>
	<td class="col2"> <?php echo $i ;?></td>
	<td class="col2"><?php echo $info->student_first_name." ".$info->student_last_name;?></td>
	<td class="col2"><?php echo $info->student_mobile_no;?></td>
	<td class="col2"><?php echo $info->student_email_id_1;?></td>

	</tr>
<?php	
	$i++;$m++;}

?>

</table></div>
<div class="portlet box blue" style="margin-top:20px;">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">SMS/Email</span>
</div>
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
		<div class="row">
		<?php echo CHtml::label(Yii::t('student_sms_email_details_to_mobile', 'To <span class="required">*</span>'), 'Email');
 ?> 
	<?php		$data = array('1'=>"Student Mobile",'2'=>"Guardian Mobile");

		 echo $form->radioButtonList($model,'student_sms_email_details_to_mobile',$data,array( 'labelOptions'=>array('style'=>'display:inline;width:45px;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;'));?>		
		<span class="status">&nbsp;</span>
		<?php echo $form->error($model,'student_sms_email_details_to_mobile'); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::button('Send', array('class'=>'submit','submit' => array('DoChacked'),'id'=>'send-emp-sms')); ?>
		<?php echo CHtml::link('Cancel', array('studentbulksmsemail'), array('class'=>'btnCan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
