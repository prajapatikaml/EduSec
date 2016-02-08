<?php
$this->breadcrumbs=array(
	'Employee Experience Trans'=>array('index'),
	$model->employee_experience_trans_id=>array('view','id'=>$model->employee_experience_trans_id),
	'Update',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'emp_exp'=>$emp_exp)); ?>
