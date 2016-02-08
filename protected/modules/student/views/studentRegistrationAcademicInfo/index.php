<?php
$this->breadcrumbs=array(
	'Student Registration Academic Infos',
);

$this->menu=array(
	array('label'=>'Create StudentRegistrationAcademicInfo', 'url'=>array('create')),
	array('label'=>'Manage StudentRegistrationAcademicInfo', 'url'=>array('admin')),
);
?>

<h1>Student Registration Academic Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
