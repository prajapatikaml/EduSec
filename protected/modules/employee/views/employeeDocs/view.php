<?php
$this->breadcrumbs=array(
	'Employee Docs'=>array('index'),
	$model->employee_docs_id,
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('update', 'id'=>$model->employee_docs_id),'linkOptions'=>array('class'=>'Edit','title'=>'Update')),
	array('label'=>'', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->employee_docs_id),'confirm'=>'Are you sure you want to delete this item?', 'class'=>'Delete','title'=>'Delete')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>View EmployeeDocument : <?php echo $model->employee_docs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'employee_docs_id',
		'employee_docs_desc',
		'employee_docs_path',
	),
)); ?>
