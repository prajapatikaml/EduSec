<?php
$this->breadcrumbs=array(
	'Student Registration Academic Infos'=>array('index'),
	$model->student_registration_academic_id,
);

$this->menu=array(
	array('label'=>'List StudentRegistrationAcademicInfo', 'url'=>array('index')),
	array('label'=>'Create StudentRegistrationAcademicInfo', 'url'=>array('create')),
	array('label'=>'Update StudentRegistrationAcademicInfo', 'url'=>array('update', 'id'=>$model->student_registration_academic_id)),
	array('label'=>'Delete StudentRegistrationAcademicInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->student_registration_academic_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StudentRegistrationAcademicInfo', 'url'=>array('admin')),
);
?>

<h1>View StudentRegistrationAcademicInfo #<?php echo $model->student_registration_academic_id; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'student-registration-academic-info-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'examination',
		'year_of_passing',
		'name_of_board',
		'medium',
		'class_obtained',
		'marks_obtained',
		'marks_out_of',
		'percentage',
	),
));  ?>
