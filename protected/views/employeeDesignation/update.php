<?php
$this->breadcrumbs=array(
	'Designations'=>array('admin'),
	//$model->employee_designation_name=>array('view','id'=>$model->employee_designation_id),
	$model->employee_designation_name=>array(),
	'Edit',
);

$this->menu=array(
//	array('label'=>'', 'url'=>array('index')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('view', 'id'=>$model->employee_designation_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Designation  <?php //echo $model->employee_designation_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
