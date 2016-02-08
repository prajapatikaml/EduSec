<?php
$this->breadcrumbs=array(
	'Departments'=>array('admin'),
	//$model->department_name=>array('view','id'=>$model->department_id),
	$model->department_name,
	'Edit',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
