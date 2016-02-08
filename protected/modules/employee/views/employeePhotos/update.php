<?php
$this->breadcrumbs=array(
	/*'Employee Photoses'=>array('index'),
	$model->employee_photos_id=>array('view','id'=>$model->employee_photos_id),*/
	'Update Photo',
);

/*$this->menu=array(
	array('label'=>'List EmployeePhotos', 'url'=>array('index')),
	array('label'=>'Create EmployeePhotos', 'url'=>array('create')),
	array('label'=>'View EmployeePhotos', 'url'=>array('view', 'id'=>$model->employee_photos_id)),
	array('label'=>'Manage EmployeePhotos', 'url'=>array('admin')),
);*/
?>

<h1>Update Employee Photos <?php //echo $model->employee_photos_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
