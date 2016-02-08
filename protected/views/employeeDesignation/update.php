<?php
$this->breadcrumbs=array(
	'Designations'=>array('admin'),
	$model->employee_designation_name,
	'Edit',
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
