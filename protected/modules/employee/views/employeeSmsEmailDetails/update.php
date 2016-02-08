<?php
$this->breadcrumbs=array(
	'Employee Sms Email Details'=>array('admin'),
	//$model->rel_emp_sms_info->employee_first_name=>array('view','id'=>$model->employee_sms_email_id),
	'Edit',
);

$this->menu=array(
	//array('label'=>'List EmployeeSmsEmailDetails', 'url'=>array('index')),
	//array('label'=>'Create EmployeeSmsEmailDetails', 'url'=>array('create')),
	//array('label'=>'View EmployeeSmsEmailDetails', 'url'=>array('view', 'id'=>$model->employee_sms_email_id)),
	//array('label'=>'Manage EmployeeSmsEmailDetails', 'url'=>array('admin')),

	
	array('label'=>'', 'url'=>array('index'),'linkOptions'=>array('class'=>'List','title'=>'List')),
	array('label'=>'', 'url'=>array('create'),'linkOptions'=>array('class'=>'Create','title'=>'Create')),
	array('label'=>'', 'url'=>array('View', 'id'=>$model->employee_sms_email_id),'linkOptions'=>array('class'=>'View','title'=>'View')),
	array('label'=>'', 'url'=>array('admin'),'linkOptions'=>array('class'=>'Manage','title'=>'Manage')),
);
?>

<h1>Edit Employee Sms-Email Details <?php //echo $model->employee_sms_email_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
