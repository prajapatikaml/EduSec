<?php
if($_REQUEST['schedule']=="all")
{
$this->breadcrumbs=array(
	'Student Sms Email Details'=>array('admin'),
	//$model->rel_stud_sms_info->student_first_name,
);
}
else
{
$this->breadcrumbs=array(
	'Schedule Student Sms Emails'=>array('schedulemessages'),
	//$model->rel_stud_sms_info->student_first_name,
);
}
?>

<div class="portlet box blue">
<i class="icon-reorder"></i>
<div class="portlet-title"><span class="box-title">View Details</span>
<div class="operation">
<?php echo CHtml::link('Back',$_SERVER['HTTP_REFERER'], array('class'=>'btnback'));?>
<?php if($model->student_sms_email_details_schedule_flag==1){
	echo CHtml::link('Edit', array('update' ,'id'=>$model->student_sms_email_id), array('class'=>'btnupdate'));
	echo CHtml::link('Delete', array('delete' ,'id'=>$model->student_sms_email_id), array('class'=>'btndelete','onclick'=>"return confirm('Are you sure want to delete?');"));
}?>
</div>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
	array(
                'name'=>'Student',
		'type'=>'raw',
                'value'=> $model->student_id == 0 ? "Not Set" : StudentInfo::model()->findByAttributes(array(
						'student_info_transaction_id' => $model->student_id))->student_first_name,
          ),	
		'message_email_text',
	  array(
                'name'=>'email_sms_status',
		'type'=>'raw',
                'value'=>$model->email_sms_status == 1 ? "SMS" :"Email",
          ),
	
	array('name'=>'created_by',
		'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
	),	
	array('name'=>'creation_date',
		 'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?>
