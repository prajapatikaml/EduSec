<?php
$this->breadcrumbs=array(
	'Student Registration Academic Info'=>array('index'),
	$model->student_registration_academic_id=>array('view','id'=>$model->student_registration_academic_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StudentRegistrationAcademicInfo', 'url'=>array('index')),
	array('label'=>'Create StudentRegistrationAcademicInfo', 'url'=>array('create')),
	array('label'=>'View StudentRegistrationAcademicInfo', 'url'=>array('view', 'id'=>$model->student_registration_academic_id)),
	array('label'=>'Manage StudentRegistrationAcademicInfo', 'url'=>array('admin')),
);
?>

<h1>Update Student Registration Academic Info <?php //echo $model->student_registration_academic_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
