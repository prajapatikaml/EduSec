<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
	array(
		'header'=>'SN.',
		'class'=>'IndexColumn',
		),
		array(
			'name'=>'title',
			'value'=>'$data->title',
			'filter'=>false,
		),
		
		array(
		'name'=>'employee_first_name',
		'value'=>'$data->rel_emp_id->employee_first_name',
		),
		array(
		'name'=>'employee_last_name',
		'value'=>'$data->rel_emp_id->employee_last_name',
		),
		array(
		'name'=>'employee_attendance_card_id',
		'value'=>'$data->rel_emp_id->employee_attendance_card_id',
		),
		array(
                'name' => 'employee_notification_creation_date',
		'value'=>'($data->employee_notification_creation_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->employee_notification_creation_date), "d-m-Y")',
              	),
		array(
		  'name'=>'employee_notification_read', 	
                  'value' => '($data->employee_notification_read==1) ? "Read" : "Unread" ',               
		),
		
	),
));
?>
