<style>
#student-notification-form .table_data{
	width:400px !important;

}
</style>

<?php
$this->breadcrumbs=array(
	'Compose Notice'=>array('notify'),
	'Send Notification',
);?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-notification-form',
	'enableAjaxValidation'=>true,
)); ?>
<div class="portlet box gray" style="width:100%">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">Selected Students </span>
</div>
<div class="portlet-body">

<table  class="report-table">
	<tr class="table_header">
		<th>SI No.</th>
		<th>Name</th>
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
	</tr>
<?php	
	$i++;$m++;}

?>

</table></br>
</div></div>
<div class="portlet box blue" style="margin-top:20px;">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">Fill Details</span>
</div>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
		<div class="row">
		<?php echo $form->labelEx($notification,'student_notification_alert_after_date'); ?>
	
	        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$notification, 
		    'attribute'=>'student_notification_alert_after_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:150px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		
?><span class="status">&nbsp;</span>
		<?php echo $form->error($notification,'student_notification_alert_after_date'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($notification,'student_notification_alert_before_date'); ?>
	
	        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model'=>$notification, 
		    'attribute'=>'student_notification_alert_before_date',
		    'options'=>array(
			'dateFormat'=>'dd-mm-yy',
			'changeYear'=>'true',
			'changeMonth'=>'true',
			'showAnim' =>'slide',
			'yearRange'=>'1900:'.(date('Y')+1),
			'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',			
		    ),
			'htmlOptions'=>array(
			'style'=>'width:150px;vertical-align:top',
			'readonly'=>true,
		    ),
			
		));
		
?><span class="status">&nbsp;</span>
		<?php echo $form->error($notification,'student_notification_alert_before_date'); ?>
	</div>		  
		<div class="row">
		<?php echo $form->labelEx($notification,'student_notification_title'); ?>
		<?php echo $form->textField($notification,'student_notification_title',array('size'=>50,'maxlength'=>50)); ?>
<span class="status">&nbsp;</span>
		<?php echo $form->error($notification,'student_notification_title'); ?>
		</div>
		
		<div class="row">
		<?php echo $form->labelEx($notification,'student_notification_content'); ?>
		<?php //echo $form->textArea($notification,'student_notification_content',array('rows'=>5, 'cols'=>63)); ?>
		<span class="status">&nbsp;</span></br></br>
		<?php  $this->widget('application.extensions.ckeditor.CKEditor', array(
		'model'=>$notification,
		'attribute'=>'student_notification_content',
		'language'=>'english',
		'editorTemplate'=>'full',
		)); ?>
		
		<?php echo $form->error($notification,'student_notification_content'); ?>
		</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton('Send Notice', array('class'=>'submit','style'=>'width:100px;',  'onclick'=>'CKEDITOR.instances.StudentNotification_student_notification_content.updateElement()')); ?>	
		<?php echo CHtml::link('Cancel', array('notify'), array('class'=>'btnCan'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div>
