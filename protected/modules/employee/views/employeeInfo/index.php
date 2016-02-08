<?php
$this->breadcrumbs=array(
	'Employee Infos',
);

$this->menu=array(
	array('label'=>'Create EmployeeInfo', 'url'=>array('create')),
	array('label'=>'Manage EmployeeInfo', 'url'=>array('admin')),
);
?>

<h1>Employee Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
