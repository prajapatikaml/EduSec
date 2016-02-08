<?php
$this->breadcrumbs=array(
	'Student Infos'=>array('index'),
	$model->student_id,
);

$this->menu=array(
	array('label'=>'List StudentInfo', 'url'=>array('index')),
	array('label'=>'Create StudentInfo', 'url'=>array('create')),
	array('label'=>'Update StudentInfo', 'url'=>array('update', 'id'=>$model->student_id)),
	array('label'=>'Delete StudentInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentInfo', 'url'=>array('admin')),
);
?>

<h1>View StudentInfo #<?php echo $model->student_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'student_id',
		'student_roll_no',
		'student_merit_no',
		'student_enroll_no',
		'student_college_id',
		'student_first_name',
		'student_middle_name',
		'student_last_name',
		'student_father_name',
		'student_mother_name',
		'student_adm_date',
		'student_dob',
		'student_birthplace',
		'student_gender',
		'student_guardian_name',
		'student_guardian_relation',
		'student_guardian_qualification',
		'student_guardian_occupation',
		'student_guardian_income',
		'student_guardian_occupation_address',
		'student_guardian_occupation_city',
		'student_guardian_city_pin',
		'student_guardian_home_address',
		'student_guardian_phoneno',
		'student_guardian_mobile',
		'student_email_id_1',
		'student_email_id_2',
		'student_bloodgroup',
		'student_tally_id',
		'student_created_by',
		'student_creation_date',
	),
)); ?>
