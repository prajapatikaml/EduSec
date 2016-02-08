<?php
$this->breadcrumbs=array(
	'Employee Infos'=>array('index'),
	$model->employee_id,
);

$this->menu=array(
//	array('label'=>'List EmployeeInfo', 'url'=>array('index')),
	array('label'=>'Create EmployeeInfo', 'url'=>array('Add')),
	array('label'=>'Update EmployeeInfo', 'url'=>array('update', 'id'=>$model->employee_id)),
	array('label'=>'Delete EmployeeInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeeInfo', 'url'=>array('admin')),
);
?>

<h1>Employee Details of : <?php echo $model->employee_first_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_id',
		'employee_no',
		'employee_first_name',
		'employee_middle_name',
		'employee_last_name',
		'employee_name_alias',
		'employee_dob',
		'employee_birthplace',
		'employee_gender',
		'employee_bloodgroup',
		'employee_marital_status',
		'employee_private_email',
		'employee_organization_mobile',
		'employee_private_mobile',
		'employee_pancard_no',
		'employee_account_no',
		'employee_joining_date',
		'employee_probation_period',
		'employee_hobbies',
		'employee_technical_skills',
		'employee_project_details',
		'employee_curricular',
		'employee_reference',
		'employee_refer_designation',
		'employee_guardian_name',
		'employee_guardian_relation',
		'employee_guardian_home_address',
		'employee_guardian_qualification',
		'employee_guardian_occupation',
		'employee_guardian_income',
		'employee_guardian_occupation_address',
		'employee_guardian_occupation_city',
		'employee_guardian_city_pin',
		'employee_guardian_phone_no',
		'employee_guardian_mobile1',
		'employee_guardian_mobile2',
		'employee_faculty_of',
		'employee_attendance_card_id',
		'employee_tally_id',
		'employee_created_by',
		'employee_creation_date',
	),
)); ?>
