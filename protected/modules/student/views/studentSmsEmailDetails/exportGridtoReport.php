<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-sms-email-details-grid',
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		array(
		 'name' => 'student_first_name',
	         'value' => '($data->student_id == 0) ? "Not Set" : $data->rel_stud_sms_info->student_first_name', 
                     ),
		 array(
		 'name' => 'student_mobile_no',
	         'value' =>'($data->student_id == 0) ? "Not Set" : $data->rel_stud_sms_info->student_mobile_no',                    
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

