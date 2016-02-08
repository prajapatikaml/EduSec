<?php
$this->breadcrumbs=array(
	'Employee Attendences'=>array('admin'),
	$model->employee_attendence_id,
);

$this->menu=array(
	array('label'=>'List Employee_attendence', 'url'=>array('index')),
	array('label'=>'Create Employee_attendence', 'url'=>array('create')),
	array('label'=>'Update Employee_attendence', 'url'=>array('update', 'id'=>$model->employee_attendence_id)),
	array('label'=>'Delete Employee_attendence', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_attendence_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employee_attendence', 'url'=>array('admin')),
);
?>

<h1>View Employee_attendence <?php //echo $model->employee_attendence_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_attendence_id',
		'employee_id',
		'date',
		'time1',
		'time2',
		'time3',
		'time4',
		'time5',
		'time6',
		'time7',
		'time8',
		'time9',
		'time10',
		'total_hour',
		'overtime_hour',
	),
)); ?>
