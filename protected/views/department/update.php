<?php
$this->breadcrumbs=array(
	'Departments'=>array('admin'),
	//$model->department_name=>array('view','id'=>$model->department_id),
	$model->department_name=>array(),
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->department_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Department  <?php //echo $model->department_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
