<?php
$this->breadcrumbs=array(
	'Employee Experiences'=>array('index'),
	$model->employee_experience_id=>array('view','id'=>$model->employee_experience_id),
	'Update',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->employee_experience_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Update Employee Experience  <?php //echo $model->employee_experience_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
