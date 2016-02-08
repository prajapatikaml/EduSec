<?php
$this->breadcrumbs=array(
	'Student Registration Academic Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StudentRegistrationAcademicInfo', 'url'=>array('index')),
	array('label'=>'Manage StudentRegistrationAcademicInfo', 'url'=>array('admin')),
);
?>

<h1>Create StudentRegistrationAcademicInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>