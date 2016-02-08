<?php
$this->breadcrumbs=array(
	'Employee Qualification'=>array('admin'),
	$model->employee_academic_record_trans_id=>array('view','id'=>$model->employee_academic_record_trans_id),
	'Update',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
