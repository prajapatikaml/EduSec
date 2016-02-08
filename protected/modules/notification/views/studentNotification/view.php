<?php
$this->breadcrumbs=array(
	'Student Notices'=>array('admin'),
	$model->student_notification_title,
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">View Student Notice</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
</div>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
                'name'=>'student_notification_content',
		'type'=>'raw',
		),

		array(
                'name'=>'student_notification_alert_after_date',
                'value'=>date_format(date_create($model->student_notification_alert_after_date), "d-m-Y")
          	),
	
		array(
                'name'=>'student_notification_alert_before_date',
                'value'=>date_format(date_create($model->student_notification_alert_before_date), "d-m-Y")
          	),
	
		array(
		'name'=>'student_notification_from',
		'value'=>(User::model()->findByPk($model->student_notification_from)->user_type=='employee')?(EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$model->student_notification_from))->employee_transaction_id)))->employee_first_name):(ucfirst(strtolower(strstr(User::model()->findByPk($model->student_notification_from)->user_organization_email_id,'@',true)))),
		),
	),
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
