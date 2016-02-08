<?php
$this->breadcrumbs=array(
	'Employee Docs'=>array('index'),
	$model->employee_docs_id=>array('view','id'=>$model->employee_docs_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->employee_docs_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update EmployeeDocument : <?php echo $model->employee_docs_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
