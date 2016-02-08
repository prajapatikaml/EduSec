<?php
$this->breadcrumbs=array(
	'Employee Attendences'=>array('admin'),
	EmployeeInfo::model()->findByAttributes(array('employee_info_transaction_id'=>$model->employee_id))->employee_first_name,
	'Edit',
);
?>

<?php echo $this->renderPartial('update_atten_form', array('model'=>$model)); ?>
