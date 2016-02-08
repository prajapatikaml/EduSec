<?php
$this->breadcrumbs=array(
	'Employee Photoses'=>array('index'),
	$model->employee_photos_id,
);

$this->menu=array(
	array('label'=>'List EmployeePhotos', 'url'=>array('index')),
	array('label'=>'Create EmployeePhotos', 'url'=>array('create')),
	array('label'=>'Update EmployeePhotos', 'url'=>array('update', 'id'=>$model->employee_photos_id)),
	array('label'=>'Delete EmployeePhotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_photos_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeePhotos', 'url'=>array('admin')),
);
?>

<h1>View EmployeePhotos #<?php echo $model->employee_photos_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_photos_id',
		'employee_photos_desc',
		'employee_photos_path',
	),
)); ?>
