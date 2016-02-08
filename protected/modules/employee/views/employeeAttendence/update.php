<?php
$this->breadcrumbs=array(
	'Employee Attendences'=>array('index'),
	$model->employee_attendence_id=>array('view','id'=>$model->employee_attendence_id),
	'Update',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
