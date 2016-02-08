<?php
$this->breadcrumbs=array(
	'Employee Experience Trans'=>array('index'),
	$model->employee_experience_trans_id=>array('view','id'=>$model->employee_experience_trans_id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List EmployeeExperienceTrans', 'url'=>array('index')),
	array('label'=>'Create EmployeeExperienceTrans', 'url'=>array('create')),
	array('label'=>'View EmployeeExperienceTrans', 'url'=>array('view', 'id'=>$model->employee_experience_trans_id)),
	array('label'=>'Manage EmployeeExperienceTrans', 'url'=>array('admin')),
);
*/
?>

<h1>Update Employee Experience <?php //echo $model->employee_experience_trans_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'emp_exp'=>$emp_exp)); ?>
