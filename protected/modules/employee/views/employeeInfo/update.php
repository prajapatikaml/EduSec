<?php
$this->breadcrumbs=array(
	'Employee Infos'=>array('index'),
	$model->employee_id=>array('view','id'=>$model->employee_id),
	'Update',
);
	
	$emp_tran = EmployeeTransaction::model()->findByAttributes(array('employee_transaction_employee_id'=>$model->employee_id));
	//$branch_id = $emp_tran->employee_transaction_branch_id;


$this->menu=array(
	array('label'=>'List EmployeeInfo', 'url'=>array('index')),
	array('label'=>'Create EmployeeInfo', 'url'=>array('create')),
	array('label'=>'View EmployeeInfo', 'url'=>array('view', 'id'=>$model->employee_id)),
	array('label'=>'Manage EmployeeInfo', 'url'=>array('admin')),
);
?>

<h1>Update Employee Details of : <?php echo $model->employee_first_name; ?></h1>

<?php echo $this->renderPartial('_form', array(
						'model'=>$model,/*'user'=>$user,
						"employee_transaction_branch_id"=>$emp_tran->employee_transaction_branch_id,
						"employee_transaction_category_id"=>$emp_tran->employee_transaction_category_id,
						"employee_transaction_department_id"=>$emp_tran->employee_transaction_department_id,
						"employee_transaction_designation_id"=>$emp_tran->employee_transaction_designation_id,
						"employee_transaction_nationality_id"=>$emp_tran->employee_transaction_nationality_id,
						"employee_transaction_organization_id"=>$emp_tran->employee_transaction_organization_id,
						"employee_transaction_quota_id"=>$emp_tran->employee_transaction_quota_id,
						"employee_transaction_religion_id"=>$emp_tran->employee_transaction_religion_id,
						"employee_transaction_shift_id"=>$emp_tran->employee_transaction_shift_id,*/
				));
?>
