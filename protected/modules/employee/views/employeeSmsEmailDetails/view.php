<?php
$this->breadcrumbs=array(
	'Employee Sms Email Details'=>array('admin'),
	EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $model->employee_id))->employee_first_name,
	);
?>
<div class="portlet box blue view ">
<div class="portlet-title"><i class="fa fa-plus"></i><span class="box-title">View Employee Sms Email Details</span>
</div>
 <div class="operation">
<?php echo CHtml::link('<i class="fa fa-chevron-left"></i>Back', array('admin'), array('class'=>'btnyellow'));?>
</div>
<div class="detail-content">
 <div class="detail-bg">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'employee_sms_email_id',
		array(
                'name'=>'Employee',
		'type'=>'raw',
                'value'=> EmployeeInfo::model()->findByAttributes(array(
						'employee_info_transaction_id' => $model->employee_id))->employee_first_name,
          ),	
		 array(
		'name' => 'department_name',
	        'value' => $model->rel_emp_sms_divid->department_name,
                     ),
		'message_email_text',
		array(
                'name'=>'email_sms_status',
		'type'=>'raw',
                'value'=>$model->email_sms_status == 1 ? "SMS" :"Email",
          ),
		//'created_by',
		array('name'=>'created_by',
			'value'=>User::model()->findByPk($model->created_by)->user_organization_email_id,
		),
		array('name'=>'creation_date',
		 'value'=>($model->creation_date == 0000-00-00) ? 'Not Set' : date_format(new DateTime($model->creation_date), 'd-m-Y'),
	),
	),
	//'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
</div>
</div>
