<?php
$this->breadcrumbs=array(
	'Employee Addresses',
);

$this->menu=array(
	array('label'=>'Create EmployeeAddress', 'url'=>array('create')),
	array('label'=>'Manage EmployeeAddress', 'url'=>array('admin')),
);
?>

<h1>Employee Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
