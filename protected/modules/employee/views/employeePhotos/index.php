<?php
$this->breadcrumbs=array(
	'Employee Photoses',
);

$this->menu=array(
	array('label'=>'Create EmployeePhotos', 'url'=>array('create')),
	array('label'=>'Manage EmployeePhotos', 'url'=>array('admin')),
);
?>

<h1>Employee Photoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
