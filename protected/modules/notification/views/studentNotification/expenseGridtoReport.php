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
			'name'=>'student_notification_title',
			'value'=>'$data->student_notification_title',
			'filter'=>false,
		),
		array(
		'name'=>'student_first_name',
		'value'=>'$data->rel_stud_info->student_first_name',
		),
		array(
		'name'=>'student_enroll_no',
		'value'=>'$data->rel_stud_info->student_enroll_no',
		),

		array(
                        'name' => 'student_notification_creation_date',
			'value'=>'($data->student_notification_creation_date == 0000-00-00) ? "Not Set" : date_format(new DateTime($data->student_notification_creation_date), "d-m-Y")',
                ),
			
		array(
		  'name'=>'student_notification_read', 	
                  'value' => '($data->student_notification_read==1) ? "Read" : "Unread" ',               
		),
	),
)); 
?>

