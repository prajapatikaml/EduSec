<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model,
	'summaryText'=>false,
	'enableSorting'=>false,
	'enablePagination' => false,
	'columns'=>array(
		array(
		'header'=>'SI No',
		'class'=>'IndexColumn',
		),
		'Rel_Emp_Info.employee_no',
		'Rel_Emp_Info.employee_attendance_card_id',
		'Rel_Emp_Info.employee_first_name',	
		'Rel_Emp_Info.employee_last_name',	
		'attendence',	
		'date',
		'total_hour',
		'time1',
		'time2',
		'overtime_hour',
		array(
                       'header'=>'Holiday Name',
                       'value'=>'(NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))) ? NationalHolidays::model()->findByAttributes(array("national_holiday_date"=>$data->date))->national_holiday_name :"Not Set"',
               ),
	),
)); ?>

