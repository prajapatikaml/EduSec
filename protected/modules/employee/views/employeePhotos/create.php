<?php
$this->breadcrumbs=array(
	'Employee Photoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeePhotos', 'url'=>array('index')),
	array('label'=>'Manage EmployeePhotos', 'url'=>array('admin')),
);
?>

<h1>Create EmployeePhotos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>