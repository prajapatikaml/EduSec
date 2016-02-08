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
		'Rel_Emp_Info.employee_no::Employee No',
		'Rel_Emp_Info.employee_attendance_card_id::Attendance Card',
		'Rel_Emp_Info.employee_first_name',
		'Rel_Emp_Info.employee_last_name',
		'Rel_Designation.employee_designation_name::Designation',
		'Rel_Department.department_name::Department',
	),
)); ?>

