<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employee-sms-email-details-grid',
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		//'employee_sms_email_id',
		array(
		 'name' => 'employee_no',
	         'value' => '$data->rel_emp_sms_info->employee_no',
                     ),
		array(
		 'name' => 'employee_attendance_card_id',
	         'value' => '$data->rel_emp_sms_info->employee_attendance_card_id',
                     ),
		array(
		 'name' => 'employee_first_name',
	         'value' => '$data->rel_emp_sms_info->employee_first_name',
                     ),
		 array(
		'name' => 'department_id',
	        'value'=>'Department::model()->findByPk($data->department_id)->department_name',
                 ),
		array(
		'name' => 'email_sms_status',
	        'value' => '($data->email_sms_status==1)?"sms":"email"',
		),
		array(
                        'name' => 'creation_date',
			 'value'=>'($data->creation_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->creation_date), "d-m-Y")',
                ),
	),
)); ?>

