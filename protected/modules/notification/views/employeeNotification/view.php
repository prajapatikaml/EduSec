<?php
$this->breadcrumbs=array(
	'Employee Notices'=>array('admin'),
	$model->title,
);
?>
<div class="portlet box blue">
<i class="icon-reorder"></i>
 <div class="portlet-title"><span class="box-title">View Employee Notice</span>
<div class="operation">
<?php echo CHtml::link('Back', array('admin'), array('class'=>'btnback'));?>
</div>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
		        'name'=>'content',
			'type'=>'raw',
		),
		'link',
		array(
		'name'=>'alert_after_date',
		'value'=>date_format(date_create($model->alert_after_date), "d-m-Y")
	  	),
		array(
		'name'=>'alert_before_date',
		'value'=>date_format(date_create($model->alert_before_date), "d-m-Y")
	  	),

		array(
		'name'=>'from',
		'value'=>(User::model()->findByPk($model->from)->user_type=='employee')?(EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>(EmployeeTransaction::model()->findByAttributes(array('employee_transaction_user_id'=>$model->from))->employee_transaction_id)))->employee_first_name):(ucfirst(strtolower(strstr(User::model()->findByPk($model->from)->user_organization_email_id,'@',true)))),

		),	
	),	
	'htmlOptions'=> array('class'=>'custom-view'),
)); ?></div>
