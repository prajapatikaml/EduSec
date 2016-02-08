<?php
$this->breadcrumbs=array(
	'Employee Experiences',
);

$this->menu=array(
	array('label'=>'Create EmployeeExperience', 'url'=>array('create')),
	array('label'=>'Manage EmployeeExperience', 'url'=>array('admin')),
);
?>

<h1>Employee Experiences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
