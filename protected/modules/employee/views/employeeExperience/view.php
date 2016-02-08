<?php
$this->breadcrumbs=array(
	'Employee Experiences'=>array('index'),
	$model->employee_experience_id,
);

$this->menu=array(
//	array('label'=>'List EmployeeExperience', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_experience_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_experience_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View Employee Experience : <?php echo $model->employee_experience_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_experience_id',
		'employee_experience_organization_name',
		'employee_experience_designation',
		'employee_experience_from',
		'employee_experience_to',
	),
)); ?>
