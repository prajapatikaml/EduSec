<?php
$this->breadcrumbs=array(
	'Employee Docs',
);

$this->menu=array(
	array('label'=>'Create EmployeeDocs', 'url'=>array('create')),
	array('label'=>'Manage EmployeeDocs', 'url'=>array('admin')),
);
?>

<h1>Employee Docs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
